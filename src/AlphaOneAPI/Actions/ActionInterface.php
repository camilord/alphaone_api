<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 12:11 AM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Actions;

/**
 * Interface ActionInterface
 * @package camilord\AlphaOneAPI\Actions
 */
interface ActionInterface
{
    /**
     * @return mixed
     */
    public function execute();

    /**
     * @return mixed
     */
    public function getResponse();
}