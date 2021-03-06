<?php


namespace SQLBuilder\Clause;

use SQLBuilder\Block\LimitBlock;
use SQLBuilder\Block\OrderByBlock;
use Closure;
use SQLBuilder\Expression\Between;
use SQLBuilder\Expression\Binary;
use SQLBuilder\Expression\Expression;
use SQLBuilder\Expression\In;
use SQLBuilder\Expression\Is;
use SQLBuilder\Expression\IsNot;
use SQLBuilder\Expression\Like;
use SQLBuilder\Expression\NotBetween;
use SQLBuilder\Expression\NotIn;
use SQLBuilder\Expression\NotLike;
use SQLBuilder\Expression\NotRegExp;
use SQLBuilder\Expression\Raw;
use SQLBuilder\Expression\RegExp;
use SQLBuilder\Helper;
use SQLBuilder\Operator\LogicalAnd;
use SQLBuilder\Operator\LogicalNot;
use SQLBuilder\Operator\LogicalOr;
use SQLBuilder\Operator\LogicalXor;
use SQLBuilder\Operator\Operator;
use SQLBuilder\Stringable_;

class Condition extends Expression implements Stringable_
{
  protected ?Stringable_ $parent;
  protected array $expressions;

  use OrderByBlock;
  use LimitBlock;

  public function __construct($expression = null, Stringable_ $parent = null)
  {
    if ($expression) {
      if (is_string($expression)) {
        $this->raw($expression);
      } elseif (is_array($expression)) {
        foreach ($expression as $key => $val) {
          $this->equal($key, $val);
        }
      }
    }

    $this->parent = $parent;
  }

  public function raw(string $expression): self
  {
    $this->expressions[] = new Raw($expression);
    return $this;
  }

  public function equal(string $a, $b): self
  {
    $this->expressions[] = new Binary($a, '=', $b);
    return $this;
  }

  public function notEqual(string $a, $b): self
  {
    $this->expressions[] = new Binary($a, '<>', $b);
    return $this;
  }

  public function greaterThan($a, $b): self
  {
    $this->expressions[] = new Binary($a, '>', $b);
    return $this;
  }

  public function greaterThanOrEqual($a, $b): self
  {
    $this->expressions[] = new Binary($a, '>=', $b);
    return $this;
  }

  public function lessThan($a, $b): self
  {
    $this->expressions[] = new Binary($a, '<', $b);
    return $this;
  }

  public function lessThanOrEqual($a, $b): self
  {
    $this->expressions[] = new Binary($a, '<=', $b);
    return $this;
  }

  public function in(string $expression, array $list): self
  {
    $this->expressions[] = new In($expression, $list);
    return $this;
  }

  public function notIn(string $expression, array $list): self
  {
    $this->expressions[] = new NotIn($expression, $list);
    return $this;
  }

  public function like(string $expression, $pattern): self
  {
    $this->expressions[] = new Like($expression, $pattern);
    return $this;
  }

  public function notLike(string $expression, $pattern): self
  {
    $this->expressions[] = new NotLike($expression, $pattern);
    return $this;
  }

  public function is(string $expression, bool $boolean): self
  {
    $this->expressions[] = new Is($expression, $boolean);
    return $this;
  }

  public function isNot(string $expression, bool $boolean): self
  {
    $this->expressions[] = new IsNot($expression, $boolean);
    return $this;
  }

  public function isNull(string $expression): self
  {
    $this->expressions[] = new Is($expression, null);
    return $this;
  }

  public function isNotNull(string $expression): self
  {
    $this->expressions[] = new IsNot($expression, null);
    return $this;
  }

  public function between(string $expression, $min, $max): self
  {
    $this->expressions[] = new Between($expression, $min, $max);
    return $this;
  }

  public function notBetween(string $expression, $min, $max): self
  {
    $this->expressions[] = new NotBetween($expression, $min, $max);
    return $this;
  }

  public function regexp(string $expression, string $pattern): self
  {
    $this->expressions[] = new RegExp($expression, $pattern);
    return $this;
  }

  public function notRegexp(string $expression, string $pattern): self
  {
    $this->expressions[] = new NotRegExp($expression, $pattern);
    return $this;
  }

  public function and(): self
  {
    $this->expressions[] = new LogicalAnd();
    return $this;
  }

  public function or(): self
  {
    $this->expressions[] = new LogicalOr();
    return $this;
  }

  public function not(): self
  {
    $this->expressions[] = new LogicalNot();
    return $this;
  }

  public function xor(): self
  {
    $this->expressions[] = new LogicalXor();
    return $this;
  }

  public function group(Closure $closure): self
  {
    $groupCondition = new GroupCondition();
    $closure($groupCondition);
    $this->expressions[] = $groupCondition;

    return $this;
  }

  protected function buildExpressions(): string
  {
    $str = '';

    // By default we treat all expressions are concatenated with "AND" operator.
    // If there is a specific operator, then the specific operator will be used.
    for ($i = 0; $i < count($this->expressions); $i++) {
      $expression = $this->expressions[$i];
      if ($expression instanceof Operator) {
        $str .= ' ' . $expression->__toString() . ' ';
        $expression = $this->expressions[++$i];
      } else {
        if ($i > 0) {
          $str .= ' ' . new LogicalAnd() . ' ';
        }
      }

      if ($expression instanceof Expression) {
        $str .= $expression;
      } elseif (is_string($expression)) {
        $str .= $expression;
      } else {
        $str .= Helper::deflate($expression);
      }
    }

    return $str;
  }

  public function __toString(): string
  {
    return $this->buildExpressions();
  }
}