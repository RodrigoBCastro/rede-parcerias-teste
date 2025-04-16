import {Package, UsersIcon} from "lucide-react";
import { MenuItemProps } from "./types";

export const menuItems: MenuItemProps[] = [
    {
        label: "Produtos",
        icon: Package,
        href: "/products",
    },
    {
        label: "Usuarios",
        icon: UsersIcon,
        href: "/users",
    },
];
