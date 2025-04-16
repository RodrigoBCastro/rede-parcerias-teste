import React from 'react'
import { Menu, X } from "lucide-react";
import miniatura from '../../../assets/miniatura.png'

interface MobileHeaderProps {
  isOpen: boolean;
  toggleMenu: () => void;
}

export default function MobileHeader({ isOpen, toggleMenu }: MobileHeaderProps) {
  return (
    <header className="lg:hidden bg-white shadow-md px-4 py-3 flex justify-between items-center fixed w-full top-0 left-0 z-50">
      <button onClick={toggleMenu}>
        {isOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
      </button>
      <img className='max-w-10 self-center' src={miniatura}></img>
    </header>
  );
}
