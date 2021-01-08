<?php


namespace SQLBuilder\Query;


use SQLBuilder\Block\FromBlock;
use SQLBuilder\Stringable_;

class Delete extends Query
{
  const STATEMENT = 'DELETE';

  protected ?Stringable_ $parent;

  use FromBlock;

  public function __construct(Stringable_ $parent = null)
  {
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT);
  }
}