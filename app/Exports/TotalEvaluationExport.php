<?php


namespace App\Exports;


use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\ReportServiceInterface;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TotalEvaluationExport implements FromCollection, WithHeadings
{
    use Exportable;

    private $reportService;

    public function __construct(ReportServiceInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    public function collection()
    {
        $evaluations = $this->reportService->getTotalEvaluation();

        if (count($evaluations) == 0) {
            return collect([]);
        }

        $evaluation = [];
        $index = 0;
        foreach ($evaluations as $row) {
            if (isset($evaluation[$row->course_id])) {
                array_push($evaluation[$row->course_id], $row->count);
            } else {
                $index++;
                $evaluation[$row->course_id] = array(
                    0 => $index,
                    1 => $row->course->name,
                    2 => $row->course->user->name,
                    3 => $row->count,
                );
            }
        }

        return collect($evaluation);
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên khoá học',
            'Người tạo',
            'Số lượt đánh giá theo bộ tiêu chí ICT NewHouse',
            'Số lượt đánh giá theo bộ tiêu chí của ĐHBK cho sinh viên',
            'Số lượt đánh giá theo bộ tiêu chí của ĐHBK cho giảng viên',
        ];
    }
}
