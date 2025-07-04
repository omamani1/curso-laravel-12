<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TaskExport implements FromCollection, WithHeadings, WithStyles
{
    protected $userId;

    public function __construct()
    {
        // $this->userId = $user_id;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user  = Auth::user();
        return Task::where('user_id', $user->id)->select('id', 'title', 'description')->get();
    }

    public function headings(): array
    {
        return ['Id', 'Titulo', 'Descripcion'];
    }

    public function styles(Worksheet $sheet): array
    {
        $rowCount = $sheet->getHighestRow();
        $styles = [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4F81BD'],
                ],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];

        return $styles;
    }
}
