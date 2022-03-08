<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StatProgress
 *
 * @property int $id
 * @property int|null $stat_progress-title_id
 * @property string|null $metric_one
 * @property string|null $metric_two
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereMetricOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereMetricTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereStatProgressTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgress whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $stat_progress_title_id
 */
class StatProgress extends Model
{
    use HasFactory;

    public $table = 'stat_progress';
}
