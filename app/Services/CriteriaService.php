<?php


namespace App\Services;


use App\Course;
use App\Criteria;
use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Type;

class CriteriaService extends Service implements CriteriaServiceInterface
{
    public function getAllCriteria()
    {
        $typesId = Type::select(Type::COL_ID)
            ->get();

        return Criteria::where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
            ->whereIn(Criteria::COL_TYPE_ID, $typesId)
            ->get();
    }

    public function getUsingTypeId() {
        return Type::select(Type::COL_ID)
            ->where(Type::COL_IS_USING, true)
            ->get();
    }

    public function getUsingCriteria()
    {
        $typesId = $this->getUsingTypeId();

        return Criteria::where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
            ->whereIn(Criteria::COL_TYPE_ID, $typesId)
            ->get();
    }

    public function changeStatus($request) {
        return Criteria::findOrFail($request->id)
            ->update([
                Criteria::COL_STATUS => $request->input(Criteria::COL_STATUS),
            ]);
    }

    public function getCriteriaById($id) {
        return Criteria::findOrFail($id);
    }

    public function update(UpdateCriteriaRequest $request, $id) {
        return Criteria::findOrFail($id)
            ->update([
                Criteria::COL_CODE => $request->input(Criteria::COL_CODE),
                Criteria::COL_NAME => $request->input(Criteria::COL_NAME),
                Criteria::COL_DESCRIPTION => $request->input(Criteria::COL_DESCRIPTION),
                Criteria::COL_EXPLAIN => $request->input(Criteria::COL_EXPLAIN),
                Criteria::COL_EXAMPLE => $request->input(Criteria::COL_EXAMPLE),
                Criteria::COL_WEIGHT => $request->input(Criteria::COL_WEIGHT),
                Criteria::COL_TYPE_ID => $request->input((Criteria::COL_TYPE_ID)),
            ]);
    }

    public function store(StoreCriteriaRequest $request) {
        return Criteria::create([
            Criteria::COL_CODE => $request->input(Criteria::COL_CODE),
            Criteria::COL_NAME => $request->input(Criteria::COL_NAME),
            Criteria::COL_DESCRIPTION => $request->input(Criteria::COL_DESCRIPTION),
            Criteria::COL_EXPLAIN => $request->input(Criteria::COL_EXPLAIN),
            Criteria::COL_EXAMPLE => $request->input(Criteria::COL_EXAMPLE),
            Criteria::COL_WEIGHT => $request->input(Criteria::COL_WEIGHT),
            Criteria::COL_TYPE_ID => $request->input((Criteria::COL_TYPE_ID)),
        ]);
    }

    public function getCriteriaByUser($user, $courseId) {
        $typeICT = Type::find(Type::TYPE_ICT);
        $course = Course::find($courseId);

        if ($typeICT->is_using == 1) {
            return Criteria::where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
                ->where(Criteria::COL_TYPE_ID, Type::TYPE_ICT)
                ->orderBy(Criteria::COL_ID, 'asc')
                ->get();
        } else {
            if ($user->role->name == 'student') {
                return Criteria::where(Criteria::COL_TYPE_ID, Type::TYPE_DHBK_SV)
                    ->where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
                    ->orderBy(Criteria::COL_ID, 'asc')
                    ->get();
            } elseif($course->user_id == $user->id) {
                return Criteria::where(Criteria::COL_TYPE_ID, Type::TYPE_GV)
                    ->where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
                    ->orderBy(Criteria::COL_ID, 'asc')
                    ->get();
            } else {
                return Criteria::where(Criteria::COL_TYPE_ID, Type::TYPE_DHBK_GV)
                    ->where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
                    ->orderBy(Criteria::COL_ID, 'asc')
                    ->get();
            }
        }
    }

    public function getCriteriaByTypeId($typeId) {
        return Type::with('criteria')
            ->where(Type::COL_ID, $typeId)
            ->firstOrFail();
    }
}
