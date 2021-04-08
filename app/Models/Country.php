<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $dialing_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Region[] $regions
 * @property-read int|null $regions_count
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country query()
 * @method static Builder|Country whereCode($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereDialingCode($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereLatitude($value)
 * @method static Builder|Country whereLongitude($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Country extends Model
{
    const PHILIPPINES = 174;

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    protected $fillable = [
        'name',
        'code',
        'latitude',
        'longitude',
        'dialing_code',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
