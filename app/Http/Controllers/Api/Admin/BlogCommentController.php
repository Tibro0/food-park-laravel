<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCommentController extends Controller
{
    public function index()
    {
        $blogComments = BlogComment::with('blog:id,title', 'user:id,name')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $blogComments
        ], 200);
    }

    public function statusChange(Request $request, string $id)
    {
        $comment = BlogComment::find($id);

        if ($comment == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Comment Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $comment->status = $request->status;
        $comment->save();

        return response()->json([
            'status' => 200,
            'message' => 'Status Has Been Change.'
        ], 200);
    }

    public function destroy(string $id)
    {
        $comment = BlogComment::find($id);

        if ($comment == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Comment Not Found!',
            ], 404);
        }

        $comment->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ]);
    }
}
