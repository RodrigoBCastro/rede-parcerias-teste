import React from "react";
import { CardProps } from "../types";

const Card: React.FC<CardProps> = ({ data, columns, actions }) => {
  return (
    <div className="bg-white rounded-lg shadow p-4 border border-gray-200 mb-3">
      {columns.map((key, index) => (
        <div key={index} className="text-sm mb-1">
          <strong className="capitalize">{key}:</strong> {data[key]}
        </div>
      ))}

      {actions && (
        <div className="mt-3 flex gap-2">
          {actions(data)}
        </div>
      )}
    </div>
  );
};

export default Card;
