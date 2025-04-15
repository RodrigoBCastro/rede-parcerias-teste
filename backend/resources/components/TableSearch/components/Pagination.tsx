import { ChevronRightCircle, ChevronLeftCircle } from "lucide-react";
import React from "react";

interface PaginationProps {
  currentPage: number;
  totalPages: number;
  rowsPerPage: number;
  rowsPerPageOptions: number[];
  onRowsPerPageChange: (value: number) => void;
  onPageChange: (newPage: number | ((prev: number) => number)) => void;
}

export const Pagination: React.FC<PaginationProps> = ({
  currentPage,
  totalPages,
  rowsPerPage,
  rowsPerPageOptions,
  onRowsPerPageChange,
  onPageChange,
}) => {
  return (
    <div className="flex justify-between items-center flex-wrap gap-2">
      <div>
        <label className="mr-2 font-semibold text-indigo-500">Linhas por página:</label>
        <select
          value={rowsPerPage}
          onChange={(e) => {
            onRowsPerPageChange(Number(e.target.value));
            onPageChange(1);
          }}
          className="font-bold text-indigo-500 p-1 rounded"
        >
          {rowsPerPageOptions.map((opt) => (
            <option key={opt} value={opt}>{opt}</option>
          ))}
        </select>
      </div>

      <div className="flex items-center gap-2 font-semibold text-indigo-500">
        <button
          onClick={() => onPageChange((prev) => Math.max(prev - 1, 1))}
          className="hover:text-indigo-900"
          disabled={currentPage === 1}
        >
          <ChevronLeftCircle />
        </button>
        <span>{currentPage} / {totalPages || 1}</span>
        <button
          onClick={() => onPageChange((prev) => Math.min(prev + 1, totalPages))}
          className="hover:text-indigo-900"
          disabled={currentPage === totalPages}
        >
          <ChevronRightCircle />
        </button>
      </div>
    </div>
  );
};
