<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * 
 * @property int $id
 * @property int $user_id
 * @property int $project_type_id
 * @property string $title
 * @property string|null $description
 * @property string|null $url
 * @property string|null $photo
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ProjectType $projectType
 * @property User $user
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'projects';
	public static $snakeAttributes = false;

	protected $casts = [
		'user_id' => 'int',
		'project_type_id' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'user_id',
		'project_type_id',
		'title',
		'description',
		'url',
		'photo',
		'start_date',
		'end_date'
	];

	public function projectType()
	{
		return $this->belongsTo(ProjectType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
