import { React, useState } from 'react';
import ModalProducts from '../../../components/ModalProducts';
import { Eye, Pencil, CirclePlus, Trash,} from "lucide-react";
import { Navigator, TableSearch, ListCards,} from "../../../components";
import Layout from '../../../components/Layout';
import {User} from "@/types/User";

interface ListUser {
    name: string
    role: string
    email: string
}

interface Props {
    auth: {
        user: User
    }
    users: ListUser[]
}

export default function Products({ auth, users }: Props) {
    const role = auth.user.role
    const canEdit = role === 'admin' || role === 'operator'
    const canRemove = role === 'admin'

    const columns = ["name", "role", "email"];

    const actions = (item: Product) => {
        return (
            <div className="flex gap-2 text-indigo-500">
                <button onClick={() => openModal('view', item)} className="hover:text-indigo-950">
                    <Eye />
                </button>

                { canEdit && (
                    <button onClick={() => window.location.href = `/products/${item.id}/edit`} className="hover:text-indigo-950">
                        <Pencil />
                    </button>
                )}

                { canRemove && (
                    <button onClick={() => openModal('delete', item)} className="hover:text-indigo-950">
                        <Trash />
                    </button>
                )}
            </div>
        )
    }

    const createBtn = () => {
        if (!canRemove) return (
            <div></div>
        );

        return (
            <button onClick={() => window.location.href = `/products/create`} className="flex justify-between gap-2 p-2 bg-indigo-500 text-white rounded hover:text-indigo-950">
                <CirclePlus /> Create Product
            </button>
        )
    }


    return (
        <>
            <Layout user={auth.user}>
                <div className="block lg:hidden">
                    <ListCards title={"Usuarios"} columns={columns} data={users}></ListCards>
                </div>
                <div className="hidden lg:block">
                    <TableSearch title={"Usuarios"} columns={columns} data={users} isSearchable={false}></TableSearch>
                </div>
            </Layout>
        </>
    )
}
