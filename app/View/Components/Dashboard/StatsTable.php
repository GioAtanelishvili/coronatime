<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;
use App\Models\Country;

class StatsTable extends Component
{
	/**
	 * The records of the countries table.
	 *
	 * @var \Illuminate\Support\Collection
	 */
	public $countries;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->countries = Country::all();
	}

	/**
	 * Append separator colon to numbers
	 *
	 * @param int $int
	 *
	 * @return string
	 */
	public function format($int)
	{
		$str = str($int);
		$substrlength = $str->length() % 3 === 0 ? 3 : $str->length() % 3;

		$formated = str($str->substr(0, $substrlength));

		if ($str->length() > 3)
		{
			for ($i = $substrlength; $i < $str->length(); $i += 3)
			{
				$formated .= ',' . $str->substr($i, 3);
			}
		}
		return $formated;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.dashboard.stats-table');
	}
}
