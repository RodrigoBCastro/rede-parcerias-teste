import React, { useState } from "react";
import Card from "./components/Card";
import { ListCardProps } from "./types";

export const ListCards: React.FC<ListCardProps> = ({
  title,
  columns,
  data,
  actions,
  rowsPerPageOptions = [5, 10, 25],
}) => {
  const [currentPage, setCurrentPage] = useState(0);
  const [rowsPerPage, setRowsPerPage] = useState(rowsPerPageOptions[0]);

  const startIndex = currentPage * rowsPerPage;
  const endIndex = startIndex + rowsPerPage;
  const paginatedData = data.slice(startIndex, endIndex);

  const totalPages = Math.ceil(data.length / rowsPerPage);

  return (
    <div className="p-4 space-y-4">
      {title && <h2 className="text-xl font-semibold">{title}</h2>}

      {paginatedData.map((item, index) => (
        <Card
          key={index}
          data={item}
          columns={columns}
          actions={actions}
        />
      ))}

      {/* Pagination Controls */}
      <div className="flex items-center justify-between mt-4">
        <div>
          <label htmlFor="rowsPerPage" className="text-sm mr-2">
            Linhas por página:
          </label>
          <select
            id="rowsPerPage"
            value={rowsPerPage}
            onChange={(e) => {
              setRowsPerPage(Number(e.target.value));
              setCurrentPage(0);
            }}
            className="border rounded p-1"
          >
            {rowsPerPageOptions.map((option) => (
              <option key={option} value={option}>
                {option}
              </option>
            ))}
          </select>
        </div>

        <div className="space-x-2">
          <button
            className="px-3 py-1 border rounded disabled:opacity-50"
            disabled={currentPage === 0}
            onClick={() => setCurrentPage((prev) => prev - 1)}
          >
            Anterior
          </button>
          <span className="text-sm">
            {currentPage + 1} / {totalPages}
          </span>
          <button
            className="px-3 py-1 border rounded disabled:opacity-50"
            disabled={currentPage >= totalPages - 1}
            onClick={() => setCurrentPage((prev) => prev + 1)}
          >
            Próximo
          </button>
        </div>
      </div>
    </div>
  );
};
