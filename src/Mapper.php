<?php


namespace SQLBuilder;


class Mapper
{
  protected ?array $normalMap = null;
  protected ?array $flippedMap = null;

  public function __construct(array $map = null)
  {
    if ($map) {
      $this->setMap($map);
    }
  }

  public function setMap(array $map): self
  {
    $this->normalMap = $map;
    $this->flippedMap = array_flip($map);

    return $this;
  }

  public static function fromArray(array $map): self
  {
    return new self($map);
  }

  public function getColumnByAlias(string $alias): string
  {
    foreach ($this->flippedMap as $key => $value) {
      if ($key === $alias) {
        return $value;
      }
    }

    return $alias;
  }

  public function getAliasByColumn(string $columnName): string
  {
    foreach ($this->normalMap as $key => $value) {
      if ($key === $columnName) {
        return $value;
      }
    }

    return $columnName;
  }

  public function replaceAliasesWithNames(array $array): array
  {
    $res = [];
    foreach ($array as $key => $value) {
      if (array_key_exists($key, $this->flippedMap)) {
        $name = $this->flippedMap[$key];
        $res[$name] = $value;
      } else {
        $res[$key] = $value;
      }
    }

    return $res;
  }
}