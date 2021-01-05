<?php


namespace Clause;


use Block\LimitBlock;

class OrderBy
{
  const STATEMENT = 'ORDER BY';
  const ASC = 'ASC';
  const DESC = 'DESC';

  /**
   * @var mixed
   */
  protected $parent;
  /**
   * [
   *   ['column_name', 'ASC'],
   *   ['column_name_1', 'DESC']
   * ]
   */
  protected array $expressionList;

  use LimitBlock;

  public function __construct($expression, $sorting = self::ASC, $parent = null)
  {
    if (is_array($expression)) {

      foreach ($expression as $key => $value) {
        if (is_string($key)) {
          $this->expressionList[] = [$key, $value];
        } else {
          $this->expressionList[] = [$value, self::ASC];
        }
      }

    } else {
      $this->expressionList[] = [$expression, $sorting];
    }

    $this->parent = $parent;
  }

  public function __toString(): string
  {
    if (empty($this->expressionList)) {
      return '';
    }

    $str = '';
    foreach ($this->expressionList as $orderBy) {
      $str .= ', ' . $orderBy[0];
      if (array_key_exists(1, $orderBy)) {
        $str .= ' ' . $orderBy[1];
      }
    }

    $str = trim(ltrim($str, ','));

    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $str);
  }
}