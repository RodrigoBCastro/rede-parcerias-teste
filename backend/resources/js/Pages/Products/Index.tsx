import { React, useState } from 'react';
import ModalProducts from '../../../components/ModalProducts';
import { Eye, Pencil, CirclePlus, Trash,} from "lucide-react";
import { Navigator, TableSearch, ListCards,} from "../../../components";
import Layout from '../../../components/Layout';
import {User} from "@/types/User";

interface Product {
    id: number
    name: string
    description: string
    quantity: number
    price: number
    category: string
    sku: string
}

interface Props {
    auth: {
        user: User
    }
    products: Product[]
}

export default function Products({ auth, products }: Props) {
    const [selectedProduct, setSelectedProduct] = useState<Product | null>(null)
    const [modalType, setModalType] = useState<'view' | 'delete' | null>(null)

    const role = auth.user.role
    const canEdit = role === 'admin' || role === 'operator'
    const canRemove = role === 'admin'

    const columns = ["name", "quantity", "category", "price", "sku"];

    const openModal = (type: typeof modalType, product: Product) => {
        setSelectedProduct(product)
        setModalType(type)
    }

    const closeModal = () => {
        setSelectedProduct(null)
        setModalType(null)
    }

    const actions = (item: Product) => {
        return (
            <div className="flex gap-2 text-indigo-500">
                <button onClick={() => openModal('view', item)} className="hover:text-indigo-950">
                    <Eye />
                </button>

                { canEdit && (
                    <button onClick={() => window.location.href = `/products/${item.id}/edit`} className="hover:text-indigo-950">
                        <Pencil />
                    </button>
                )}

                { canRemove && (
                <button onClick={() => openModal('delete', item)} className="hover:text-indigo-950">
                    <Trash />
                </button>
                )}
            </div>
        )
    }

    const createBtn = () => {
        if (!canRemove) return (
            <div></div>
        );

        return (
            <button onClick={() => window.location.href = `/products/create`} className="flex justify-between gap-2 p-2 bg-indigo-500 text-white rounded hover:text-indigo-950">
                <CirclePlus /> Create Product
            </button>
        )
    }


    return (
        <>
            <Layout user={auth.user}>
                <div className="block lg:hidden">
                    <ListCards title={"Produtos"} columns={columns} data={products} actions={actions} createBtn={createBtn}></ListCards>
                </div>
                <div className="hidden lg:block">
                    <TableSearch title={"Produtos"} columns={columns} data={products} actions={actions} createBtn={createBtn}></TableSearch>
                </div>
            </Layout>
            <ModalProducts
                modalType={modalType}
                selectedProduct={selectedProduct}
                closeModal={closeModal}
            />
        </>
    )
}
