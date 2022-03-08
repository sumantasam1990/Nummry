<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stat
 *
 * @property int $id
 * @property int|null $comparison_id
 * @property string|null $title
 * @property string|null $metric_one
 * @property string|null $metric_two
 * @property int|null $progress
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereComparisonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereMetricOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereMetricTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Stat whereUserId($value)
 */
class Stat extends Model
{
    use HasFactory;

    public $table = 'stats';
}
