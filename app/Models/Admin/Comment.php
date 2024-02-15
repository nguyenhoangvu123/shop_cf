<?php

namespace App\Models\Admin;

use App\Models\Admin\Post;
use App\Helpers\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, Filterable;

    protected $table = 'comment_post';
    protected $fillable = [
        'user_name',
        'user_phone',
        'user_email',
        'user_comment',
        'parent_id',
        'id_post',
        'type',
        'status'
    ];

    const ADMIN_COMMENT = 1;
    const USER_COMMENT = 0;

    public function childComment(): HasMany
    {
        return $this->HasMany(Comment::class, 'parent_id');
    }

    public function postComment(): BelongsTo
    {
        return $this->BelongsTo(Post::class, 'id_post');
    }
}
