<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 8:53 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;


use camilord\AlphaOneAPI\APIConfig;
use camilord\AlphaOneAPI\APIConstants;
use camilord\AlphaOneAPI\Utils\CurlUtil;

/**
 * Class DocumentsList
 * @package camilord\AlphaOneAPI\Actions
 */
class DocumentsList extends BaseAction implements ActionInterface
{
    const LIST_MODE_STAGES = 'stages';
    const LIST_MODE_FLAT = 'flat';

    /**
     * @var int
     */
    private $alpha_id;
    /**
     * @var string
     */
    private $list_mode;

    /**
     * ApplicationsAcceptedList constructor.
     * @param int $alpha_id
     * @param string $list_mode
     * @param APIConfig $config
     */
    public function __construct($alpha_id, $list_mode, APIConfig $config)
    {
        parent::__construct($config);
        $this->alpha_id = $alpha_id;
        $this->list_mode = $list_mode;
    }

    /**
     * @return $this|mixed
     */
    public function execute()
    {
        // base api url with defined list mode
        $url = $this->getConfig()->getCouncilUrl() . APIConstants::GET_DOCUMENTS_IN_STAGES;
        if ($this->list_mode == self::LIST_MODE_FLAT) {
            $url = $this->getConfig()->getCouncilUrl() . APIConstants::GET_DOCUMENTS_LIST;
        }
        // set ALPHA_ID
        $url = str_replace("{ALPHA_ID}", $this->alpha_id, $url);
        $url .= "?k={$this->getConfig()->getSessionKey()}";

        $this->setServerResponse(CurlUtil::get($url));
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