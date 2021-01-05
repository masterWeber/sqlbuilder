<?php


namespace Query;


use Block\FromBlock;

class Delete extends Query
{
  const STATEMENT = 'DELETE';

  /**
   * @var mixed
   */
  protected $parent;

  use FromBlock;

  public function __construct($parent = null)
  {
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT);
  }
}