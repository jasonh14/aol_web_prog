<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $user_id
 * @property string $display_name
 * @property string $email
 * @property string $password
 * @property Carbon $createdAt
 * @property Carbon|null $deletedAt
 * @property Carbon|null $updatedAt
 *
 * @property Collection|Chatbot[] $chatbots
 * @property Collection|Comment[] $comments
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'createdAt' => 'datetime',
        'deletedAt' => 'datetime',
        'updatedAt' => 'datetime'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'display_name',
        'email',
        'password',
        'createdAt',
        'deletedAt',
        'updatedAt',
        'remember_token'
    ];

    public function chatbots()
    {
        return $this->hasMany(Chatbot::class);
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
