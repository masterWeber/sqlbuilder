<?php


class Value
{
  /**
   * @var mixed
   */
  protected $value;

  /**
   * @param mixed $value
   */
  public function __construct($value)
  {
    $this->value = $value;
  }

  /**
   * @param mixed $value
   * @return string
   */
  public static function deflate($value): string
  {
    $type = gettype($value);

    switch ($type) {
      case 'string':
        return self::quote($value);
      case 'boolean':
        return $value ? 'true' : 'false';
      case 'NULL':
        return 'NULL';
      default:
        return (string)$value;
    }
  }

  public static function quote(string $string): string
  {
    return "'" . addslashes($string) . "'";
  }

  public function __toString(): string
  {
    return self::deflate($this->value);
  }
}