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

        $evaluation = [];
        $index = 0;
        foreach ($evaluations as $row) {
            if (isset($evaluation[$row->course_id])) {
                if (count($evaluation[$row->course_id]) < 5 && $row->role_name == 'teacher') {
                    array_push($evaluation[$row->course_id], 0);
                }
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
            'Số lượt đánh giá của chuyên gia',
            'Số lượt đánh giá của sinh viên',
            'Số lượt đánh giá của giảng viên',
        ];
    }
}
