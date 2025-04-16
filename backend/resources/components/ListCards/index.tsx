import React, { useState } from "react";
import Card from "./components/Card";
import { ListCardProps } from "./types";
import {Pagination} from "../TableSearch/components/Pagination";

export const ListCards: React.FC<ListCardProps> = ({
  title,
  columns,
  data,
  actions,
  createBtn = null,
  rowsPerPageOptions = [5, 10, 25],
}) => {
  const [currentPage, setCurrentPage] = useState(1);
  const [rowsPerPage, setRowsPerPage] = useState(rowsPerPageOptions[0]);

  const startIndex = (currentPage - 1) * rowsPerPage;
  const endIndex = startIndex + rowsPerPage;
  const paginatedData = data.slice(startIndex, endIndex);

  const totalPages = Math.ceil(data.length / rowsPerPage);

  return (
    <div className="p-4 space-y-4">
        <div className="flex flex-row w-full p-2 items-center justify-between">
            {title && <h2 className="text-xl font-bold text-indigo-500">{title}</h2>}
            {createBtn != null && createBtn()}
        </div>


      {paginatedData.map((item, index) => (
        <Card
          key={index}
          data={item}
          columns={columns}
          actions={actions}
        />
      ))}

        <Pagination
            currentPage={currentPage}
            totalPages={totalPages}
            rowsPerPage={rowsPerPage}
            rowsPerPageOptions={rowsPerPageOptions}
            onRowsPerPageChange={setRowsPerPage}
            onPageChange={setCurrentPage}
        />
    </div>
  );
};
