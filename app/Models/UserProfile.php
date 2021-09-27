<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProfile
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $photo
 * @property string|null $job_title
 * @property string|null $phone
 * @property string|null $career_summary
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class UserProfile extends Model
{
	protected $table = 'user_profiles';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'photo',
		'job_title',
		'phone',
		'career_summary'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
