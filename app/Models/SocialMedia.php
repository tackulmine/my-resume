<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialMedia
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $url
 * @property string|null $fa_class
 * @property int|null $order_no
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class SocialMedia extends Model
{
	protected $table = 'social_media';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'order_no' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'url',
		'fa_class',
		'order_no'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
