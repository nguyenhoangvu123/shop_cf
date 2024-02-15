<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comments\UpdateCommentRequest;

class CommentController extends Controller
{

    public function __construct(protected Comment $comment)
    {
    }

    public function index(Request $request)
    {
        return view('admin.pages.comments.index');
    }

    public function list(Request $request)
    {
        $listComment = $this->comment->where("type", Comment::USER_COMMENT)->filter($request)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view  = view('admin.pages.comments.list', [
            'listComment' => $listComment
        ])->render();
        return response()->json(['data' => $view]);
    }

    public function edit($id)
    {
        $comment = $this->comment->with("childComment")->find($id);
        $childComment = $comment->childComment ? $comment->childComment->first() : "";
        if (!$comment) {
            return abort(404);
        }
        return view('admin.pages.comments.edit', ['comment' => $comment, 'childComment' => $childComment]);
    }

    public function update(UpdateCommentRequest $request, $id)
    {
        $comment = $this->comment->find($id);
        if (!$comment) {
            return [
                'error' => true,
                'message' => 'Trả lời bình luận thất bại'
            ];
        }
        $storeComment = $this->comment->create([
            'user_name' => 'C.ty Pixcel Decor',
            'user_phone' => '0396438360',
            'user_email' => 'vuhoangnguyen200896@gmail.com',
            'id_post' => $comment->id_post,
            'parent_id' => $comment->id,
            'user_comment' => $request->feedbackComment,
            'type' => Comment::ADMIN_COMMENT
        ]);

        if (!$storeComment) {
            return [
                'error' => true,
                'message' => 'Trả lời bình luận thất bại'
            ];
        }

        $comment->update(
            [
                'status' => 1
            ]
        );

        return [
            'error' => false,
            'message' => 'Trả lời bình luận thành công'
        ];
    }

    public function delete($id)
    {
        $comment = $this->comment->find($id);
        if (!$comment) {
            return [
                'error' => true,
                'message' => 'Xoá comment thất bại'
            ];
        }
        $comment->childComment()->delete();
        $comment->delete();
        return [
            'error' => false,
            'message' => 'Xoá comment thành công'
        ];
    }
}
