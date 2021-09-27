<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $major
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property bool $is_now_end_date
 * @property string|null $gpa
 * @property string|null $city
 * @property string|null $province
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Education extends Model
{
	protected $table = 'education';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'is_now_end_date' => 'bool'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'user_id',
		'title',
		'major',
		'start_date',
		'end_date',
		'is_now_end_date',
		'gpa',
		'city',
		'province'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
