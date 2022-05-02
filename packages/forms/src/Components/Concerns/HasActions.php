<?php

namespace Filament\Forms\Components\Concerns;

use Filament\Forms\Components\Actions\Action;

trait HasActions
{
    protected array $actions = [];

    public function registerActions(array $actions): static
    {
        $this->actions = array_merge($this->actions, array_map(fn (Action $action): Action => $action->component($this), $actions));

        return $this;
    }

    public function getAction(string $name): ?Action
    {
        return $this->actions[$name] ?? null;
    }

    public function hasAction(string $name): bool
    {
        return array_key_exists($name, $this->actions);
    }
}
