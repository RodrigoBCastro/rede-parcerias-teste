import React from 'react'
import { useForm } from '@inertiajs/react'
import { Product } from '@/types/Product'
import { User } from '@/types/User'
import Layout from '../../../components/Layout'
import { CATEGORIES } from '../../../constants/categories'

interface Props {
    auth: {
        user: User
    }
    product?: Product
}

export default function ProductForm({ auth, product }: Props) {
    const isEdit = !!product
    const role = auth.user.role

    const { data, setData, post, put, processing } = useForm<Product>({
        name: product?.name || '',
        description: product?.description || '',
        quantity: product?.quantity || 0,
        price: product?.price || 0,
        category: product?.category || '',
        sku: product?.sku || '',
    })

    const isReadOnly = role === 'operador' && isEdit;
    const isEditable = role === 'admin';
    const canUpdateQuantity = role === 'operator' || role === 'admin';

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault()
        isEdit ? put(`/products/${product!.uuid}`) : post('/products')
    }

    return (
        <>

            <Layout user={auth.user}>
                <div className="max-w-xl mx-auto bg-white shadow rounded-lg p-6">
                    <h2 className="text-2xl font-bold mb-4">
                        {isEdit ? 'Editar Produto' : 'Cadastrar Produto'}
                    </h2>

                    <form onSubmit={handleSubmit} className="space-y-4">
                        <div>
                            <label className="block font-medium mb-1">Nome</label>
                            <input
                                type="text"
                                className="w-full border px-3 py-2 rounded"
                                placeholder="Nome"
                                value={data.name}
                                onChange={e => setData('name', e.target.value)}
                                disabled={!isEditable}
                            />
                        </div>

                        <div>
                            <label className="block font-medium mb-1">Descrição</label>
                            <textarea
                                className="w-full border px-3 py-2 rounded"
                                placeholder="Descrição"
                                value={data.description}
                                onChange={e => setData('description', e.target.value)}
                                disabled={!isEditable}
                            />
                        </div>

                        <div>
                            <label className="block font-medium mb-1">Quantidade</label>
                            <input
                                type="number"
                                className="w-full border px-3 py-2 rounded"
                                placeholder="Quantidade"
                                value={data.quantity}
                                onChange={e => setData('quantity', Number(e.target.value))}
                                disabled={!canUpdateQuantity}
                            />
                        </div>

                        {!isReadOnly && (
                            <div>
                                <label className="block font-medium mb-1">Preço</label>
                                <input
                                    type="number"
                                    className="w-full border px-3 py-2 rounded"
                                    placeholder="Preço"
                                    value={data.price}
                                    onChange={e => setData('price', Number(e.target.value))}
                                    disabled={!isEditable}
                                />
                            </div>
                        )}

                        <div>
                            <label className="block font-medium mb-1">Categoria</label>
                            <select
                                className="w-full border px-3 py-2 rounded"
                                value={data.category}
                                onChange={e => setData('category', e.target.value)}
                                disabled={!isEditable}
                            >
                                <option value="">Selecione uma categoria</option>
                                {CATEGORIES.map((cat) => (
                                    <option key={cat} value={cat}>
                                        {cat}
                                    </option>
                                ))}
                            </select>
                        </div>

                        <div>
                            <label className="block font-medium mb-1">SKU</label>
                            <input
                                type="text"
                                className="w-full border px-3 py-2 rounded"
                                placeholder="SKU"
                                value={data.sku}
                                onChange={e => setData('sku', e.target.value)}
                                disabled={!isEditable}
                            />
                        </div>

                        <button
                            type="submit"
                            className="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                            disabled={processing}
                        >
                            {isEdit ? 'Atualizar' : 'Cadastrar'}
                        </button>
                    </form>
                </div>
            </Layout>
        </>
    )
}
