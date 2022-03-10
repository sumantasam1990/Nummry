<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $subject_name
 * @property string $question_name
 * @property string $question_main
 * @property string $datetime
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereSubjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $q_one
 * @property string|null $q_two
 * @property string|null $q_three
 * @property string|null $q_four
 * @property \Illuminate\Support\Carbon $created_at
 * @property int|null $lesson_id
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQThree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @property int|null $q_image
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQImage($value)
 */
class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $primaryKey = 'id';
}
