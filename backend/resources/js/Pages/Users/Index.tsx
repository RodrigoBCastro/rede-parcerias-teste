import React, { useState } from 'react';
import ModalUser from '../../../components/ModalUser';
import { Pencil } from "lucide-react";
import { TableSearch, ListCards } from "../../../components";
import Layout from '../../../components/Layout';
import {User} from "@/types/User";
import {Product} from "@/types/Product";

interface ListUser {
    name: string
    role: string
    email: string
}

interface Props {
    auth: {
        user: User
    }
    users: {
        page: number
        totalResults: number
        totalPages: number
        items: ListUser[]
    }
}

export default function Users({ auth, users }: Props) {
    const role = auth.user.role
    const [selectedUser, setSelectedUser] = useState<User | null>(null)
    const [isModalOpen, setIsModalOpen] = useState(false)
    const columns = ["name", "role", "email"];

    const openEditModal = (user) => {
        setSelectedUser(user)
        setIsModalOpen(true)
    }

    const actions = (item: User) => {
        return (
            <div className="flex gap-2 text-indigo-500">
                <button
                    onClick={() => openEditModal(item)} className="text-blue-600 hover:underline">
                    <Pencil />
                </button>
            </div>
        )
    }

    return (
        <>
            <Layout user={auth.user}>
                <div className="block lg:hidden">
                    <ListCards
                        title="Usuarios"
                        columns={columns}
                        data={users.items}
                        currentPage={users.page}
                        totalPages={users.totalPages}
                        actions={actions}
                        paginationRoute="/users"
                    />
                </div>
                <div className="hidden lg:block">
                    <TableSearch
                        title="Usuarios"
                        columns={columns}
                        data={users.items}
                        currentPage={users.page}
                        totalPages={users.totalPages}
                        actions={actions}
                        isSearchable={false}
                        paginationRoute="/users"
                    />
                </div>
            </Layout>
            <ModalUser
                isOpen={isModalOpen}
                onClose={() => setIsModalOpen(false)}
                user={selectedUser}
                currentUserRole={role}
            />
        </>
    )
}
