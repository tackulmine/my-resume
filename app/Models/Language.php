<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $value
 * @property int|null $order_no
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Language extends Model
{
	protected $table = 'languages';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'order_no' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'value',
		'order_no'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
