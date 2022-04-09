<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tutor
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tutor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tutor extends Model
{
    use HasFactory;

    public $table = 'tutors';
}
