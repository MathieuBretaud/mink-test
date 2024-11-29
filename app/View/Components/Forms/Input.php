<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{

    public function __construct(
        public string  $type = 'text',
        public string  $name = '',
        public string  $value = '',
        public ?string $label = null)
    {
        $this->label = $label ?? ucfirst($name);
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
