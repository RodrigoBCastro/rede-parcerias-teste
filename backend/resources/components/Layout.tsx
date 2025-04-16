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
                        <button onClick={ () => router.post('/logout') } className={'p-2 bg-red-500 text-white rounded shadow-sm hover:bg-red-700'}>
                            Sair
                        </button>
                    </div>
                </nav>

                <main className="p-6">
                    {children}
                </main>
            </div>
        </>
    )
}
