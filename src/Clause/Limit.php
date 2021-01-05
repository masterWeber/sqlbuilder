<?php


namespace Clause;


use Stringable_;

class Limit implements Stringable_
{
  const STATEMENT = 'LIMIT';

  protected ?Stringable_ $parent;
  protected int $limit;

  public function __construct(int $limit, Stringable_ $parent = null)
  {
    $this->limit = $limit;
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->limit);
  }
}