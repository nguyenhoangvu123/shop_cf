<ul>
    @foreach ($listComment as $comment)
        <li class="comment-{{ $comment->id }}">
            <div class="box-comment">
                <div class="aut">{{ $comment->user_name }}</div>
                <div class="comment-body">{{ $comment->user_comment }}</div>
            </div>
            @if ($comment->childComment->count() > 0)
                @foreach ($comment->childComment as $childComment)
                    <ul>
                        <li class="comment-{{ $comment->id }}-{{ $childComment->id }}">
                            <div class="box-comment">
                                <div class="aut">{{ $childComment->user_name }}</div>
                                <div class="comment-body">
                                    {{ $childComment->user_comment }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>
                    </ul>
                @endforeach
            @endif
            <div class="clear"></div>
        </li>
    @endforeach
</ul>
<div class="clear"></div>
</li>
</ul>
