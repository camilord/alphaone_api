<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 8:41 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;


use camilord\AlphaOneAPI\APIConfig;
use camilord\AlphaOneAPI\APIConstants;
use camilord\AlphaOneAPI\Utils\CurlUtil;

class InvoiceDetails extends BaseAction implements ActionInterface
{
    /**
     * @var int
     */
    private $invoice_id;

    /**
     * ApplicationsAcceptedList constructor.
     * @param int $invoice_id
     * @param APIConfig $config
     */
    public function __construct($invoice_id, APIConfig $config)
    {
        parent::__construct($config);
        $this->invoice_id = $invoice_id;
    }

    /**
     * @return $this|mixed
     */
    public function execute()
    {
        // base api url
        $url = $this->getConfig()->getApiUrl() . APIConstants::GET_INVOICE;
        // set INVOICE_ID
        $url = str_replace("{INVOICE_ID}", $this->invoice_id, $url);

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