<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property int $comment_id
 * @property int|null $user_id
 * @property int|null $chatbot_id
 * @property int|null $replied_comment_id
 * @property string $content
 * @property Carbon $createdAt
 * @property Carbon|null $deletedAt
 * @property Carbon|null $updatedAt
 *
 * @property User|null $user
 * @property Chatbot|null $chatbot
 * @property Comment|null $comment
 * @property Collection|Comment[] $comments
 *
 * @package App\Models
 */
class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'user_id' => 'int',
        'chatbot_id' => 'int',
        'replied_comment_id' => 'int',
        'createdAt' => 'datetime',
        'deletedAt' => 'datetime',
        'updatedAt' => 'datetime'
    ];

    protected $fillable = [
        'user_id',
        'chatbot_id',
        'replied_comment_id',
        'content',
        'rating',
        'createdAt',
        'deletedAt',
        'updatedAt'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chatbot()
    {
        return $this->belongsTo(Chatbot::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'replied_comment_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'replied_comment_id');
    }
}
