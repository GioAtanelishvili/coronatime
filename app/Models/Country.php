<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
	use HasFactory;

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'name' => 'array',
	];

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * Insert new Country record.
	 *
	 * @var array $country
	 *
	 * @return void
	 */
	public static function insert($country)
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

	/**
	 * Update stats of the given instance.
	 *
	 * @return void
	 */
	public function updateStats()
	{
		$stats = Http::devtest()->post('/get-country-statistics', [
			'code' => $this->code,
		])->json();

		$this->confirmed = $stats['confirmed'];
		$this->recovered = $stats['recovered'];
		$this->critical = $stats['critical'];
		$this->deaths = $stats['deaths'];

		$this->save();
	}
}
