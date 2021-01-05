<?php


namespace Clause;


use Block\WhereBlock;
use Stringable_;

class From implements Stringable_
{
  const STATEMENT = 'FROM';

  protected ?Stringable_  $parent;
  protected array $list = [];

  use WhereBlock;

  /**
   * @param array|string $table
   * @param Stringable_|null $parent
   */
  public function __construct($table, Stringable_ $parent = null)
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