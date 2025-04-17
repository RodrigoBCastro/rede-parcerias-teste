import { ChevronRightCircle, ChevronLeftCircle } from "lucide-react";
import React from "react";

interface PaginationProps {
    currentPage: number;
    totalPages: number;
    onPageChange: (newPage: number) => void;
}

export const Pagination: React.FC<PaginationProps> = ({
currentPage,
totalPages,
onPageChange,
}) => {
    return (
        <div className="flex justify-center items-center gap-4 font-semibold text-indigo-500 mt-4">
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
    );
};
