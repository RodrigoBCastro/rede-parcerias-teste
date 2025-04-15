import React from 'react'
import { LogOut } from 'lucide-react';
import { router } from "@inertiajs/react";

const LogoutButton: React.FC = () => {

  const handleLogout = () => {
      localStorage.removeItem('jwt_token')
      router.post('/logout')
      window.location.href = "/";
  };

  return (
    <button
      onClick={handleLogout}
      className="flex items-center p-8 gap-2 text-sm text-red-50 hover:text-red-300 transition-colors"
    >
      <LogOut className="h-5 w-5" />
      <span>Sair</span>
    </button>
  );
};

export default LogoutButton;
