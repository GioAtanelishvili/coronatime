<?php

namespace App\View\Components\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class StatsGrid extends Component
{
	/**
	 * Total number of new cases
	 *
	 * @var int
	 */
	public $confirmed;

	/**
	 * Total number of recovers
	 *
	 * @var int
	 */
	public $recovered;

	/**
	 * Total number of deaths
	 *
	 * @var int
	 */
	public $deaths;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->confirmed = DB::table('countries')->sum('confirmed');
		$this->recovered = DB::table('countries')->sum('recovered');
		$this->deaths = DB::table('countries')->sum('deaths');
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
		$formated = str($str->substr(0, 3));

		if ($str->length() > 3)
		{
			for ($i = 3; $i < $str->length(); $i += 3)
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
		return view('components.dashboard.stats-grid');
	}
}
