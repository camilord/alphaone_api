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
 * Class ProjectsReadyOn
 * @package camilord\AlphaOneAPI\Actions
 */
class ProjectsReadyOn extends BaseAction implements ActionInterface
{
    private $form_id = 'all';

    /**
     * ApplicationsAcceptedList constructor.
     * @param $form_id
     * @param APIConfig $config
     */
    public function __construct($form_id, APIConfig $config)
    {
        parent::__construct($config);
        $this->form_id = $form_id;
    }

    /**
     * @return $this|mixed
     */
    public function execute()
    {
        // base api url
        $url = $this->getConfig()->getApiUrl() . APIConstants::GET_PROJECTS_READY;
        // set form id
        $form_id = is_numeric($this->form_id) ? (int)$this->form_id : 'all';
        $url = str_replace("{FORM_ID}", $form_id, $url);

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