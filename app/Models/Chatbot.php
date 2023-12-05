<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chatbot
 *
 * @property int $chatbot_id
 * @property int|null $user_id
 * @property string $chatbot_name
 * @property string $chatbot_webhook_url
 * @property string|null $chatbot_description
 * @property Carbon $createdAt
 * @property Carbon|null $deletedAt
 * @property Carbon|null $updatedAt
 *
 * @property User|null $user
 * @property Collection|Comment[] $comments
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class Chatbot extends Model
{
    protected $table = 'chatbots';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'user_id' => 'int',
        'createdAt' => 'datetime',
        'deletedAt' => 'datetime',
        'updatedAt' => 'datetime'
    ];

    protected $fillable = [
        'user_id',
        'chatbot_name',
        'chatbot_webhook_url',
        'chatbot_description',
        'image_url',
        'createdAt',
        'deletedAt',
        'updatedAt'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
