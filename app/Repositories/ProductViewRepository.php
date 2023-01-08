<?php

namespace App\Repositories;

use App\Interface\ProductViewRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductViewRepository implements ProductViewRepositoryInterface
{

    public function ViewAll()
    {
        try {
            $data = DB::select('select * from product');

            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            Log::error("Error insert db", [$th]);
            return response()->json([
                'message' => 'Internal Error'
            ], 500);
        }
    }

    public function ViewDetails($id)
    {
        try {
            $data = DB::select('select * from product where id = ?', [$id]);
            if (!empty($data)) {
                return response()->json([
                    'message' => 'Success',
                    'data' => $data
                ], 200);
            }

            return response()->json([
                'message' => 'Data tidak di temukan',
                'data' => null
            ], 404);
        } catch (\Throwable $th) {
            Log::error("Error insert db", [$th]);
            return response()->json([
                'message' => 'Internal Error'
            ], 500);
        }
    }
}
