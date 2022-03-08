<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property string $name
 * @property string $datetime
 * @property int $complete_status
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCompleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $token
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereToken($value)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @property int|null $pause_timer
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson wherePauseTimer($value)
 */
class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';
    protected $primaryKey = 'id';

}
