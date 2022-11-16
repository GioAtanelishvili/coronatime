<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchStatsTest extends TestCase
{
	use RefreshDatabase;

	public function setUp(): void
	{
		parent::setUp();

		Http::fake([
			'/countries' => Http::response([
				[
					'code' => 'GE',
					'name' => ['en' => 'Georgia', 'ka' => 'საქართველო'],
				],
			]),

			'/get-country-statistics' => Http::response([
				'id'         => 29,
				'country'    => 'Georgia',
				'code'       => 'GE',
				'confirmed'  => 4211,
				'recovered'  => 2778,
				'critical'   => 1860,
				'deaths'     => 3561,
				'created_at' => now(),
				'updated_at' => now(),
			]),
		]);
	}

	public function test_fetch_stats_command_sends_appropriate_requests_to_country_stats_api()
	{
		$this->artisan('fetch:stats')->assertSuccessful();

		Http::assertSent(function ($request) {
			return $request->url() === 'https://devtest.ge/countries';
		});

		Http::assertSent(function ($request) {
			return $request->url() === 'https://devtest.ge/get-country-statistics';
		});
	}

	public function test_fetch_stats_command_populates_countries_table_with_country_stats()
	{
		$this->artisan('fetch:stats');

		$this->assertDatabaseHas('countries', [
			'code' => 'GE',
		]);
	}

	public function test_fetch_stats_command_throws_error_if_countries_table_is_already_populated()
	{
		$this->artisan('fetch:stats')->expectsOutput('Stats were fetched successfully!');

		$this->artisan('fetch:stats')->expectsOutput('Stats are already fetched!');
	}

	public function test_fetch_stats_update_command_sends_appropriate_requests_to_country_stats_api()
	{
		Country::create([
			'id'         => 29,
			'code'       => 'GE',
			'name'       => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed'  => 4211,
			'recovered'  => 2778,
			'critical'   => 1860,
			'deaths'     => 3561,
		]);

		$this->artisan('fetch:stats --update')->assertSuccessful();

		Http::assertSent(function ($request) {
			return $request->url() === 'https://devtest.ge/get-country-statistics';
		});
	}

	public function test_fetch_stats_update_command_updates_countries_table_with_latest_stats()
	{
		Country::create([
			'id'         => 29,
			'code'       => 'GE',
			'name'       => [
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			],
			'confirmed'  => 1000,
			'recovered'  => 1000,
			'critical'   => 1000,
			'deaths'     => 1000,
			'created_at' => now()->subDays(3),
			'updated_at' => now()->subDay(),
		]);

		$this->artisan('fetch:stats --update')->assertSuccessful();

		$this->assertDatabaseHas('countries', [
			'confirmed'  => 4211,
			'recovered'  => 2778,
			'critical'   => 1860,
			'deaths'     => 3561,
		]);
	}

	public function test_fetch_stats_update_command_throws_error_if_countries_table_is_not_populated()
	{
		$this->artisan('fetch:stats --update')->expectsOutput('Stats aren\'t fetched yet!');
	}
}
