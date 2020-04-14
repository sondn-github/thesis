<?php


namespace App\Services;


use App\Fact;
use App\Http\Requests\StoreFactRequest;
use App\Http\Requests\UpdateFactRequest;
use App\Services\Interfaces\FactServiceInterface;

class FactService extends Service implements FactServiceInterface
{
    public function changeStatus($request) {
        return Fact::findOrFail($request->id)
            ->update([
                Fact::COL_STATUS => $request->input(Fact::COL_STATUS),
            ]);
    }

    public function store(StoreFactRequest $request) {
        return Fact::create([
            Fact::COL_CODE => $request->input(Fact::COL_CODE),
            Fact::COL_TYPE => $request->input(Fact::COL_TYPE),
            Fact::COL_DESCRIPTION => $request->input(Fact::COL_DESCRIPTION),
        ]);
    }

    public function getFactById($id) {
        return Fact::findOrFail($id);
    }

    public function update(UpdateFactRequest $request, $id) {
        return Fact::findOrFail($id)
            ->update([
                Fact::COL_CODE => $request->input(Fact::COL_CODE),
                Fact::COL_TYPE => $request->input(Fact::COL_TYPE),
                Fact::COL_DESCRIPTION => $request->input(Fact::COL_DESCRIPTION),
            ]);
    }
}
