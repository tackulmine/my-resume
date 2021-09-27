<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkExperience
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $company
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property bool $is_now_end_date
 * @property string|null $summary
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class WorkExperience extends Model
{
    use Taggable;

    protected $table = 'work_experiences';
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
        'company',
        'start_date',
        'end_date',
        'is_now_end_date',
        'summary'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
