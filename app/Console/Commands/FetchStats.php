<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStats extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:stats {--U|update}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch country stats and store them to database';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		if ($this->option('update'))
		{
			$this->newLine()->withProgressBar(Country::all(), fn ($country) => $country->updateStats());

			$this->newLine(2)->info('Stats updated successfully!');
		}
		else
		{
			if (Country::count() === 0)
			{
				$countries = Http::devtest()->get('/countries')->json();

				$this->newLine()->withProgressBar($countries, fn ($country) => Country::insert($country));

				$this->newLine(2)->info('Stats were fetched successfully!');
			}
			else
			{
				$this->newLine()->error('Stats are already fetched!');
			}
		}
	}
}
