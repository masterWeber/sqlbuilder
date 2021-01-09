<?php


namespace SQLBuilder\Query;


use SQLBuilder\DataType\Default_;
use SQLBuilder\Helper;
use SQLBuilder\Option;
use SQLBuilder\Stringable_;

class AlterDatabase extends Query
{
  const STATEMENT = 'ALTER DATABASE';

  protected string $dbName;
  protected ?array $charset = null;
  protected ?array $collation = null;
  protected ?array $encryption = null;
  /**
   * @var integer|string|Default_|null
   */
  protected $readOnly = null;
  protected ?Stringable_ $parent;

  public function __construct(string $dbName, ?Stringable_ $parent = null)
  {
    $this->dbName = $dbName;
    $this->parent = $parent;
  }

  public function characterSet(string $charsetName, bool $default = false): self
  {
    $this->charset = [
      'name' => $charsetName,
      'default' => $default
    ];
    return $this;
  }

  public function collate(string $collationName, bool $default = false): self
  {
    $this->collation = [
      'name' => $collationName,
      'default' => $default
    ];
    return $this;
  }

  public function encryption(bool $encryption, bool $default = false): self
  {
    $this->encryption = [
      'encrypt' => $encryption,
      'default' => $default
    ];
    return $this;
  }

  public function readOnly($readOnly): self
  {
    $this->readOnly = $readOnly;
    return $this;
  }

  public function __toString(): string
  {
    $str = self::STATEMENT;

    $str .= " " . Helper::quoteIdentifier($this->dbName);

    if ($this->charset) {
      if ($this->charset['default']) {
        $str .= " " . Option::DEFAULT;
      }
      $str .= " " . Option::CHARACTER_SET . " " . Helper::quote($this->charset['name']);
    }

    if ($this->collation) {
      if ($this->collation['default']) {
        $str .= " " . Option::DEFAULT;
      }
      $str .= " " . Option::COLLATE . " " . Helper::quote($this->collation['name']);
    }

    if ($this->encryption) {
      if ($this->encryption['default']) {
        $str .= " " . Option::DEFAULT;
      }
      $str .= " " . Option::ENCRYPTION;
      if ($this->encryption) {
        $str .= " 'Y'";
      } else {
        $str .= " 'N'";
      }
    }

    if (!is_null($this->readOnly)) {
      $str .= " " . Option::READ_ONLY;
      if ($this->readOnly instanceof Default_) {
        $str .= " " . $this->readOnly;
      } elseif ($this->readOnly) {
        $str .= " 1";
      } else {
        $str .= " 0";
      }
    }

    return trim($this->parent . ' ' . $str);
  }
}