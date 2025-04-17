import React, { useState } from 'react';
import { TableProps } from "./types";
import { useTable } from "./hooks";
import { SearchBar } from "./components/SearchBar";
import { TableContent } from "./components/TableContent";
import { Pagination } from "./components/Pagination";
import {router} from "@inertiajs/react";

interface TableSearchProps extends TableProps {
    title: string;
    createBtn: any;
    isSearchable?: boolean;
    currentPage: number;
    totalPages: number;
}

export const TableSearch: React.FC<TableSearchProps> = ({
title,
columns,
data,
actions,
createBtn = null,
isSearchable = true,
currentPage,
totalPages,
}) => {
    const [search, setSearch] = useState("");

  return (
    <div className="lg:pt-10 space-y-4 shadow-md p-10 rounded-md">
        {isSearchable && (
            <SearchBar title={title} search={search} createBtn={createBtn} onSearch={(v) => {
                setSearch(v);
            }} />
        )}

      <TableContent columns={columns} data={data} actions={actions} />

        <Pagination
            currentPage={currentPage}
            totalPages={totalPages}
            onPageChange={(page) => {
                router.get('/products', { page }, { preserveState: true });
            }}
        />
    </div>
  );
};
