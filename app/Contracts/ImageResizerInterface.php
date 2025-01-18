<?php

namespace App\Contracts;

use App\DataTransfertObjects\ResizeOptions;

interface ImageResizerInterface
{
    public function resize(ResizeOptions $options): string;
}
