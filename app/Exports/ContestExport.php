<?php

namespace App\Exports;

use App\Models\Contest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContestExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contest::join('departments', 'contests.department_id', '=', 'departments.id')
        ->leftJoin('cities', 'contests.city_id', '=', 'cities.id')
        ->select(
            'contests.id',
            'contests.name',
            'last_name',
            'email',
            'phone',
            'winner',
            'departments.name AS department',
            'cities.name AS city',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'name',
            'last name',
            'email',
            'phone',
            'winner',
            'department',
            'city',
            'created (utc)',
        ];
    }
}
