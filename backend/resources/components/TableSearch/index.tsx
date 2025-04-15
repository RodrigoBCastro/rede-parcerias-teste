import { TableProps } from "./types";
import { useTable } from "./hooks";
import { SearchBar } from "./components/SearchBar";
import { TableContent } from "./components/TableContent";
import { Pagination } from "./components/Pagination";

interface TableSearchProps extends TableProps {
  title: string;
  createBtn: any;
}

export const TableSearch: React.FC<TableSearchProps> = ({
  title,
  columns,
  data,
  actions, createBtn,
  rowsPerPageOptions = [5, 10, 25],
}) => {
  const {
    search,
    setSearch,
    paginatedData,
    totalPages,
    currentPage,
    setCurrentPage,
    rowsPerPage,
    setRowsPerPage,
  } = useTable(data);

  return (
    <div className="lg:pt-10 space-y-4 shadow-md p-10 rounded-md">
      <SearchBar title={title} search={search} createBtn={createBtn} onSearch={(v) => {
        setSearch(v);
        setCurrentPage(1);
      }} />

      <TableContent columns={columns} data={paginatedData} actions={actions} />

      <Pagination
        currentPage={currentPage}
        totalPages={totalPages}
        rowsPerPage={rowsPerPage}
        rowsPerPageOptions={rowsPerPageOptions}
        onRowsPerPageChange={setRowsPerPage}
        onPageChange={setCurrentPage}
      />
    </div>
  );
};
