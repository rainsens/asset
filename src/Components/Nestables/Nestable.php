<?php
namespace Rainsens\Asset\Components\Nestables;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Nestable extends Component
{
	/**
	 * @var Collection
	 */
	protected $settled;
	
	public $items = '';
	
	public $orderUrl;
	public $createUrl;
	public $editUrl;
	public $deleteUrl;
	public $refreshUrl;
	
	public function __construct(
		array $data,
		string $textField,
		string $parentField,
		string $orderUrl = '',
		string $createUrl = '',
		string $editUrl = '',
		string $deleteUrl = '',
		string $refreshUrl = ''
	)
	{
		$this->settled = collect();
		
		if (!empty($data) && !empty($textField) && !empty($parentField)) {
			$data = _recursive($data, $parentField);
			$this->retrieve($data, $textField, $parentField);
		}
		
		$this->orderUrl = $orderUrl;
		$this->createUrl = $createUrl;
		$this->editUrl = $editUrl;
		$this->deleteUrl = $deleteUrl;
		$this->refreshUrl = $refreshUrl;
	}
	
	public function retrieve(array $data, $textField, $parentField, $parentId = 0)
	{
		foreach ($data as $key => $value) {
			if ($value[$parentField] === $parentId) {
				
				// Check if already settled.
				if (! $this->settled->contains($parentField, $value[$parentField])) {
					$this->items .= "<ol class='dd-list'>";
				}
				$this->settled->push($value);
				
				// Append new item.
				$this->items .= "
					<li class='dd-item' data-id='{$value['id']}'>
			            <div class='dd-handle'>{$value[$textField]}</div>
			            <div style='position: absolute; top: 8px; right: 10px; z-index: 1'>
			                <a href='' class='pull-right'>
			                    <span class='fa fa-trash'></span>
			                </a>
			                <a href='' class='pull-right' style='margin: 1px 3px 0 0'>
			                    <span class='fa fa-edit'></span>
			                </a>
			            </div>
				";
				
				// Remove settled item.
				unset($data[$key]);
				
				// Check if still had childen, if not, close the tag.
				if (! collect($data)->contains($parentField, $value[$parentField])) {
					$this->items .= "</ol>\n";
				}
				
				$this->retrieve($data, $textField, $parentField, $value['id']);
				
				// Close the sub tag.
				$this->items .= "</li>";
			}
		}
	}
	
	public function render()
	{
		return view('asset::components.nestables.nestable');
	}
}
