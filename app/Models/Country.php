<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

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
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['code', 'name', 'confirmed', 'recovered', 'critical', 'deaths'];

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

		self::create([
			'code'      => $country['code'],
			'name'      => $country['name'],
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

		$last_updated_at = new Carbon($stats['updated_at']);

		if ($last_updated_at->greaterThan($this->updated_at))
		{
			$this->confirmed = $stats['confirmed'];
			$this->recovered = $stats['recovered'];
			$this->critical = $stats['critical'];
			$this->deaths = $stats['deaths'];

			$this->save();
		}
	}

	/**
	 * Cast country name to JSON.
	 *
	 * @return use Illuminate\Database\Eloquent\Casts\Attribute
	 */
	protected function name(): Attribute
	{
		return Attribute::make(
			set: fn ($value) => json_encode($value, JSON_UNESCAPED_UNICODE)
		);
	}
}
