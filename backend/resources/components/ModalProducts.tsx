import React, { useState, useEffect}  from 'react'
import Modal from './Modal'
import { router } from '@inertiajs/react'
import { Product } from '@/types/Product'
import { CATEGORIES } from '../constants/categories'

interface ModalProductsProps {
    modalType: 'view' | 'edit' | 'stock' | 'delete' | 'create' | null
    selectedProduct: Product | null
    closeModal: () => void
    role: 'admin' | 'operator' | 'common'
}

const modalTitleMap = {
    view: 'Visualizar Produto',
    edit: 'Editar Produto',
    create: 'Cadastrar Produto',
    stock: 'Estoque do Produto',
    delete: 'Excluir Produto'
}

export default function ModalProducts({ modalType, selectedProduct, closeModal, role }: ModalProductsProps) {
    if (!modalType || (modalType !== 'create' && !selectedProduct)) return null

    const [name, setName] = useState(selectedProduct?.name || '');
    const [description, setDescription] = useState(selectedProduct?.description || '');
    const [price, setPrice] = useState(selectedProduct?.price || 0);
    const [quantity, setQuantity] = useState(selectedProduct?.quantity || 0);
    const [category, setCategory] = useState(selectedProduct?.category || '');
    const [sku, setSku] = useState(selectedProduct?.sku || '');
    const [createdAt, setCreatedAt] = useState(selectedProduct?.createdAt || '');
    const [updatedAt, setUpdatedAt] = useState(selectedProduct?.updatedAt || '');

    const isEditable = role === 'admin';

    useEffect(() => {
        if (selectedProduct) {
            setName(selectedProduct.name)
            setDescription(selectedProduct.description)
            setPrice(selectedProduct.price)
            setQuantity(selectedProduct.quantity)
            setCategory(selectedProduct.category)
            setSku(selectedProduct.sku)
            setCreatedAt(selectedProduct.createdAt)
            setUpdatedAt(selectedProduct.updatedAt)
        }
    }, [selectedProduct])

    return (
        <Modal
            isOpen={!!modalType}
            onClose={closeModal}
            title={`${modalTitleMap[modalType]}: ${sku}`}
        >

            {(modalType === 'edit' || modalType === 'create') && (
                <div>
                    <form
                        onSubmit={(e) => {
                            e.preventDefault();

                            const payload = {
                                name,
                                description,
                                quantity,
                                price,
                                category,
                                sku,
                            };

                            if (modalType === 'edit')
                                router.put(`/products/${selectedProduct?.uuid}`, payload, { onFinish: closeModal });
                            else
                                router.post('/products', payload, { onFinish: closeModal })
                        }}
                        className="space-y-4"
                    >
                        <div>
                            <label className="block font-medium mb-1">Nome</label>
                            <input
                                type="text"
                                className="w-full border px-3 py-2 rounded"
                                value={name}
                                onChange={(e) => setName(e.target.value)}
                                disabled={!isEditable}
                            />
                        </div>

                        <div>
                            <label className="block font-medium mb-1">Descrição</label>
                            <textarea
                                className="w-full border px-3 py-2 rounded"
                                value={description}
                                onChange={(e) => setDescription(e.target.value)}
                                disabled={!isEditable}
                            />
                        </div>

                        <div>
                            <label className="block font-medium mb-1">Quantidade</label>
                            <input
                                type="number"
                                className="w-full border px-3 py-2 rounded"
                                value={quantity}
                                onChange={(e) => setQuantity(Number(e.target.value))}
                            />
                        </div>

                        <div>
                            <label className="block font-medium mb-1">Preço</label>
                            <input
                                type="number"
                                className="w-full border px-3 py-2 rounded"
                                value={price}
                                onChange={(e) => setPrice(Number(e.target.value))}
                                disabled={!isEditable}
                            />
                        </div>

                        <div>
                            <label className="block font-medium mb-1">Categoria</label>
                            <select
                                className="w-full border px-3 py-2 rounded"
                                value={category}
                                onChange={(e) => setCategory(e.target.value)}
                                disabled={!isEditable}
                            >
                                <option value="">Selecione</option>
                                {CATEGORIES.map((cat) => (
                                    <option key={cat} value={cat}>{cat}</option>
                                ))}
                            </select>
                        </div>

                        <div>
                            <label className="block font-medium mb-1">SKU</label>
                            <input
                                type="text"
                                className="w-full border px-3 py-2 rounded"
                                value={sku}
                                onChange={(e) => setSku(e.target.value)}
                                disabled={!isEditable}
                            />
                        </div>

                        <button
                            type="submit"
                            className="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                        >
                            {modalType === 'edit' ? 'Atualizar' : 'Cadastrar'}
                        </button>
                    </form>
                </div>
            )}

            {modalType === 'view' && (
                <div>
                    <p><strong>Name:</strong> {name}</p>
                    <p><strong>Descrição:</strong> {description}</p>
                    <p><strong>Quantidade:</strong> {price}</p>
                    <p><strong>Preço:</strong> R$ {quantity}</p>
                    <p><strong>Categoria:</strong> {category}</p>
                    <p><strong>Criado:</strong> {createdAt}</p>
                    <p><strong>Atualizado:</strong> {updatedAt}</p>
                </div>
            )}

            {modalType === 'delete' && (
                <div>
                    <p>Tem certeza que deseja excluir <strong>{selectedProduct.name}</strong>?</p>
                    <button
                        onClick={() => {
                            router.delete(`/products/${selectedProduct.uuid}`, {
                                onFinish: closeModal,
                            })
                        }}
                        className="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mt-4"
                    >
                        Confirmar exclusão
                    </button>
                </div>
            )}
        </Modal>
    )
}
