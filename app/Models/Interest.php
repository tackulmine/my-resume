<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Interest
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property int|null $order_no
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Interest extends Model
{
	protected $table = 'interests';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'order_no' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'order_no'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
