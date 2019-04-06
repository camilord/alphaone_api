<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 8:11 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;

use camilord\AlphaOneAPI\APIConfig;
use camilord\AlphaOneAPI\APIConstants;
use camilord\AlphaOneAPI\Utils\CurlUtil;

/**
 * Class MarkProjectDone
 * @package camilord\AlphaOneAPI\Actions
 */
class MarkProjectDone extends BaseAction implements ActionInterface
{
    /**
     * @var int
     */
    private $alpha_id;

    /**
     * @var array
     */
    private $post_data = [];

    /**
     * ApplicationsAcceptedList constructor.
     * @param int $alpha_id
     * @param array $post_data
     * @param APIConfig $config
     */
    public function __construct($alpha_id, array $post_data, APIConfig $config)
    {
        parent::__construct($config);
        $this->alpha_id = $alpha_id;
        $this->post_data = $post_data;
    }

    /**
     * @return $this|mixed
     */
    public function execute()
    {
        // base api url
        $url = $this->getConfig()->getApiUrl() . APIConstants::MARK_PROJECT_DONE;
        // set alphaID
        $url = str_replace("{ALPHA_ID}", $this->alpha_id, $url);

        $this->setServerResponse(CurlUtil::post($url, $this->post_data, false, $this->getCredentialHeaderParams()));
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