<?php


namespace SQLBuilder\Clause;


use SQLBuilder\Block\LimitBlock;
use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class GroupBy implements Stringable_
{
  const STATEMENT = 'GROUP BY';
  const WITH_ROLLUP = 'WITH ROLLUP';

  /**
   * [
   *   ['column_1', => null]
   *   ['column_2' => 'WITH ROLLUP']
   * ]
   */
  protected array $expressionList;
  protected ?Stringable_ $parent;

  use LimitBlock;

  public function __construct($expression, ?string $modifier = null, ?Stringable_ $parent = null)
  {
    if (is_array($expression)) {

      foreach ($expression as $key => $value) {
        if (is_string($key)) {
          $this->expressionList[] = [$key => $value];
        } else {
          $this->expressionList[] = [$value => null];
        }
      }

    } else {
      $this->expressionList[] = [$expression => $modifier];
    }

    $this->parent = $parent;
  }

  public function __toString(): string
  {
    $str = '';
    foreach ($this->expressionList as $value) {
      foreach ($value as $expression => $modifier) {
        $str .= ', ' . Helper::quoteColumn($expression);
        if (!is_null($modifier)) {
          $str .= ' ' . $modifier;
        }
      }
    }

    $str = trim(ltrim($str, ','));

    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $str);
  }
}