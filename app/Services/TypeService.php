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
        $id = $request->id;

        if ($id == 1) {
            DB::table('types')->update([
                Type::COL_IS_USING => false,
                Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
            ]);

            return Type::findOrFail($id)
                ->update([
                    Type::COL_IS_USING => true,
                    Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
                ]);
        } else {
            DB::table('types')->update([
                Type::COL_IS_USING => true,
                Type::COL_IS_PFR => $request->input(Type::COL_IS_PFR),
            ]);

            return Type::findOrFail(Type::TYPE_ICT)
                ->update([
                    Type::COL_IS_USING => false,
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
}
