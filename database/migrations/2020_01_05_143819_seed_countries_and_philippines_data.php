<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Spatie\SimpleExcel\SimpleExcelReader;

class SeedCountriesAndPhilippinesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->seedCountries();
        $this->seedPhilippineRegions();
        $this->seedPhilippineStates();
        $this->seedPhilippineCities();
    }

    private function seedCountries()
    {
        SimpleExcelReader::create(__DIR__ . '/../data/countries.csv')
            ->getRows()
            ->each(function (array $row) {
                Country::query()->updateOrCreate(['id' => $row['id']], [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'code' => $row['code'],
                    'latitude' => (! empty($row['latitude'])) ? $row['latitude'] : null,
                    'longitude' => (! empty($row['longitude'])) ? $row['longitude'] : null,
                    'dialing_code' => $row['dialing_code'],
                ]);
            });
    }

    private function seedPhilippineRegions()
    {
        SimpleExcelReader::create(__DIR__ . '/../data/countries/001-philippines/philippine-regions.csv')
            ->getRows()
            ->each(function (array $row) {
                Region::query()->updateOrCreate(['id' => $row['id']], [
                    'id' => $row['id'],
                    'country_id' => $row['country_id'],
                    'name' => $row['name'],
                    'designation' => $row['designation'],
                ]);
            });
    }

    private function seedPhilippineStates()
    {
        SimpleExcelReader::create(__DIR__ . '/../data/countries/001-philippines/philippine-states.csv')
            ->getRows()
            ->each(function (array $row) {
                State::query()->updateOrCreate(['id' => $row['id']], [
                    'id' => $row['id'],
                    'country_id' => $row['country_id'],
                    'region_id' => $row['region_id'],
                    'order' => $row['order'],
                    'name' => $row['name'],
                    'latitude' => (! empty($row['latitude'])) ? $row['latitude'] : null,
                    'longitude' => (! empty($row['longitude'])) ? $row['longitude'] : null,
                ]);
            });
    }

    private function seedPhilippineCities()
    {
        SimpleExcelReader::create(__DIR__ . '/../data/countries/001-philippines/philippine-cities.csv')
            ->getRows()
            ->each(function (array $row) {
                $state = State::query()->find($row['state_id']);
                City::query()->updateOrCreate(['id' => $row['id']], [
                    'id' => $row['id'],
                    'country_id' => $row['country_id'],
                    'region_id' => $state->region_id,
                    'state_id' => $row['state_id'],
                    'name' => $row['name'],
                    'latitude' => (! empty($row['latitude'])) ? $row['latitude'] : null,
                    'longitude' => (! empty($row['longitude'])) ? $row['longitude'] : null,
                ]);
            });
    }
}
