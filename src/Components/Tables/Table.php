<?php
namespace Rainsens\Asset\Components\Tables;

use Illuminate\View\Component;

class Table extends Component
{
	public function __construct()
	{
	}
	
	public function render()
	{
		return view('asset::components.tables.table');
	}
}
