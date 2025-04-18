import React, { useState } from 'react';
import { TableSearchProps } from "./types";
import { SearchBar } from "./components/SearchBar";
import { TableContent } from "./components/TableContent";
import { Pagination } from "./components/Pagination";
import { router } from "@inertiajs/react";

export const TableSearch: React.FC<TableSearchProps> = ({
    title,
    columns,
    data,
    actions,
    createBtn = null,
    isSearchable = true,
    currentPage,
    totalPages,
    paginationRoute,
}) => {
    const [search, setSearch] = useState("");
    const [limit, setLimit] = useState(10);

    const handleNavigate = (page: number, limitValue: number) => {
        router.get(paginationRoute, { page, limit: limitValue }, { preserveState: true });
    };

  return (
    <div className="lg:pt-10 space-y-4 shadow-md p-10 rounded-md">
        <h2 className="text-2xl font-bold text-indigo-500">{title}</h2>

        {isSearchable && (
            <SearchBar
                search={search}
                createBtn={createBtn}
                onSearch={(v) => {
                    setSearch(v);
                }}
            />
        )}

      <TableContent columns={columns} data={data} actions={actions} />

        <Pagination
            currentPage={currentPage}
            totalPages={totalPages}
            limit={limit}
            onPageChange={(page) => handleNavigate(page, limit)}
            onLimitChange={(newLimit) => {
                setLimit(newLimit);
                handleNavigate(1, newLimit);
            }}
        />
    </div>
  );
};
