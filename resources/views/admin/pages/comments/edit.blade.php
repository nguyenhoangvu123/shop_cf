@extends('admin.layouts.master')
@section('afterCss')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h5>TRẢ LỜI BÌNH LUẬN</h5>
                    <a href="{{ route('admin.comment') }}" class="btn btn-warning">Trở về</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="updateComment">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Họ và tên </label>
                            <input type="text" disabled value="{{ $comment->user_name }}" name="name"
                                class="form-control" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Phone</label>
                            <input type="text" disabled value="{{ $comment->user_phone }}" class="form-control" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Email</label>
                            <input type="text" disabled value="{{ $comment->user_email }}" class="form-control" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Bình luận</label>
                            <textarea disabled class="form-control">{{ $comment->user_comment }}</textarea>
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Trả lời bình luận</label>
                            <textarea name="feedbackComment" class="form-control feedbackComment">{{ $childComment ? $childComment->user_comment : '' }}</textarea>
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="button" onclick="comment.update('{{ $comment->id }}')"
                                class="btn btn-primary submit-lg">Cập
                                nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('afterScript')
    <script src="{{ asset('admin/js/comments/update.js') }}"></script>
@endsection
