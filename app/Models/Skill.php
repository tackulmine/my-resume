<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 * 
 * @property int $id
 * @property int $user_id
 * @property int $skill_type_id
 * @property string $title
 * @property string|null $percentage
 * @property int|null $order_no
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property SkillType $skillType
 * @property User $user
 *
 * @package App\Models
 */
class Skill extends Model
{
	protected $table = 'skills';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'skill_type_id' => 'int',
		'order_no' => 'int'
	];

	protected $fillable = [
		'user_id',
		'skill_type_id',
		'title',
		'percentage',
		'order_no'
	];

	public function skillType()
	{
		return $this->belongsTo(SkillType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
