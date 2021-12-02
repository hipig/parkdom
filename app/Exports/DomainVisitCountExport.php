<?php

namespace App\Exports;

use App\Models\DomainVisit;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DomainVisitCountExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $visits = DomainVisit::query()->selectRaw("domain_id, count(*) count")->orderByDesc('count')->groupBy('domain_id')->with('domain')->get();
        return $visits;
    }

    public function headings(): array
    {
        return [
            '域名',
            '访问总数',
        ];
    }

    public function map($row): array
    {
        return [
            $row->domain->domain,
            $row->count
        ];
    }
}
