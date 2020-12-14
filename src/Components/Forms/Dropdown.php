<?php
namespace Rainsens\Asset\Components\Forms;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Dropdown extends Component
{
	/**
	 * input label
	 */
	public $label;
	/**
	 * input name
	 */
	public $name;
	/**
	 * data of selection.
	 */
	public $items;
	
	public $placeholder;
	
	public $help;
	
	public $required;
	
	public function __construct(
		string $label = 'Label',
		string $name = 'name',
		array $items = [],
		string $placeholder = '',
		string $help = '',
		bool $required = false
	)
	{
		$this->label = $label;
		$this->name = $name;
		$this->items = $items;
		$this->placeholder = $placeholder;
		$this->help = $help;
		$this->required = $required;
	}
	
	public function items(Collection $collection, string $textColumn) {
		
		$originalData = _recursive($collection->toArray(), 'parent_id');
		
		$items[0] = ['id' => 0, 'text' => 'ROOT', 'html' => '┝ ROOT', 'title' => ''];
		
		foreach ($originalData as $value) {
			$prefix = '';
			for ($i = $value['level']; $i > 0; $i--) {
				$prefix .= '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			$text = $value[$textColumn];
			$html = $prefix.'┝ '.$text;
			$items[] = ['id' => $value['id'], 'text' => $text, 'html' => $html, 'title' => ''];
		}
		
		$this->items = $items;
		
		return $items;
	}
	
	public function render()
	{
		return view('asset::components.forms.dropdown');
	}
}
