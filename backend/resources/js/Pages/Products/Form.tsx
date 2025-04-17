import React from 'react'
import { useForm } from '@inertiajs/react'
import { Product } from '@/types/Product'
import { User } from '@/types/User'
import Layout from '../../../components/Layout'
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
        isEdit ? put(`/products/${product!.id}`) : post('/products')
    }

    return (
        <>

            <Layout user={auth.user}>
                <div className="max-w-xl mx-auto bg-white shadow rounded-lg p-6">
                    <h2 className="text-2xl font-bold mb-4">
                        {isEdit ? 'Editar Produto' : 'Cadastrar Produto'}
                    </h2>

                    <form onSubmit={handleSubmit} className="space-y-4">
                        <input
                            type="text"
                            className="w-full border px-3 py-2 rounded"
                            placeholder="Nome"
                            value={data.name}
                            onChange={e => setData('name', e.target.value)}
                            disabled={ !isEditable }
                        />

                        <textarea
                            className="w-full border px-3 py-2 rounded"
                            placeholder="Descrição"
                            value={data.description}
                            onChange={e => setData('description', e.target.value)}
                            disabled={ !isEditable }
                        />

                        <input
                            type="number"
                            className="w-full border px-3 py-2 rounded"
                            placeholder="Quantidade"
                            value={data.quantity}
                            onChange={e => setData('quantity', Number(e.target.value))}
                            disabled={ !canUpdateQuantity}
                        />

                        {!isReadOnly && (
                            <input
                                type="number"
                                className="w-full border px-3 py-2 rounded"
                                placeholder="Preço"
                                value={data.price}
                                onChange={e => setData('price', Number(e.target.value))}
                                disabled={ !isEditable }
                            />
                        )}

                        <input
                            type="text"
                            className="w-full border px-3 py-2 rounded"
                            placeholder="Categoria"
                            value={data.category}
                            onChange={e => setData('category', e.target.value)}
                            disabled={ !isEditable }
                        />

                        <input
                            type="text"
                            className="w-full border px-3 py-2 rounded"
                            placeholder="sku"
                            value={data.sku}
                            onChange={e => setData('sku', e.target.value)}
                            disabled={ !isEditable }
                        />

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
