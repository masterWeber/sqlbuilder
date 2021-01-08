<?php


namespace SQLBuilder\Query;


use SQLBuilder\Helper;
use SQLBuilder\Option;
use SQLBuilder\Stringable_;

class DropDatabase extends Query
{
  const STATEMENT = 'DROP DATABASE';

  protected string $dbName;
  protected bool $ifExists = false;
  protected ?Stringable_ $parent;

  public function __construct(string $dbName, ?Stringable_ $parent = null)
  {
    $this->dbName = $dbName;
    $this->parent = $parent;
  }

  public function ifExists(): self
  {
    $this->ifExists = true;
    return $this;
  }

  public function __toString(): string
  {
    $str = self::STATEMENT;

    if ($this->ifExists) {
      $str .= " " . Option::IF_EXISTS;
    }

    $str .= " " . Helper::quoteIdentifier($this->dbName);

    return trim($this->parent . ' ' . $str);
  }
}