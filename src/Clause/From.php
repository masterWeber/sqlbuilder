<?php


namespace Clause;


use Block\WhereBlock;

class From
{
  const STATEMENT = 'FROM';

  /**
   * @var mixed
   */
  protected $parent;
  protected array $list = [];

  use WhereBlock;

  /**
   * @param array|string $table
   * @param mixed $parent
   */
  public function __construct($table, $parent = null)
  {
    $this->parent = $parent;

    if (is_string($table)) {
      $this->list[] = $table;
    } elseif (is_array($table)) {
      $this->list = $table;
    }
  }

  public function join($table): Join
  {
    return new Join($table, $this);
  }

  public function __toString(): string
  {
    $str = '';

    foreach ($this->list as $key => $value) {
      if (is_string($key)) {
        $str .= ", {$key} AS {$value}";
      } else {
        $str .= ", {$value}";
      }
    }

    $str = trim(ltrim($str, ','));

    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $str);
  }
}