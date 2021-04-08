<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Region
 *
 * @property int $id
 * @property int|null $country_id
 * @property string|null $name
 * @property string|null $designation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Country|null $country
 * @property-read Collection|State[] $states
 * @property-read int|null $states_count
 * @method static Builder|Region newModelQuery()
 * @method static Builder|Region newQuery()
 * @method static Builder|Region query()
 * @method static Builder|Region whereCountryId($value)
 * @method static Builder|Region whereCreatedAt($value)
 * @method static Builder|Region whereDesignation($value)
 * @method static Builder|Region whereId($value)
 * @method static Builder|Region whereName($value)
 * @method static Builder|Region whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Region extends Model
{
    protected $fillable = [
        'id',
        'country_id',
        'name',
        'designation',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
