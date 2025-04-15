import React from 'react'
import { useState, useEffect } from "react";
import Sidebar from "./components/Sidebar";
import MobileHeader from "./components/MobileHeader";

export default function Navigator() {
  const [isOpen, setIsOpen] = useState(false);
  const toggleMenu = () => setIsOpen((prev) => !prev);

  useEffect(() => {
    document.body.style.overflow = isOpen ? "hidden" : "auto";
  }, [isOpen]);

  return (
    <>
      <Sidebar />
      <MobileHeader isOpen={isOpen} toggleMenu={toggleMenu} />
      {isOpen && <Sidebar isOpen={isOpen} toggleMenu={toggleMenu} isMobile />}
    </>
  );
}
