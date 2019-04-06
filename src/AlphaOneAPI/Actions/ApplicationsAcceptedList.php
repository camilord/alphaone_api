<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 1:23 AM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;

use camilord\AlphaOneAPI\APIConfig;
use camilord\AlphaOneAPI\APIConstants;
use camilord\AlphaOneAPI\Utils\CurlUtil;

/**
 * Class ApplicationsAcceptedList
 * @package camilord\AlphaOneAPI\Actions
 */
class ApplicationsAcceptedList extends BaseAction implements ActionInterface
{
    private $offset = null;

    /**
     * ApplicationsAcceptedList constructor.
     * @param $offset
     * @param APIConfig $config
     */
    public function __construct($offset, APIConfig $config)
    {
        parent::__construct($config);
        $this->offset = $offset;
    }

    /**
     * @return $this|mixed
     */
    public function execute()
    {
        // base api url
        $url = $this->getConfig()->getApiUrl() . APIConstants::GET_APP_ACCEPTED;
        // pagination
        if (!is_null($this->offset)) {
            $offset = (int)$this->offset;
            $url .= "/{$offset}";
        }

        $this->setServerResponse(CurlUtil::get($url, false, $this->getCredentialHeaderParams()));
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getResponse()
    {
        return $this->getServerResponse();
    }
}