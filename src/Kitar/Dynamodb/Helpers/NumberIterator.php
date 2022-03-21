<?php

namespace Kitar\Dynamodb\Helpers;

use ReturnTypeWillChange;

class NumberIterator implements \Iterator
{
    private mixed $start;
    private mixed $current = 0;
    private mixed $prefix;

    public function __construct($start = 1, $prefix = '')
    {
        $this->start = $this->current = $start;
        $this->prefix = $prefix;
    }

    #[ReturnTypeWillChange] public function rewind(): void
    {
        $this->current = $this->start;
    }

    #[ReturnTypeWillChange] public function current(): string
    {
        return "{$this->prefix}{$this->current}";
    }

    #[ReturnTypeWillChange] public function key()
    {
        return $this->current;
    }

    #[ReturnTypeWillChange] public function next(): void
    {
        $this->current++;
    }

    #[ReturnTypeWillChange] public function valid(): bool
    {
        return true;
    }
}
