<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 12:25 AM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI;

use PHPUnit\Framework\TestCase;

/**
 * Class AlphaOneAPITest
 * @package camilord\AlphaOneAPI
 */
class AlphaOneAPITest extends TestCase
{
    /**
     * @throws \Exception
     * @expectedException \Exception
     */
    public function test_exception1() {
        $obj = new AlphaOneAPI(null);
    }

    /**
     * @throws \Exception
     */
    public function test_init() {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));
    }

    /**
     * @throws \Exception
     */
    public function test_project_details() {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getProjectDetails(12);
        print_r($data);
        $this->assertTrue(is_array($data));

        $this->assertArrayHasKey('ID', $data);
        $this->assertArrayHasKey('ConsentID', $data);
        $this->assertArrayHasKey('Complexity', $data);
        $this->assertArrayHasKey('ComplexityOverride', $data);
        $this->assertArrayHasKey('Stats', $data);
        $this->assertArrayHasKey('Status', $data);
        $this->assertArrayHasKey('Requirements', $data);
        $this->assertArrayHasKey('Activities', $data);
        $this->assertArrayHasKey('AllocatedUsers', $data);
        $this->assertArrayHasKey('Applications', $data);
        $this->assertArrayHasKey('FirstPointOfContact', $data);
        $this->assertArrayHasKey('InvoiceFeesChargeTo', $data);
        $this->assertArrayHasKey('ComplianceSchedule', $data);
        $this->assertArrayHasKey('Buildings', $data);
        $this->assertArrayHasKey('Amendments', $data);
        $this->assertArrayHasKey('Inspections', $data);
        $this->assertArrayHasKey('CCCApplications', $data);
        $this->assertArrayHasKey('Lapse', $data);
        $this->assertArrayHasKey('Parcels', $data);
        $this->assertArrayHasKey('LBP', $data);
        $this->assertArrayHasKey('SiteContacts', $data);
        $this->assertArrayHasKey('Documents', $data);
    }
}