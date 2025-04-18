import React, { useState } from "react";
import Card from "./components/Card";
import { ListCardsProps } from "./types";
import {Pagination} from "../TableSearch/components/Pagination";
import {router} from "@inertiajs/react";

export const ListCards: React.FC<ListCardsProps> = ({title, columns, data, actions, createBtn = null, currentPage, totalPages, paginationRoute}) => {
    const [limit, setLimit] = useState(10);

    const handleNavigate = (page: number, limitValue: number) => {
        router.get(paginationRoute, { page, limit: limitValue }, { preserveState: true });
    };

    return (
        <div className="p-4 space-y-4">
            <div className="flex flex-row w-full p-2 items-center justify-between">
                {title && <h2 className="text-xl font-bold text-indigo-500">{title}</h2>}
                {createBtn != null && createBtn()}
            </div>

            {data.map((item, index) => (
                <Card key={index} data={item} columns={columns} actions={actions} />
            ))}

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
