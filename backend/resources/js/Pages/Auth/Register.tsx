import React from 'react'
import { useForm } from '@inertiajs/react'

export default function Register() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    })

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault()
        post('/register')
    }

    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-100">
            <div className="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                <h2 className="text-2xl font-bold mb-6 text-center">Registro</h2>

                <form onSubmit={handleSubmit} className="space-y-4">
                    <div>
                        <label className="block text-sm">Nome</label>
                        <input
                            type="text"
                            className="w-full border px-3 py-2 rounded"
                            value={data.name}
                            onChange={e => setData('name', e.target.value)}
                            required
                        />
                        {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}
                    </div>

                    <div>
                        <label className="block text-sm">Email</label>
                        <input
                            type="email"
                            className="w-full border px-3 py-2 rounded"
                            value={data.email}
                            onChange={e => setData('email', e.target.value)}
                            required
                        />
                        {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
                    </div>

                    <div>
                        <label className="block text-sm">Senha</label>
                        <input
                            type="password"
                            className="w-full border px-3 py-2 rounded"
                            value={data.password}
                            onChange={e => setData('password', e.target.value)}
                            required
                        />
                        {errors.password && <p className="text-red-500 text-sm">{errors.password}</p>}
                    </div>

                    <div>
                        <label className="block text-sm">Confirme a Senha</label>
                        <input
                            type="password"
                            className="w-full border px-3 py-2 rounded"
                            value={data.password_confirmation}
                            onChange={e => setData('password_confirmation', e.target.value)}
                            required
                        />
                    </div>

                    <button
                        type="submit"
                        className="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700"
                        disabled={processing}
                    >
                        Registrar
                    </button>
                </form>
                <div className="text-center mt-4">
                    <span>Já tem uma conta? </span>
                    <a
                        href="/login"
                        className="font-medium text-indigo-600 hover:underline"
                    >
                        Entrar
                    </a>
                </div>
            </div>
        </div>
    )
}
