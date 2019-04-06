<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 5/04/2019
 * Time: 11:47 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI;

use camilord\utilus\Data\ArrayUtilus;

/**
 * Class APIConfig
 * @package camilord\AlphaOneAPI
 */
class APIConfig
{
    /**
     * @var array
     */
    private $config_array = [];

    /**
     * @var string
     */
    private $session_key;

    /**
     * APIConfig constructor.
     * @param $config_file
     * @throws \Exception
     */
    public function __construct($config_file)
    {
        if (!file_exists($config_file)) {
            throw new \Exception("Error! Configuration file not found.");
        }

        $config_array = json_decode(file_get_contents($config_file), true);
        if (array_key_exists('AlphaOne', $config_array) && ArrayUtilus::haveData($config_array['AlphaOne'])) {
            $this->config_array = $config_array['AlphaOne'];
        } else {
            throw new \Exception("Error! AlphaOne API Configuration not found.");
        }
    }

    /**
     * @return string|null
     */
    public function getCouncilUrl() {
        return @$this->config_array['CouncilUrl'];
    }

    /**
     * @return string|null
     */
    public function getApiUrl() {
        return @$this->config_array['APIUrl'];
    }

    /**
     * @return string|null
     */
    public function getUsername() {
        return @$this->config_array['Username'];
    }

    /**
     * @return string|null
     */
    public function getSecretKey() {
        return @$this->config_array['SecretKey'];
    }

    // ============

    /**
     * @return string
     */
    public function getSessionKey()
    {
        return $this->session_key;
    }

    /**
     * @param string $session_key
     */
    public function setSessionKey($session_key)
    {
        $this->session_key = $session_key;
    }
}