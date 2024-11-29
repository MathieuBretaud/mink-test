<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string     $name = '',
        public ?string    $value = null,
        public Collection $datas = new Collection(),
        public string     $placeholder = 'Sélectionnez une option',
        public ?string    $label = null)
    {
        $this->label = $label ?? ucfirst($name);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}
