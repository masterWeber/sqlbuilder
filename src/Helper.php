<?php


namespace SQLBuilder;

use DateTime;

class Helper
{
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

      case 'array':
        return self::deflate($value[0]);

      case 'object':
        if (is_callable($value)) {
          return call_user_func($value);
        }
        if ($value instanceof DateTime) {
          return self::quote($value->format('Y-m-d'));
        }
        return $value->__toString();

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

  public static function quoteIdentifier(string $id): string
  {
    return '`' . addcslashes($id, '`') . '`';
  }

  public static function quoteTable(string $name): string
  {
    $parts = explode('.', $name);
    $parts = array_map(function ($part) {
      return self::quoteIdentifier($part);
    }, $parts);

    return implode('.', $parts);
  }

  public static function quoteColumn(string $name): string
  {
    $parts = explode('.', $name);
    $parts = array_map(function ($part) {
      return self::quoteIdentifier($part);
    }, $parts);

    return implode('.', $parts);
  }
}