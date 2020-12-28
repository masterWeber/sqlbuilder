<?php


class Value
{

  protected string $type;
  /**
   * @var mixed
   */
  protected $value;

  /**
   * Value constructor.
   * @param mixed $value
   */
  public function __construct($value)
  {
    $this->value = $value;
    $this->type = gettype($value);
  }

  public function __toString(): string
  {
    switch ($this->type) {
      case 'string':
        return "'{$this->value}'";
      case 'boolean':
        return $this->value ? 'true' : 'false';
      case 'NULL':
        return 'NULL';
      default:
        return (string)$this->value;
    }
  }
}