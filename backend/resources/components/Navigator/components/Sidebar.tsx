import React from 'react'
import { X, Menu } from "lucide-react";
import { menuItems } from "../menuItems";
import { BtnLogout } from "../../../components"
import MenuItem from "./MenuItem";
import logo_branca from '../../../assets/logo_branca.png'

interface SidebarProps {
  isOpen?: boolean;
  toggleMenu?: () => void;
  isMobile?: boolean;
}

export default function Sidebar({ isOpen = false, toggleMenu, isMobile = false }: SidebarProps) {
  return (
    <div
      className={`${
        isMobile
          ? "lg:hidden fixed top-0 left-0 w-64 h-full z-50"
          : "hidden lg:flex fixed top-0 left-0 w-64 h-screen z-40"
      } bg-indigo-600 text-white flex flex-col justify-between`}
    >
      <div className="flex flex-col">
        <div className="flex flex-col justify-content-center align-items-center">
          {isMobile && toggleMenu && (
            <button className="py-4 pl-3" onClick={toggleMenu}>
              {isOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          )}
          <img className='w-3/4 self-center pb-5 lg:pt-5' src={logo_branca}></img>
        </div>
        <hr className="border-indigo-400" />
        <nav className="p-4 space-y-4">
            {menuItems.map((item, index) => (
                <MenuItem key={index} {...item} />
            ))}
        </nav>
      </div>
    </div>
  );
}
