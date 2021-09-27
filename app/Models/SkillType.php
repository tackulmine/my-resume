<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SkillType
 * 
 * @property int $id
 * @property string $title
 * @property int|null $order_no
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Skill[] $skills
 *
 * @package App\Models
 */
class SkillType extends Model
{
	protected $table = 'skill_types';
	public static $snakeAttributes = false;

	protected $casts = [
		'order_no' => 'int'
	];

	protected $fillable = [
		'title',
		'order_no'
	];

	public function skills()
	{
		return $this->hasMany(Skill::class);
	}
}
