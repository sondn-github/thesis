<?php


namespace App\Services;


use App\Criteria;
use App\Services\Interfaces\TypeServiceInterface;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeService extends Service implements TypeServiceInterface
{
    public function getTypes() {
        return Type::all();
    }

    public function update($request) {
        $id = $request->get('id');

        if ($id == 2) {
            DB::table('types')->update([
                Type::COL_IS_USING => false,
                Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
            ]);

            return Type::whereIn('name', ['Bộ tiêu chí ĐHBKHN - SV', 'Bộ tiêu chí ĐHBKHN - GV', 'Bộ tiêu chí cho người tạo bài giảng'])
                ->update([
                    Type::COL_IS_USING => true,
                    Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
                ]);
        } else {
            DB::table('types')->update([
                Type::COL_IS_USING => false,
                Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
            ]);

            return Type::findOrFail($id)
                ->update([
                    Type::COL_IS_USING => true,
                    Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
                ]);
        }
    }

    public function isPFR($typeId) {
        return Type::findOrFail($typeId)->is_pfr;
    }

    public function getTypeById($id) {
        return Type::findOrFail($id);
    }

    public function getTypeByName($name) {
        return Type::where('name', $name)
            ->first();
    }

    public function store(Request $request) {
        return Type::create([
            'name' => $request->get('name'),
        ]);
    }

    public function getUsingType()
    {
        return Type::where(Type::COL_IS_USING, 1)
            ->get();
    }

    public function getUsingTypeIdForReport()
    {
        $typeId = $this->getUsingType()->pluck('id');

        if (count($typeId) > 1) {
            return Type::TYPE_DHBK_SV;
        }

        return $typeId;
    }
}
