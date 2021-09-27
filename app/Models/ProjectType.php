<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectType
 * 
 * @property int $id
 * @property string $title
 * @property int|null $order_no
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Project[] $projects
 *
 * @package App\Models
 */
class ProjectType extends Model
{
	protected $table = 'project_types';
	public static $snakeAttributes = false;

	protected $casts = [
		'order_no' => 'int'
	];

	protected $fillable = [
		'title',
		'order_no'
	];

	public function projects()
	{
		return $this->hasMany(Project::class);
	}
}
