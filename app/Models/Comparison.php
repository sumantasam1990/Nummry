<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comparison
 *
 * @property int $id
 * @property int|null $comp_category_id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison whereCompCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comparison whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comparison extends Model
{
    use HasFactory;

    public $table = 'comparisons';
}
