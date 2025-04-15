import React from 'react'
import { MenuItemProps } from "../types";

export default function MenuItem({ label, icon: Icon, href }: MenuItemProps) {
  return (
    <a href={href} className="flex gap-2 items-center hover:text-indigo-200">
      <Icon /> {label}
    </a>
  );
}
