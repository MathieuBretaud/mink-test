<?php

namespace App\DataTransfertObjects;

readonly class ResizeOptions
{
    public function __construct(
        private string $filename,
        private ?int   $width = null,
        private ?int   $height = null,
    )
    {
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

}
