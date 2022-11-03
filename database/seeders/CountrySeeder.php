<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$countries = Http::devtest()->get('/countries')->json();

		foreach ($countries as $country)
		{
			$stats = Http::devtest()->post('/get-country-statistics', [
				'code' => $country['code'],
			])->json();

			DB::table('countries')->insert([
				'code'      => $country['code'],
				'name'      => json_encode($country['name'], JSON_UNESCAPED_UNICODE),
				'confirmed' => $stats['confirmed'],
				'recovered' => $stats['recovered'],
				'critical'  => $stats['critical'],
				'deaths'    => $stats['deaths'],
			]);
		}
	}
}
