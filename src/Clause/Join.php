<?php


namespace Clause;


use Helper;
use Stringable_;

class Join implements Stringable_
{
  const STATEMENT = 'JOIN';
  const INNER_TYPE = 'INNER';
  const LEFT_TYPE = 'LEFT';
  const RIGHT_TYPE = 'RIGHT';

  protected ?Stringable_ $parent;
  protected ?string $type = null;
  protected string $tableName;
  protected ?string $alias = null;

  /**
   * @param array|string $table
   * @param Stringable_|null $parent
   */
  public function __construct($table, Stringable_ $parent = null)
  {
    $this->parent = $parent;

    if (is_string($table)) {
      $this->tableName = $table;
    } elseif (is_array($table)) {
      foreach ($table as $tableName => $alias) {
        $this->tableName = $tableName;
        $this->alias = $alias;
      }
    }
  }

  public function left(): self
  {
    $this->type = self::LEFT_TYPE;
    return $this;
  }

  public function right(): self
  {
    $this->type = self::RIGHT_TYPE;
    return $this;
  }

  public function inner(): self
  {
    $this->type = self::INNER_TYPE;
    return $this;
  }

  public function on($expression = null): On
  {
    return new On($expression, $this);
  }

  public function __toString(): string
  {
    $str = '';

    if ($this->type) {
      $str .= $this->type;
    }

    $str .= ' ' . self::STATEMENT . ' ' . Helper::quoteTable($this->tableName);

    if ($this->alias) {
      $str .= ' AS ' . Helper::quoteTable($this->alias);
    }

    return trim($this->parent . ' ' . $str);
  }
}