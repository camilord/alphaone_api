<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 12:12 AM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;

use camilord\AlphaOneAPI\APIConfig;

/**
 * Class BaseAction
 * @package AlphaOneAPI\Actions
 */
abstract class BaseAction
{
    /**
     * @var APIConfig
     */
    private $config;

    /**
     * @var string
     */
    private $server_response;

    /**
     * BaseAction constructor.
     * @param APIConfig $config
     */
    public function __construct(APIConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @return APIConfig
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * @return string
     */
    public function getCredentialsUrlParam() {
        return "?username={$this->getConfig()->getUsername()}&session_key={$this->getConfig()->getSessionKey()}";
    }

    /**
     * @return string
     */
    public function getServerResponse()
    {
        return $this->server_response;
    }

    /**
     * @param string $server_response
     */
    public function setServerResponse($server_response)
    {
        $this->server_response = $server_response;
    }
}