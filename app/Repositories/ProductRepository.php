<?php

namespace App\Repositories;

use App\Interface\ProductRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductRepository implements ProductRepositoryInterface
{

    public function Create(array $array)
    {
        DB::beginTransaction();
        try {
            DB::insert(
                'insert into product (product_type_id, name, price, `desc`, created_at) values (?, ?, ?, ?, ?)',
                [$array['productType'], $array['name'], $array['price'], $array['desc'], Carbon::now()]
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
                'update product set product_type_id = ?, name = ?, price = ?, `desc` = ?, created_at = ?, updated_at = ? where id = ?',
                [$array['productType'], $array['name'], $array['price'], $array['desc'], $array['created_at'], Carbon::now(), $id]
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
                'delete from product where id = ?',
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
