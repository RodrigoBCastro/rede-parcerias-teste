export interface CardProps {
    data: any;
    columns: string[];
    actions?: (row: any) => React.ReactNode;
  }

  export interface ListCardProps {
    title?: string;
    columns: string[];
    data: any[];
    actions?: (row: any) => React.ReactNode;
    createBtn?: () => React.ReactNode;
    rowsPerPageOptions?: number[];
  }
