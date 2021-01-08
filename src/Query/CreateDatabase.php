<?php


namespace SQLBuilder\Query;


use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class CreateDatabase extends Query
{
  const STATEMENT = 'CREATE DATABASE';
  const IF_NOT_EXISTS = 'IF NOT EXISTS';
  const CHARACTER_SET = 'CHARACTER SET';
  const COLLATE = 'COLLATE';
  const ENCRYPTION = 'ENCRYPTION';

  protected string $dbName;
  protected bool $ifNoExists = false;
  protected ?string $charsetName = null;
  protected ?string $collationName = null;
  protected bool $encryption = false;
  protected ?Stringable_ $parent;

  public function __construct(string $dbName, ?Stringable_ $parent = null)
  {
    $this->dbName = $dbName;
    $this->parent = $parent;
  }

  public function ifNoExists(): self
  {
    $this->ifNoExists = true;
    return $this;
  }

  public function characterSet(string $characterSet): self
  {
    $this->charsetName = $characterSet;
    return $this;
  }

  public function collate(string $collate): self
  {
    $this->collationName = $collate;
    return $this;
  }

  public function encryption(bool $encryption): self
  {
    $this->encryption = $encryption;
    return $this;
  }

  public function __toString(): string
  {
    $str = self::STATEMENT;

    if ($this->ifNoExists) {
      $str .= " " . self::IF_NOT_EXISTS;
    }

    $str .= " " . Helper::quoteIdentifier($this->dbName);

    if ($this->charsetName) {
      $str .= " " . self::CHARACTER_SET . " " . Helper::quote($this->charsetName);
    }

    if ($this->collationName) {
      $str .= " " . self::COLLATE . " " . Helper::quote($this->collationName);
    }

    if (!is_null($this->encryption)) {
      $str .= " " . self::ENCRYPTION;
      if ($this->encryption) {
        $str .= " 'Y'";
      } else {
        $str .= " 'N'";
      }
    }

    return trim($this->parent . ' ' . $str);
  }
}