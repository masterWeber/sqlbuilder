<?php


namespace SQLBuilder\Query;


use SQLBuilder\Helper;
use SQLBuilder\Option;
use SQLBuilder\Stringable_;

class CreateDatabase extends Query
{
  const STATEMENT = 'CREATE DATABASE';

  protected string $dbName;
  protected bool $ifNoExists = false;
  protected ?string $charsetName = null;
  protected ?string $collationName = null;
  protected ?bool $encryption = null;
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
      $str .= " " . Option::IF_NOT_EXISTS;
    }

    $str .= " " . Helper::quoteIdentifier($this->dbName);

    if ($this->charsetName) {
      $str .= " " . Option::CHARACTER_SET . " " . Helper::quote($this->charsetName);
    }

    if ($this->collationName) {
      $str .= " " . Option::COLLATE . " " . Helper::quote($this->collationName);
    }

    if (!is_null($this->encryption)) {
      $str .= " " . Option::ENCRYPTION;
      if ($this->encryption) {
        $str .= " 'Y'";
      } else {
        $str .= " 'N'";
      }
    }

    return trim($this->parent . ' ' . $str);
  }
}