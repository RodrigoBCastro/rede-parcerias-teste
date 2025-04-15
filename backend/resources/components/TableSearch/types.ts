export interface TableProps {
  columns: string[];
  data: any[];
  actions?: (row: any) => React.ReactNode;
  rowsPerPageOptions?: number[];
}
