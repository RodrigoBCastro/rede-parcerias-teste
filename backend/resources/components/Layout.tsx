import React from 'react'
import { User } from '@/types/User'
import {BtnLogout, Navigator} from "./";
import { router } from '@inertiajs/react'

interface Props {
    children: React.ReactNode
    user: User
}

export default function Layout({ children, user }: Props) {
    return (
        <>
            <Navigator />
            <div className="pt-14 lg:pt-0 lg:ml-64">
                <nav className="hidden lg:flex bg-white shadow p-4 flex justify-end items-center">
                    <div>
                        <span className="mr-4 text-gray-700">{user.name} ({user.role})</span>
                    </div>
                </nav>

                <main className="p-6">
                    {children}
                </main>
            </div>
        </>
    )
}
