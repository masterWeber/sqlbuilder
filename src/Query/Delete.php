<?php


namespace Query;


use Block\FromBlock;
use Stringable_;

class Delete extends Query implements Stringable_
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