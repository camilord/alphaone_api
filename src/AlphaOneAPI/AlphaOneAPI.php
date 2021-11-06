<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 5/04/2019
 * Time: 11:45 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI;

use camilord\AlphaOneAPI\Actions\ApplicationsAcceptedList;
use camilord\AlphaOneAPI\Actions\DocumentsList;
use camilord\AlphaOneAPI\Actions\InvoiceDetails;
use camilord\AlphaOneAPI\Actions\MarkProjectDone;
use camilord\AlphaOneAPI\Actions\ProjectDetails;
use camilord\AlphaOneAPI\Actions\Authenticate;
use camilord\AlphaOneAPI\Actions\ProjectsReadyOn;

/**
 * Class AlphaOneAPI
 * @package camilord\AlphaOneAPI
 */
class AlphaOneAPI
{
    /**
     * @var APIConfig
     */
    private $config;

    /**
     * AlphaOneAPI constructor.
     * @param $config_file
     * @throws \Exception
     */
    public function __construct($config_file)
    {
        // instantiate API config
        $this->config = new APIConfig($config_file);

        // initialize API service
        $this->init();
    }

    /**
     * @throws \Exception
     */
    private function init() {
        $auth = new Authenticate($this->config);
        $response = $auth->execute()->getResponse();

        if (isset($response['status']) && $response['status'] === 'ok') {
            $this->config->setSessionKey($response['session_key']);
        } else {
            throw new \Exception("Authentication Error! Invalid API Credentials.");
        }
    }

    /**
     * @param $alpha_id
     * @return bool|array
     */
    public function getProjectDetails($alpha_id) {
        $project = new ProjectDetails($alpha_id, $this->config);
        $response = $project->execute()->getResponse();

        return ((isset($response['Result']) && $response['Result'] == true) ? $response['Data'] : false);
    }

    /**
     * @param null $offset
     * @return bool|array
     */
    public function getApplicationsAcceptedList($offset = null) {
        $appAccepted = new ApplicationsAcceptedList($offset, $this->config);
        $response = $appAccepted->execute()->getResponse();

        return ((isset($response['Result']) && $response['Result'] == true) ? $response['Data'] : false);
    }

    /**
     * @param $form_id - see FormConstants class for reference
     * @return bool|array
     */
    public function getProjectsReadyOn($form_id = null) {
        $projectReady = new ProjectsReadyOn($form_id, $this->config);
        $response = $projectReady->execute()->getResponse();

        return ((isset($response['Result']) && $response['Result'] == true) ? $response['Data'] : false);
    }

    /**
     * @param $alpha_id
     * @param $flag
     * @param $request_key
     * @return mixed|string|array
     */
    public function markProjectDone($alpha_id, $flag, $request_key) {
        $params = [
            'flag' => $flag,
            'request_key' => $request_key
        ];
        $obj = new MarkProjectDone($alpha_id, $params, $this->config);
        $response = $obj->execute()->getResponse();

        return $response;
    }

    /**
     * @param $invoice_id
     * @return mixed|string|array
     */
    public function getInvoice($invoice_id) {
        $obj = new InvoiceDetails($invoice_id, $this->config);
        $response = $obj->execute()->getResponse();
        return (isset($response['Result']) && $response['Result'] == true) ? $response['Data'] : false;
    }

    /**
     * @param $alpha_id
     * @return bool|array
     */
    public function getDocumentFlatList($alpha_id) {
        $docList = new DocumentsList($alpha_id, DocumentsList::LIST_MODE_FLAT, $this->config);
        return $docList->execute()->getResponse();
    }

    /**
     * @param $alpha_id
     * @return bool|array
     */
    public function getDocumentListByStages($alpha_id) {
        $docList = new DocumentsList($alpha_id, DocumentsList::LIST_MODE_STAGES, $this->config);
        return $docList->execute()->getResponse();
    }
}