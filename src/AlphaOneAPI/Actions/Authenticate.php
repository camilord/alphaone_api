<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 12:10 AM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;

use camilord\AlphaOneAPI\APIConstants;
use camilord\utilus\Net\Qurl;

/**
 * Class Authenticate
 * @package camilord\AlphaOneAPI\Actions
 */
class Authenticate extends BaseAction implements ActionInterface
{
    /**
     * @return $this
     */
    public function execute()
    {
        $url = $this->getConfig()->getApiUrl() . APIConstants::AUTHENTICATE;

        $post_data = [
            'username' => $this->getConfig()->getUsername(),
            'key' => $this->getConfig()->getSecretKey()
        ];

        $response = Qurl::post($url, $post_data);
        $this->setServerResponse($response);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->getServerResponse();
    }
}