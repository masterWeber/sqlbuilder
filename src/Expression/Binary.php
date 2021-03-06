<?php


namespace SQLBuilder\Expression;


use SQLBuilder\Helper;

class Binary extends Expression
{
  protected string $leftOperand;
  protected string $operator;
  /**
   * @var mixed
   */
  protected $rightOperand;

  public function __construct(string $leftOperand, string $operator, $rightOperand)
  {
    $this->leftOperand = $leftOperand;
    $this->operator = $operator;
    $this->rightOperand = $rightOperand;
  }

  public function __toString(): string
  {
    return Helper::quoteColumn($this->leftOperand) . " " . $this->operator . " " . Helper::deflate($this->rightOperand);
  }
}