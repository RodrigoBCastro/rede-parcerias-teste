import React from 'react'

export interface CardProps {
    data: any;
    columns: string[];
    actions?: (row: any) => React.ReactNode;
  }

export interface ListCardsProps {
    title: string;
    columns: string[];
    data: any[];
    actions?: (row: any) => React.ReactNode;
    createBtn?: () => React.ReactNode;
    currentPage: number;
    totalPages: number;
    paginationRoute: string;
}
