import React, { useState } from 'react'
import { useForm } from '@inertiajs/react'

export default function Login() {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
    })

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault()
        post('/login')
    }

    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-100">
            <div className="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
                <h2 className="text-2xl font-bold mb-6 text-center">Login</h2>

                <form onSubmit={handleSubmit} className="space-y-4">
                    <div>
                        <label className="block text-gray-700 mb-1">Email</label>
                        <input
                            type="email"
                            className="w-full border rounded px-3 py-2"
                            value={data.email}
                            onChange={e => setData('email', e.target.value)}
                            required
                        />
                        {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
                    </div>

                    <div>
                        <label className="block text-gray-700 mb-1">Senha</label>
                        <input
                            type="password"
                            className="w-full border rounded px-3 py-2"
                            value={data.password}
                            onChange={e => setData('password', e.target.value)}
                            required
                        />
                        {errors.password && <p className="text-red-500 text-sm">{errors.password}</p>}
                    </div>

                    {errors.message && <p className="text-red-500 text-sm text-center">{errors.message}</p>}

                    <button
                        type="submit"
                        className="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700"
                        disabled={processing}
                    >
                        Entrar
                    </button>
                </form>
                <div className="text-center mt-4">
                    <span>Primeiro cadastro? </span>
                    <a
                        href="/register"
                        className="font-medium text-indigo-600 hover:underline"
                    >
                        Crie uma conta
                    </a>
                </div>
            </div>
        </div>
    )
}
