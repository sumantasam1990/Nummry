<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ResumePause
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $pause
 * @property string|null $resume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $lesson_id
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause wherePause($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause whereResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResumePause whereUserId($value)
 */
class ResumePause extends Model
{
    use HasFactory;

    public $table = 'resume_pause';
}
