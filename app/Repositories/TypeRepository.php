<?php

namespace App\Repositories;

use App\Interface\TypeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class TypeRepository implements TypeRepositoryInterface
{

    public function Create(array $array)
    {
        DB::beginTransaction();
        try {
            DB::insert(
                'insert into product_type (name, `desc`, created_at) values (?, ?, ?)',
                [$array['name'], $array['desc'], Carbon::now()]
            );
            Db::commit();

            return response()->json([
                'message' => 'Success'
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error insert db", [$th]);
            return response()->json([
                'message' => 'Internal Error'
            ], 500);
        }
    }

    public function Update($id, array $array)
    {
        DB::beginTransaction();
        try {
            DB::update(
                'update product_type set name = ?, `desc` = ?, created_at = ?, updated_at = ? where id = ?',
                [$array['name'], $array['desc'], $array['created_at'], Carbon::now(), $id]
            );
            Db::commit();

            return response()->json([
                'message' => 'Success'
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error insert db", [$th]);
            return response()->json([
                'message' => 'Internal Error'
            ], 500);
        }
    }

    public function Delete($id = 0)
    {
        DB::beginTransaction();
        try {
            DB::delete(
                'delete from product_type where id = ?',
                [$id]
            );

            DB::commit();

            return response()->json([
                'message' => 'Success'
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error insert db", [$th]);
            return response()->json([
                'message' => 'Internal Error'
            ], 500);
        }
    }
}
