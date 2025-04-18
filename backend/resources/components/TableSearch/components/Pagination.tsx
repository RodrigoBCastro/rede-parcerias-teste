import { ChevronRightCircle, ChevronLeftCircle } from "lucide-react";
import React from "react";

interface PaginationProps {
    currentPage: number;
    totalPages: number;
    onPageChange: (newPage: number) => void;
    onLimitChange: (perPage: number) => void;
    limit: number;
}

export const Pagination: React.FC<PaginationProps> = ({currentPage, totalPages, onPageChange, onLimitChange, limit}) => {
    return (
        <div className="flex justify-between items-center flex-wrap gap-4 mt-4 text-indigo-500 font-semibold">
            <div className="flex items-center gap-2">
                <label htmlFor="perPage">Itens por página:</label>
                <select
                    id="perPage"
                    value={limit}
                    onChange={(e) => onLimitChange(Number(e.target.value))}
                    className="border rounded px-2 py-1 text-indigo-600"
                >
                    {[5, 10, 20, 50, 100].map((opt) => (
                        <option key={opt} value={opt}>
                            {opt}
                        </option>
                    ))}
                </select>
            </div>

            <div className="flex items-center gap-4">
                <button
                    onClick={() => onPageChange(+currentPage - 1)}
                    className="hover:text-indigo-900"
                    disabled={currentPage === 1}
                >
                    <ChevronLeftCircle />
                </button>

                <span>{currentPage} / {totalPages || 1}</span>

                <button
                    onClick={() => onPageChange(+currentPage + 1)}
                    className="hover:text-indigo-900"
                    disabled={currentPage === totalPages}
                >
                    <ChevronRightCircle />
                </button>
            </div>
        </div>
    );
};
