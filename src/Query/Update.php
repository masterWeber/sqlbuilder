<?php


namespace SQLBuilder\Query;


use SQLBuilder\Clause\Set;
use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class Update extends Query
{
  const STATEMENT = 'UPDATE';

  protected string $tableReference;
  protected ?Stringable_ $parent;

  public function __construct(string $tableReference, Stringable_ $parent = null)
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
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . Helper::quoteTable($this->tableReference));
  }
}