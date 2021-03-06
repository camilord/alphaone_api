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
 * Class ProjectDetails
 * @package camilord\AlphaOneAPI\Actions
 */
class ProjectDetails extends BaseAction implements ActionInterface
{

    private $alpha_id;

    /**
     * ProjectDetails constructor.
     * @param $alpha_id
     * @param APIConfig $config
     */
    public function __construct($alpha_id, APIConfig $config)
    {
        parent::__construct($config);
        $this->alpha_id = $alpha_id;
    }

    /**
     * @return $this|mixed
     */
    public function execute()
    {
        $url = $this->getConfig()->getApiUrl();
        $url .= str_replace('{ALPHA_ID}', $this->alpha_id, APIConstants::GET_APPLICATION_FULL);

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