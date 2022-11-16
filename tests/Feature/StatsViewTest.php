<?php

namespace Tests\Feature;

use App\Models\Country;
use App\View\Components\Dashboard\StatsGrid;
use App\View\Components\Dashboard\StatsTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class StatsViewTest extends TestCase
{
	use RefreshDatabase;

	public function test_stats_grid_component_correctly_aggregates_and_formats_countries_table_data()
	{
		Country::factory()->count(3)->create([
			'confirmed' => 1121,
			'recovered' => 1211,
			'deaths'    => 2212,
		]);

		$view = $this->component(StatsGrid::class);

		$view->assertDontSeeText('3363')->assertSeeTextInOrder(['New cases', '3,363']);
		$view->assertDontSeeText('3633')->assertSeeTextInOrder(['Recovered', '3,633']);
		$view->assertDontSeeText('6636')->assertSeeTextInOrder(['Death', '6,636']);
	}

	public function test_stats_table_component_correctly_displays_countries_table_data()
	{
		[$first, $second] = Country::factory()->count(3)->create();

		$view = $this->component(StatsTable::class);

		$view->assertSeeTextInOrder([
			$first->name['en'], $second->name['en'],
		]);
	}

	public function test_stats_table_location_column_values_are_changed_when_switching_application_language()
	{
		$country = Country::factory()->create();

		$this->component(StatsTable::class)->assertSeeText(
			$country->name['en']
		);

		App::setLocale('ka');

		$this->component(StatsTable::class)->assertSeeText(
			$country->name['ka']
		);
	}
}
