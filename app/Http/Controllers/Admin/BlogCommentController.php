<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index(BlogCommentDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.blog-comment.index');
    }

    public function updateStatus(string $id)
    {
        $comment = BlogComment::findOrFail($id);

        $comment->status = !$comment->status;
        $comment->save();

        toastr()->success('Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
