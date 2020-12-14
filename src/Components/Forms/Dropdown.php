<?php
namespace Rainsens\Widget\Components\Select2;

use Illuminate\View\Component;

class Dropdown extends Component
{
	public $data;
	
	public function __construct(array $data = [])
	{
		$this->data = $data;
	}
	
	public function render()
	{
		return view('asset::components.forms.dropdown');
	}
}
