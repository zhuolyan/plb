<?php

namespace App\GCNigthmare;

class Node
{
    public ?Node      $left  = null;
    public ?Node      $right = null;
    private(set) Node $self;

    public function __construct()
    {
        $this->self = $this;
    }
}
