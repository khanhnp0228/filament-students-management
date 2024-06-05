<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct(public Collection $records)
    {
        // $this->records = $records;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->records;
    }

    public function map($row): array
    {
        // TODO: Implement map() method.
        return [
            $row->name,
            $row->email,
            $row->phone_number,
            $row->class->name,
            $row->section->name,
            $row->created_at,
        ];
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'Name',
            'Email',
            'Phone',
            'Class',
            'Section',
            'Created At'
        ];
    }
}
