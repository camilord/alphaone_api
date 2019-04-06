<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 5/04/2019
 * Time: 11:58 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI;

/**
 * Class APIConstants
 * @package camilord\AlphaOneAPI
 */
class APIConstants
{
    const AUTHENTICATE = "/v1/Authenticate";

    const GET_APPLICATION_FULL = "/v1/project/{ALPHA_ID}/full";

    const GET_APP_ACCEPTED = "/v1/projects/accepted";

    const GET_PROJECTS_READY = "/v1/projects/ready/{FORM_ID}";

    const MARK_PROJECT_DONE = "/v1/projects/ready/{ALPHA_ID}/mark";

    const GET_INVOICE = "/v1/invoice/{INVOICE_ID}";

    /**
     * ============ COUNCIL BASE URL ===========================================
     */

    const GET_DOCUMENTS_LIST = "/a2/document-export/{ALPHA_ID}/list";

    const GET_DOCUMENTS_IN_STAGES = "/a2/document-export/{ALPHA_ID}/stages";
}