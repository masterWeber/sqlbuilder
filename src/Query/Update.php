<?php


namespace Query;


use Clause\Set;

class Update extends Query
{
  const STATEMENT = 'UPDATE';

  protected string $tableReference;
  /**
   * @var mixed
   */
  protected $parent;

  public function __construct(string $tableReference, $parent = null)
  {
    $this->tableReference = $tableReference;
    $this->parent = $parent;
  }

  public function set(array $data): Set
  {
    return new Set($data, $this);
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->tableReference);
  }
}