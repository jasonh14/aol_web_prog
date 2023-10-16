<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * 
 * @property int $vote_id
 * @property int|null $user_id
 * @property int|null $chatbot_id
 * @property string $vote_type
 * @property Carbon $createdAt
 * @property Carbon|null $deletedAt
 * @property Carbon|null $updatedAt
 * 
 * @property User|null $user
 * @property Chatbot|null $chatbot
 *
 * @package App\Models
 */
class Vote extends Model
{
	protected $table = 'votes';
	protected $primaryKey = 'vote_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'chatbot_id' => 'int',
		'createdAt' => 'datetime',
		'deletedAt' => 'datetime',
		'updatedAt' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'chatbot_id',
		'vote_type',
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
}
