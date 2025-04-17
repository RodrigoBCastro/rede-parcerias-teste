import { React, useState, useEffect}  from 'react'
import Modal from './Modal'
import { router } from '@inertiajs/react'
import { Product } from '@/types/Product'

interface ModalProductsProps {
    modalType: 'view' | 'edit' | 'stock' | 'delete' | null
    selectedProduct: Product | null
    closeModal: () => void
}

const modalTitleMap = {
    view: 'Visualizar Produto',
    edit: 'Editar Produto',
    stock: 'Estoque do Produto',
    delete: 'Excluir Produto'
}

export default function ModalProducts({ modalType, selectedProduct, closeModal }: ModalProductsProps) {
    if (!modalType || !selectedProduct) return null

    const [name, setName] = useState(selectedProduct?.name || '');
    const [description, setDescription] = useState(selectedProduct?.description || '');
    const [price, setPrice] = useState(selectedProduct?.price || 0);
    const [quantity, setQuantity] = useState(selectedProduct?.quantity || 0);
    const [category, setCategory] = useState(selectedProduct?.category || '');
    const [sku, setSku] = useState(selectedProduct?.sku || '');

    useEffect(() => {
        if (selectedProduct) {
            setName(selectedProduct.name)
            setDescription(selectedProduct.description)
            setPrice(selectedProduct.price)
            setQuantity(selectedProduct.quantity)
            setCategory(selectedProduct.category)
            setSku(selectedProduct.sku)
        }
    }, [selectedProduct])

    return (
        <Modal
            isOpen={!!modalType}
            onClose={closeModal}
            title={`${modalTitleMap[modalType]}: ${selectedProduct.name}`}
        >

            {modalType === 'view' && (
                <div>
                    <p><strong>Descrição:</strong> {selectedProduct.description}</p>
                    <p><strong>Quantidade:</strong> R$ {selectedProduct.quantity}</p>
                    <p><strong>Preço:</strong> {selectedProduct.price}</p>
                    <p><strong>Categoria:</strong> {selectedProduct.category}</p>
                    <p><strong>SKU:</strong> {selectedProduct.sku}</p>
                </div>
            )}

            {modalType === 'delete' && (
                <div>
                    <p>Tem certeza que deseja excluir <strong>{selectedProduct.name}</strong>?</p>
                    <button
                        onClick={() => {
                            router.delete(`/products/${selectedProduct.id}`, {
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
