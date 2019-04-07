<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 7/04/2019
 * Time: 4:39 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Utils;


use PHPUnit\Framework\TestCase;

class CurlUtilTest extends TestCase
{
    public function test_get_as_object() {
        $result = CurlUtil::get('http://www.abcs.co.nz');
        $this->assertFalse(is_string($result));
    }

    public function test_get_as_string() {
        $result = CurlUtil::get('http://www.abcs.co.nz', true);
        $this->assertTrue(is_string($result));
    }

    public function test_post_as_obj() {
        $result = CurlUtil::post('http://www.abcs.co.nz', []);
        $this->assertTrue(is_null($result));
    }

    public function test_post_as_string() {
        $result = CurlUtil::post('http://www.abcs.co.nz', [],true);
        $this->assertTrue(is_string($result));
    }
}