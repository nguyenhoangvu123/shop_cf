<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Admin\Comment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\CommentIntroduce;
use App\Http\Requests\Client\Comment\StoreIntroduceRequest;

class CommentIntroduceController extends Controller
{
    public function __construct(
        protected Comment $comment
    ) {
    }


    public function list(Request $request)
    {
        $listComment = $this
            ->comment
            ->whereNull('parent_id')
            ->with('childComment')
            ->orderBy('id', 'DESC')
            ->where("id_post", $request->id)
            ->get();
        $view = view('client.components.comment.list', [
            'listComment' => $listComment
        ])->render();
        return response()->json([
            'view' => $view
        ]);
    }


    public function store(StoreIntroduceRequest $request)
    {
        try {
            $dataInsert = [
                'user_name' => $request->name,
                'user_phone' => $request->phone,
                'user_email' => $request->email,
                'user_comment' => $request->comment,
                'id_post' => $request->postId
            ];
            $insertDataComment = $this->comment->insert(
                $dataInsert
            );
            if (!$insertDataComment) {
                $result = [
                    'error' => true,
                    'message' => 'Lưu bình luận thất bại',
                    'view' => ''
                ];
            }
            $result = [
                'error' => false,
                'message' => 'Lưu bình luận thành công',
            ];

            return response()->json($result);
        } catch (\Exception $e) {
            Log::info('add comment introduce error : ' . $e->getMessage());
        }
    }
}
