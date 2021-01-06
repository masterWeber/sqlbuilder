<?php


namespace SQLBuilder\Clause;


use SQLBuilder\Stringable_;

class Offset
{
  const STATEMENT = 'OFFSET';

  protected ?Stringable_ $parent;
  protected int $offset;

  public function __construct(int $offset, Stringable_ $parent = null)
  {
    $this->offset = $offset;
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->offset);
  }
}