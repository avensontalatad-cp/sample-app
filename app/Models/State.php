<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\State
 *
 * @property int $id
 * @property string $name
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $order
 * @property float|null $latitude
 * @property float|null $longitude
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|City[] $cities
 * @property-read int|null $cities_count
 * @property-read Country|null $country
 * @property-read Region|null $region
 * @method static Builder|State newModelQuery()
 * @method static Builder|State newQuery()
 * @method static Builder|State query()
 * @method static Builder|State whereCountryId($value)
 * @method static Builder|State whereCreatedAt($value)
 * @method static Builder|State whereId($value)
 * @method static Builder|State whereLatitude($value)
 * @method static Builder|State whereLongitude($value)
 * @method static Builder|State whereName($value)
 * @method static Builder|State whereOrder($value)
 * @method static Builder|State whereRegionId($value)
 * @method static Builder|State whereUpdatedAt($value)
 * @mixin Eloquent
 */
class State extends Model
{
    const METRO_MANILA = 47;

    protected $fillable = [
        'id',
        'country_id',
        'region_id',
        'name',
        'order',
        'latitude',
        'longitude',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
