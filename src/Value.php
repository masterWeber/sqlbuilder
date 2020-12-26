<?php


class Value
{

  protected string $type;
  /**
   * @var int|string|bool|null
   */
  protected $value;

  /**
   * Value constructor.
   * @param int|string|bool|null $value
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
    }

    return (string)$this->value;
  }
}