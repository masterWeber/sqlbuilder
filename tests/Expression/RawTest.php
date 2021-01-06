<?php

namespace Expression;

use PHPUnit\Framework\TestCase;
use SQLBuilder\Expression\Raw;

class RawTest extends TestCase
{
  public function testToString()
  {
    $raw = new Raw('id + 1');
    $this->assertEquals(
      'id + 1',
      $raw->__toString()
    );
  }
}
