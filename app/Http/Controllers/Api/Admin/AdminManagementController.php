<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 'admin')->select('name', 'email', 'role', 'created_at')->get();
        return response()->json([
            'status' => 200,
            'data' => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin',
            'password' => 'required|confirmed|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::find($id);

        if ($admin == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Admin User Not Found!',
            ], 404);
        }

        if ($id == 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You can not update Super Admin.'
            ], 403);
        }

        return response()->json([
            'status' => 200,
            'data' => $admin
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::find($id);

        if ($admin == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Admin User Not Found!',
            ], 404);
        }

        if ($id == 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You can not update Super Admin.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        if ($request->has('password') && $request->filled('password')) {
            $validator = Validator::make($request->all(), [
                'password' => 'confirmed|min:5',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->errors(),
                ], 400);
            }

            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($id == 1) {
            return response()->json([
                'status' => 403,
                'message' => 'You can not update Super Admin.'
            ], 403);
        }

        $admin = User::find($id);

        if ($admin == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Admin User Not Found!',
            ], 404);
        }

        $admin->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
