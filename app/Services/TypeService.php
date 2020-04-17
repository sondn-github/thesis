<?php


namespace App\Services;


use App\Services\Interfaces\TypeServiceInterface;
use App\Type;
use Illuminate\Support\Facades\DB;

class TypeService extends Service implements TypeServiceInterface
{
    public function getTypes() {
        return Type::all();
    }

    public function update($id) {
        DB::table('types')->update([
            Type::COL_IS_USING => false,
        ]);

        return Type::findOrFail($id)
            ->update([
                Type::COL_IS_USING => true,
            ]);
    }
}
