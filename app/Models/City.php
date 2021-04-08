<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $state_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|City[] $cities
 * @property-read int|null $cities_count
 * @property-read Country|null $country
 * @property-read Region|null $region
 * @method static Builder|City newModelQuery()
 * @method static Builder|City newQuery()
 * @method static Builder|City query()
 * @method static Builder|City whereCountryId($value)
 * @method static Builder|City whereCreatedAt($value)
 * @method static Builder|City whereId($value)
 * @method static Builder|City whereLatitude($value)
 * @method static Builder|City whereLongitude($value)
 * @method static Builder|City whereName($value)
 * @method static Builder|City whereRegionId($value)
 * @method static Builder|City whereStateId($value)
 * @method static Builder|City whereUpdatedAt($value)
 * @mixin Eloquent
 */
class City extends Model
{
    protected $fillable = [
        'id',
        'country_id',
        'region_id',
        'state_id',
        'name',
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
