<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 7/04/2019
 * Time: 4:16 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI;

use PHPUnit\Framework\TestCase;

/**
 * Class APIConfigTest
 * @package camilord\AlphaOneAPI
 */
class APIConfigTest extends TestCase
{
    /**
     * @throws \Exception
     * @expectedException \Exception
     */
    public function test_exception1() {
        $obj = new APIConfig(null);
    }

    /**
     * @throws \Exception
     * @expectedException \Exception
     */
    public function test_exception2() {
        $obj = new APIConfig(TEST_DIR."/files/config_test2.json");
    }

    public function test_council_url() {
        $obj = new APIConfig(TEST_DIR."/files/config_test1.json");
        $result = $obj->getCouncilUrl();
        $this->assertTrue(is_string($result));
        $this->assertEquals('https://COUNCIL.abcs.co.nz', $result);
    }

    public function test_api_url() {
        $obj = new APIConfig(TEST_DIR."/files/config_test1.json");
        $result = $obj->getApiUrl();
        $this->assertTrue(is_string($result));
        $this->assertEquals('https://COUNCIL-api.abcs.co.nz', $result);
    }

    public function test_username() {
        $obj = new APIConfig(TEST_DIR."/files/config_test1.json");
        $result = $obj->getUsername();
        $this->assertTrue(is_string($result));
        $this->assertEquals('my-username-here', $result);
    }

    public function test_password() {
        $obj = new APIConfig(TEST_DIR."/files/config_test1.json");
        $result = $obj->getSecretKey();
        $this->assertTrue(is_string($result));
        $this->assertEquals('secret-key-here', $result);
    }

    public function test_session_key() {
        $obj = new APIConfig(TEST_DIR."/files/config_test1.json");
        $obj->setSessionKey($key = md5(time()));
        $result = $obj->getSessionKey();
        $this->assertTrue(is_string($result));
        $this->assertEquals($key, $result);
    }
}