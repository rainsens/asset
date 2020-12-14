<?php
namespace Rainsens\Asset\Components\Forms;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait for being used model.
 *
 * $model->dropdown('text column');
 *
 * Trait DropdownTrait
 * @package Rainsens\Asset\Components\Forms
 */
trait DropdownTrait
{
	public function scopeDropdown(Builder $builder, string $textColumn)
	{
		return app(Dropdown::class)->items($builder->get(), $textColumn);
	}
}
