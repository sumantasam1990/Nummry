<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StatProgressTitle
 *
 * @property int $id
 * @property int|null $stat_id
 * @property string|null $timeprogress_name
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle whereStatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle whereTimeprogressName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatProgressTitle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StatProgressTitle extends Model
{
    use HasFactory;
    public $table = 'stat_progress_title';
}
