<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $reservations
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Reservation Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,approved,complete,cancel',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $reservation->status = $request->status;
        $reservation->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Reservation Not Found!'
            ], 404);
        }

        $reservation->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
