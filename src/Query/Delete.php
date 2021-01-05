<?php


namespace Query;


use Clause\FromClause;

class Delete extends Query
{
  const STATEMENT = 'DELETE';

  /**
   * @var mixed
   */
  protected $parent;

  use FromClause;

  public function __construct($parent = null)
  {
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT);
  }
}