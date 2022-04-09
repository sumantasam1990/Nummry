<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TestTime
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $lesson_id
 * @property string|null $start_time
 * @property string|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $question_id
 * @method static \Illuminate\Database\Eloquent\Builder|TestTime whereQuestionId($value)
 */
class TestTime extends Model
{
    use HasFactory;

    protected $table = 'testtimes';
    protected $primaryKey = 'id';
}
