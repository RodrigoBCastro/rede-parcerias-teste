import React from 'react'

interface TableProps {
  columns: string[];
  data: any[];
  actions?: (row: any) => React.ReactNode;
  rowsPerPageOptions?: number[];
}

export interface TableSearchProps extends TableProps {
    title: string;
    createBtn?: any;
    isSearchable?: boolean;
    currentPage: number;
    totalPages: number;
    paginationRoute: string;
}
