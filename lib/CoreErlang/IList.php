<?php

namespace CoreErlang;

interface IList
{
    public function getHead();
    public function setHead($head);

    public function getTail();
    public function setTail($tail);
}
