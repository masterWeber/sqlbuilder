<?php


use SQLBuilder\Mapper;
use PHPUnit\Framework\TestCase;

class MapperTest extends TestCase
{
  protected function dataProvide(): array
  {
    return [
      'col_1' => 'alias_1',
      'col_2' => 'alias_2',
      'col_3' => 'alias_3',
    ];
  }

  public function testGetColumnByAlias(): void
  {
    $mapper = new Mapper($this->dataProvide());

    $this->assertEquals(
      'col_2',
      $mapper->getColumnByAlias('alias_2')
    );

    $this->assertEquals(
      'alias_4',
      $mapper->getColumnByAlias('alias_4')
    );
  }

  public function testGetAliasByColumn(): void
  {
    $mapper = Mapper::fromArray($this->dataProvide());

    $this->assertEquals(
      'alias_3',
      $mapper->getAliasByColumn('col_3')
    );

    $this->assertEquals(
      'col_4',
      $mapper->getAliasByColumn('col_4')
    );
  }

  public function testReplaceAliasesWithNames(): void
  {
    $mapper = new Mapper($this->dataProvide());

    $this->assertEquals([
      'col_1' => 'value',
      'col_2' => 'value',
      'col_3' => 'value',
      'alias_4' => 'value',
    ],
      $mapper->replaceAliasesWithNames([
        'alias_1' => 'value',
        'alias_2' => 'value',
        'alias_3' => 'value',
        'alias_4' => 'value',
      ])
    );
  }
}
