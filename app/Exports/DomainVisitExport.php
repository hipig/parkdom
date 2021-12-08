<?php

namespace App\Exports;

use App\Models\DomainVisit;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DomainVisitExport implements  FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection|\Illuminate\Support\LazyCollection
    */
    public function collection()
    {
        return DomainVisit::query()->with('domain')->cursor();
    }

    public function headings(): array
    {
        return [
            '域名',
            'Host',
            'IP',
            '国家',
            '设备',
            '设备类型',
            '平台',
            '浏览器',
            '{{ __('Created at') }}',
        ];
    }

    public function map($row): array
    {
        return [
            $row->domain->domain,
            $row->host,
            $row->ip,
            $row->country,
            $row->device,
            $row->device_type,
            $row->platform,
            $row->browser,
            $row->created_at,
        ];
    }
}
