<?php


namespace App\Exports;


use App\Evaluation;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\TypeServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetailEvaluationOfCourse implements FromCollection, WithHeadings
{
    use Exportable;

    private $typeService;
    private $evaluationService;
    private $criteriaService;
    private $request;

    public function __construct(TypeServiceInterface $typeService,
                                EvaluationServiceInterface $evaluationService,
                                CriteriaServiceInterface $criteriaService,
                                Request $request)
    {
        $this->typeService = $typeService;
        $this->evaluationService = $evaluationService;
        $this->criteriaService = $criteriaService;
        $this->request = $request;
    }

    public function collection()
    {
        $type = $this->criteriaService->getCriteriaByTypeId($this->typeService->getUsingTypeIdForReport());
        $evaluation = $this->evaluationService->reportEvaluationsOfCourse($this->request->route('course_id'), $this->request, $this->typeService->getUsingTypeIdForReport());
        $data = [];

        if (count($evaluation) == 0) {
            return collect([]);
        }

        foreach ($type->criteria as $key => $criterion) {
            $data[$key] = [
                0 => $key + 1,
                1 => $criterion->code,
                2 => $criterion->name,
                3 => $evaluation[$criterion->code][Evaluation::AGREEMENT],
                4 => $evaluation[$criterion->code][Evaluation::NEUTRAL],
                5 => $evaluation[$criterion->code][Evaluation::DISAGREEMENT],
                6 => $evaluation[$criterion->code][Evaluation::REFUSAL],
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'STT',
            'Mã tiêu chí',
            'Tiêu chí',
            'Đồng ý',
            'Trung lập',
            'Không đồng ý',
            'Từ chối trả lời',
        ];
    }
}
