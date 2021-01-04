<?php


namespace Block;


class Limit
{
  const STATEMENT = 'LIMIT';

  /**
   * @var mixed
   */
  protected $parent;
  protected int $limit;

  public function __construct(int $limit, $parent = null)
  {
    $this->limit = $limit;
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->limit);
  }
}