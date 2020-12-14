<?php
namespace Rainsens\Asset\Components\Buttons;

use Illuminate\View\Component;

class DropdownButton extends Component
{
	public $color;
	public $size;
	public $icon;
	public $text;
	/**
	 * [
	 *  ["icon": "xxx", "text": "xxx", "url": "xxx", "divide": false]
	 *  ["icon": "xxx", "text": "xxx", "url": "xxx", "divide": true]
	 * ]
	 *
	 * @var array
	 */
	public $items = [];
	public $split = false;
	
	public function __construct(
		string $color = 'btn-default',
		string $size = 'btn-sm',
		string $icon = 'fa-coffee',
		string $text = 'Default',
		array $items = [
			["icon" => 'fa-coffee', "text" => 'Example text 1', 'url' => ''],
			["icon" => 'fa-coffee', "text" => 'Example text 2', 'url' => ''],
			["icon" => 'fa-coffee', "text" => 'Example text 3', 'url' => '', 'divide' => true],
		],
		bool $split = false
	)
	{
		$this->color = $color;
		$this->size = $size;
		$this->icon = $icon;
		$this->text = $text;
		$this->items = $items;
		$this->split = $split;
	}
	
	public function render()
	{
		return view('widget::components.buttons.dropdown');
	}
}
