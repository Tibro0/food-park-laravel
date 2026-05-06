<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterInfoController extends Controller
{
    public function index()
    {
        $footerInfo = FooterInfo::first();
        return response()->json([
            'status' => 200,
            'data' => $footerInfo
        ], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'short_info' => 'nullable|max:2000',
            'address' => 'nullable|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|max:255',
            'copyright' => 'nullable|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        FooterInfo::updateOrCreate(
            ['id' => 1],
            [
                'short_info' => $request->short_info,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'copyright' => $request->copyright
            ]
        );

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }
}
