import React from "react";

interface SearchBarProps {
  title: string;
  search: string;
  createBtn: any;
  onSearch: (value: string) => void;
}

export const SearchBar: React.FC<SearchBarProps> = ({ title, search, createBtn = null, onSearch }) => {
  return (
    <div className="flex flex-col gap-2 space-y-2">
      <h2 className="text-2xl font-bold text-indigo-500">{title}</h2>
      <div className="flex flex-row justify-between gap-2 items-center w-full">
          {createBtn != null && createBtn()}
          <div className={"flex flex-row justify-end items-center w-2/3"}>
              <label className="text-indigo-500 font-semibold">Buscar Produto:</label>
              <input
                  type="text"
                  placeholder="Buscar..."
                  value={search}
                  onChange={(e) => onSearch(e.target.value)}
                  className="border-b p-1 border-indigo-500"
              />
          </div>
      </div>

    </div>
  );
};
