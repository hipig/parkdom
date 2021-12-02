<?php

namespace App\Exports;

use App\Models\DomainHit;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DomainHitCountExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hits = DomainHit::query()->selectRaw("domain_id, sum(times) times")->orderByDesc('times')->groupBy('domain_id')->with('domain')->get();
        return $hits;
    }

    public function headings(): array
    {
        return [
            '域名',
            '点击总数',
        ];
    }

    public function map($row): array
    {
        return [
            $row->domain->domain,
            $row->times
        ];
    }
}
