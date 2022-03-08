<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TeacherStudent
 *
 * @property int $id
 * @property int|null $teacher_id
 * @property int|null $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeacherStudent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TeacherStudent extends Model
{
    use HasFactory;

    public $table = 'teacher_student';
}
