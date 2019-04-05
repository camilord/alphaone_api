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
use camilord\AlphaOneAPI\Actions\ProjectDetails;
use camilord\AlphaOneAPI\Actions\Authenticate;

/**
 * Class AlphaOneAPI
 * @package AlphaOneAPI
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

        if ($response['status'] == 'ok') {
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

        return ($response['Result'] == true ? $response['Data'] : false);
    }

    /**
     * @param null $offset
     * @return bool|array
     */
    public function getApplicationsAcceptedList($offset = null) {
        $appAccepted = new ApplicationsAcceptedList($offset, $this->config);
        $response = $appAccepted->execute()->getResponse();

        return ($response['Result'] == true ? $response['Data'] : false);
    }

    /**
     * @param $form_id - see FormConstants class for reference
     * @return bool|array
     */
    public function getProjectsReadyOn($form_id) {

    }

    public function markProjectDone($alpha_id, $flag, $request_key) {

    }

    public function getInvoice($invoice_id) {

    }

    public function getDocumentFlatList($alpha_id) {

    }

    public function getDocumentListByStages($alpha_id) {

    }
}