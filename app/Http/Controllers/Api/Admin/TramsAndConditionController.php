<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\TramsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TramsAndConditionController extends Controller
{
    public function index()
    {
        $tramsAndCondition = TramsAndCondition::first();
        return response()->json([
            'status' => 200,
            'data' => $tramsAndCondition
        ], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        TramsAndCondition::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ]);
    }
}
