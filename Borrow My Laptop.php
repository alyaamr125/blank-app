<?php
// index.php
session_start();
require_once 'config/database.php';
include 'components/header.php';

// Inisialisasi database
$database = new Database();
$db = $database->getConnection();

// Tentukan tab aktif
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'borrow';
$validTabs = ['borrow', 'return', 'active', 'history'];
if (!in_array($activeTab, $validTabs)) {
    $activeTab = 'borrow';
}

// Ambil data dari database
$query = "SELECT * FROM loans ORDER BY borrow_timestamp DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$allLoans = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Filter loans aktif dan riwayat
$activeLoans = array_filter($allLoans, function($loan) {
    return $loan['status'] == 'dipinjam';
});

$loanHistory = array_filter($allLoans, function($loan) {
    return $loan['status'] == 'dikembalikan';
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php echo $header; ?>

    <main class="container py-4">
        <div class="card shadow-sm">
            <!-- Tab Navigation -->
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $activeTab == 'borrow' ? 'active' : ''; ?>" 
                           href="?tab=borrow">
                            <i class="bi bi-laptop"></i> Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $activeTab == 'return' ? 'active' : ''; ?>" 
                           href="?tab=return">
                            <i class="bi bi-arrow-return-left"></i> Pengembalian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $activeTab == 'active' ? 'active' : ''; ?>" 
                           href="?tab=active">
                            <i class="bi bi-clock-history"></i> 
                            Laptop Dipinjam 
                            <span class="badge bg-danger ms-1"><?php echo count($activeLoans); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $activeTab == 'history' ? 'active' : ''; ?>" 
                           href="?tab=history">
                            <i class="bi bi-journal-text"></i> Riwayat
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="card-body">
                <?php
                switch($activeTab) {
                    case 'borrow':
                        include 'components/borrow_form.php';
                        break;
                    case 'return':
                        include 'components/return_form.php';
                        break;
                    case 'active':
                        include 'components/active_loans.php';
                        break;
                    case 'history':
                        include 'components/loan_history.php';
                        break;
                }
                ?>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    
    <!-- SweetAlert untuk notifikasi -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <?php
    // Tampilkan pesan sukses/error
    if(isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $type = $_SESSION['message_type'] ?? 'success';
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        echo "
        <script>
        Swal.fire({
            icon: '$type',
            title: '$message',
            showConfirmButton: false,
            timer: 2000
        });
        </script>
        ";
    }
    ?>
</body>
</html>