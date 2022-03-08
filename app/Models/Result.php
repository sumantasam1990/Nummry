<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Result
 *
 * @property int $id
 * @property int|null $question_id
 * @property int|null $answer_id
 * @property int|null $user_id
 * @property string|null $answer_user
 * @property string|null $datetime
 * @method static \Illuminate\Database\Eloquent\Builder|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result query()
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereAnswerUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUserId($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUpdatedAt($value)
 * @property int|null $lesson_id
 * @property string|null $time
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereTime($value)
 */
class Result extends Model
{
    use HasFactory;

    protected $table = 'results';
    protected $primaryKey = 'id';
}
