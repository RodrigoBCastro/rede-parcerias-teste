import React, { useEffect, useState } from 'react'
import Modal from './Modal'
import { router } from '@inertiajs/react'

interface ModalUserProps {
    isOpen: boolean
    onClose: () => void
    user: {
        id: number
        name: string
        email: string
        role: string
    } | null
    currentUserRole: 'admin' | 'operator' | 'common'
}

const getAllowedRoles = (role: string) => {
    switch (role) {
        case 'admin':
            return ['admin', 'operator', 'common']
        case 'operator':
            return ['operator', 'common']
        default:
            return []
    }
}

export default function ModalUser({ isOpen, onClose, user, currentUserRole }: ModalUserProps) {
    const [selectedRole, setSelectedRole] = useState(user?.role || '')

    useEffect(() => {
        if (user) {
            setSelectedRole(user.role)
        }
    }, [user])

    if (!isOpen || !user) return null

    const allowedRoles = getAllowedRoles(currentUserRole)

    const handleSave = () => {
        router.put(`/users/${user.id}/role`, { role: selectedRole }, {
            onFinish: onClose
        })
    }

    return (
        <Modal isOpen={isOpen} onClose={onClose} title={`Editar Role: ${user.name}`}>
            <div className="space-y-4">
                <div>
                    <label className="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="text"
                        value={user.email}
                        disabled
                        className="w-full mt-1 p-2 border rounded bg-gray-100"
                    />
                </div>

                <div>
                    <label className="block text-sm font-medium text-gray-700">Role</label>
                    <select
                        className="w-full mt-1 p-2 border rounded"
                        value={selectedRole}
                        onChange={(e) => setSelectedRole(e.target.value)}
                    >
                        {allowedRoles.map(role => (
                            <option key={role} value={role}>
                                {role.charAt(0).toUpperCase() + role.slice(1)}
                            </option>
                        ))}
                    </select>
                </div>

                <div className="flex justify-end space-x-2 mt-6">
                    <button
                        onClick={onClose}
                        className="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                    >
                        Cancelar
                    </button>
                    <button
                        onClick={handleSave}
                        className="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                    >
                        Salvar
                    </button>
                </div>
            </div>
        </Modal>
    )
}
