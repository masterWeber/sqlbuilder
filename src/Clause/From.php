<?php


namespace SQLBuilder\Clause;


use SQLBuilder\Block\GroupByBlock;
use SQLBuilder\Block\HavingBlock;
use SQLBuilder\Block\LimitBlock;
use SQLBuilder\Block\OrderByBlock;
use SQLBuilder\Block\WhereBlock;
use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class From implements Stringable_
{
  const STATEMENT = 'FROM';

  protected ?Stringable_ $parent;
  protected array $list = [];

  use WhereBlock;
  use LimitBlock;
  use OrderByBlock;
  use GroupByBlock;
  use HavingBlock;

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
        $str .= ", " . Helper::quoteTable($key) . " AS " . Helper::quoteTable($value);
      } else {
        $str .= ", " . Helper::quoteTable($value);
      }
    }

    $str = trim(ltrim($str, ','));

    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $str);
  }
}