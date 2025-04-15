import React from "react";

interface TableContentProps {
  columns: string[];
  data: any[];
  actions?: (row: any) => React.ReactNode;
}

export const TableContent: React.FC<TableContentProps> = ({ columns, data, actions }) => {
  return (
    <div className="overflow-x-auto">
      <table className="min-w-full table-auto bg-indigo-500 text-neutral-50 rounded-md">
        <thead className="">
          <tr>
            {columns.map((col, index) => (
              <th key={index} className="px-4 py-2 border-b text-left font-semibold">
                {col}
              </th>
            ))}
            {actions && (
              <th className="px-4 py-2 border-b text-left font-semibold">Ações</th>
            )}
          </tr>
        </thead>
        <tbody>
          {data.map((row, rowIndex) => (
            <tr key={rowIndex} className="bg-white border border-indigo-500 hover:bg-gray-100">
              {columns.map((col, colIndex) => (
                <td key={colIndex} className="px-4 py-2 border-b border-indigo-500 text-gray-700">
                  {row[col] ?? "-"}
                </td>
              ))}
              {actions && (
                <td className="px-4 py-2 border-b border-indigo-500 text-gray-700">
                  {actions(row)}
                </td>
              )}
            </tr>
          ))}
          {data.length === 0 && (
            <tr>
              <td colSpan={columns.length + (actions ? 1 : 0)} className="text-center py-4">
                Nenhum resultado encontrado.
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
};
