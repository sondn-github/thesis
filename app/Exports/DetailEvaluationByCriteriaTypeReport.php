<?php


namespace App\Exports;


use App\Services\Interfaces\ReportServiceInterface;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetailEvaluationByCriteriaTypeReport implements FromCollection, WithHeadings
{
    use Exportable;

    private $reportService;
    private $criteriaType;

    public function __construct(ReportServiceInterface $reportService, $criteriaType)
    {
        $this->reportService = $reportService;
        $this->criteriaType = $criteriaType;
    }

    public function collection()
    {
        $evaluations = $this->reportService->getDetailEvaluationByCriteriaType($this->criteriaType);
        if (count($evaluations) == 0) {
            return collect([]);
        }

        $evaluation = [];
        $index = 0;

        foreach ($evaluations as $row) {
            if (!isset($evaluation[$row->course_id])) {
                $index++;
                $evaluation[$row->course_id] = array(
                    0 => $index,
                    1 => $row->course->name,
                    2 => $row->course->user->name,
                    3 => 0,
                    4 => 0,
                    5 => 0,
                );
            }

            if ($row->role_name == 'expert') {
                $evaluation[$row->course_id][3] = $row->count;
            } elseif ($row->role_name == 'student') {
                $evaluation[$row->course_id][4] = $row->count;
            } elseif ($row->role_name == 'teacher') {
                $evaluation[$row->course_id][5] = $row->count;
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
            'Số lượt đánh giá của chuyên gia',
            'Số lượt đánh giá của sinh viên',
            'Số lượt đánh giá của giảng viên',
        ];
    }
}
