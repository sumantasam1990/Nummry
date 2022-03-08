<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ComparisonCategory
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComparisonCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ComparisonCategory extends Model
{
    use HasFactory;

    public $table = 'comp_category';
}
