<?php
namespace Rainsens\Asset\Components\Buttons;

use Illuminate\View\Component;

class Button extends Component
{
	public $tag         = 'button';
	
	/**
	 * round, loading, icon, dropdown
	 */
	public $href;
	public $icon;
	public $text;
	
	/**
	 * btn-default, btn-dark, btn-primary, btn-success, btn-info, btn-warning, btn-danger, btn-alert, btn-system
	 */
	public $color;
	
	/**
	 * btn-xs, btn-sm, btn-lg
	 */
	public $size;
	
	/**
	 * disabled, active
	 */
	public $state;
	public $round;
	public $gradient;
	public $block;
	
	public function __construct(
		string $href    = '',
		string $icon    = 'fa-coffee',
		string $text    = 'Default',
		string $color   = 'btn-default',
		string $size    = 'btn-sm',
		string $state   = '',
		bool $round     = false,
		bool $gradient  = false,
		bool $block     = false
	)
	{
		$this->icon     = $icon;
		$this->text     = $text;
		$this->color    = $color;
		$this->size     = $size;
		$this->state    = $state;
		$this->round    = $round;
		$this->gradient = $gradient;
		$this->block    = $block;
		
		if ($href) {
			$this->tag = 'a';
			$this->href = "href='$href'";
		}
	}
	
	public function render()
	{
		return view('widget::components.buttons.button');
	}
}
