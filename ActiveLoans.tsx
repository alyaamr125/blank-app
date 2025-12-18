import { LoanRecord } from '../App';
import { Clock } from 'lucide-react';

interface ActiveLoansProps {
  loans: LoanRecord[];
}

export function ActiveLoans({ loans }: ActiveLoansProps) {
  if (loans.length === 0) {
    return (
      <div className="text-center py-12 text-gray-500">
        <p>Tidak ada laptop yang sedang dipinjam</p>
      </div>
    );
  }

  return (
    <div className="overflow-x-auto">
      <table className="w-full">
        <thead>
          <tr className="border-b border-gray-200">
            <th className="text-left py-3 px-4 text-gray-700">ID Siswa</th>
            <th className="text-left py-3 px-4 text-gray-700">Nama</th>
            <th className="text-left py-3 px-4 text-gray-700">Kelas</th>
            <th className="text-left py-3 px-4 text-gray-700">ID Laptop</th>
            <th className="text-left py-3 px-4 text-gray-700">Waktu Peminjaman</th>
          </tr>
        </thead>
        <tbody>
          {loans.map((loan) => (
            <tr key={loan.id} className="border-b border-gray-100 hover:bg-gray-50">
              <td className="py-3 px-4">{loan.studentId}</td>
              <td className="py-3 px-4">{loan.nama}</td>
              <td className="py-3 px-4">{loan.kelas}</td>
              <td className="py-3 px-4">
                <span className="bg-blue-100 text-blue-800 px-3 py-1 rounded">
                  {loan.laptopId}
                </span>
              </td>
              <td className="py-3 px-4">
                <div className="flex items-center gap-2 text-gray-600">
                  <Clock className="w-4 h-4" />
                  {loan.borrowTimestamp.toLocaleString('id-ID')}
                </div>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
