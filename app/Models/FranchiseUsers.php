<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FranchiseUsers
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $business
 * @property string|null $email
 * @property string|null $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $phone
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers query()
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers whereBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FranchiseUsers whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FranchiseUsers extends Model
{
    use HasFactory;

    public $table = 'franchise_users';
}
