<?php


use SQLBuilder\Expression\Raw;
use SQLBuilder\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{

  public function testDeflate()
  {
    $this->assertEquals(
      "'string'",
      Helper::deflate('string')
    );

    $this->assertEquals(
      "true",
      Helper::deflate(true)
    );

    $this->assertEquals(
      "5",
      Helper::deflate([5])
    );

    $this->assertEquals(
      "5",
      Helper::deflate(function () {
        return 5;
      })
    );

    $this->assertEquals(
      "'2000-01-01'",
      Helper::deflate(new DateTime("2000-01-01"))
    );

    $this->assertEquals(
      "1+1",
      Helper::deflate(new Raw('1+1'))
    );

    $this->assertEquals(
      "NULL",
      Helper::deflate(null)
    );
  }
}
