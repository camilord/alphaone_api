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
        //print_r($data);
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

    public function test_accepted_apps() {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getApplicationsAcceptedList();
        //print_r($data);
        $this->assertTrue(is_array($data));

        if (array_key_exists('List', $data)) {
            foreach($data['List'] as $item) {
                $this->assertArrayHasKey('AlphaID', $item);
                $this->assertArrayHasKey('ConsentNumber', $item);
                $this->assertArrayHasKey('ApplicationFlag', $item);
                $this->assertArrayHasKey('RequestKey', $item);
            }
        }
    }

    public function test_project_ready_on() {
        $form_id = 2; // Building Consent - Form 5
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getProjectsReadyOn($form_id);
        //print_r($data);
        $this->assertTrue(is_array($data));

        if (array_key_exists('List', $data)) {
            foreach($data['List'] as $item) {
                $this->assertArrayHasKey('AlphaID', $item);
                $this->assertArrayHasKey('ConsentNumber', $item);
                $this->assertArrayHasKey('ApplicationFlag', $item);
                $this->assertArrayHasKey('RequestKey', $item);
            }
        }
    }

    /**
     * @param $alpha_id
     * @param $flag
     * @param $request_key
     * @throws \Exception
     * @dataProvider getMarkDoneFlag2Test
     */
    public function test_mark_done($alpha_id, $flag, $request_key) {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $response = $obj->markProjectDone($alpha_id, $flag, $request_key);
        $this->assertTrue(is_array($response));

        $this->assertArrayHasKey('Result', $response);
        $this->assertArrayHasKey('Message', $response);
        $this->assertArrayHasKey('Timestamp', $response);
        $this->assertArrayHasKey('ResponseID', $response);
    }

    public function test_get_invoice() {
        $invoice_id = 1;
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getInvoice($invoice_id);
        $this->assertTrue(is_array($data));

        $this->assertArrayHasKey('ID', $data);
        $this->assertArrayHasKey('Created', $data);
        $this->assertArrayHasKey('Reference', $data);
        $this->assertArrayHasKey('InvoiceNumber', $data);
        $this->assertArrayHasKey('SubTotal', $data);
        $this->assertArrayHasKey('TaxTotal', $data);
        $this->assertArrayHasKey('TaxTotal', $data);
        $this->assertArrayHasKey('Total', $data);
        $this->assertArrayHasKey('Items', $data);

        $this->assertTrue(is_array($data['Items']));
    }

    /**
     * @param $alpha_id
     * @dataProvider getMarkDoneFlag2Test
     * @throws \Exception
     */
    public function test_document_list_flat($alpha_id) {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getDocumentFlatList($alpha_id);
        $this->assertTrue(is_array($data));

        $this->assertArrayHasKey('AlphaID', $data);
        $this->assertArrayHasKey('CoverPage', $data);
        $this->assertArrayHasKey('Council', $data);
        $this->assertArrayHasKey('Owner', $data);
        $this->assertArrayHasKey('ProjectInformation', $data);
        $this->assertArrayHasKey('Data', $data);

        if (array_key_exists('Data', $data)) {
            foreach($data['Data'] as $item) {
                $this->assertArrayHasKey('RecordUUID', $item);
                $this->assertArrayHasKey('Name', $item);
                $this->assertArrayHasKey('DownloadLink', $item);
                $this->assertArrayHasKey('FileName', $item);
            }
        }
    }

    /**
     * @param $alpha_id
     * @dataProvider getMarkDoneFlag2Test
     * @throws \Exception
     */
    public function test_document_list_by_stages($alpha_id) {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getDocumentListByStages($alpha_id);
        $this->assertTrue(is_array($data));

        $this->assertArrayHasKey('AlphaID', $data);
        $this->assertArrayHasKey('CoverPage', $data);
        $this->assertArrayHasKey('Council', $data);
        $this->assertArrayHasKey('Owner', $data);
        $this->assertArrayHasKey('ProjectInformation', $data);
        $this->assertArrayHasKey('Data', $data);

        if (array_key_exists('Data', $data)) {
            foreach($data['Data'] as $item) {
                $this->assertArrayHasKey('Label', $item);
                $this->assertArrayHasKey('Code', $item);
                $this->assertArrayHasKey('Documents', $item);

                if (array_key_exists('Documents', $item)) {
                    foreach($item['Documents'] as $document) {
                        $this->assertArrayHasKey('RecordUUID', $document);
                        $this->assertArrayHasKey('Name', $document);
                        $this->assertArrayHasKey('DownloadLink', $document);
                        $this->assertArrayHasKey('FileName', $document);
                    }
                }
            }
        }
    }

    /**
     * test data source ============================================
     */

    public function getMarkDoneFlag2Test() {
        $obj = new AlphaOneAPI(CONFIG_FILE);
        $this->assertTrue(($obj instanceof AlphaOneAPI));

        $data = $obj->getProjectsReadyOn();
        //print_r($data);
        $this->assertTrue(is_array($data));

        if (array_key_exists('List', $data)) {
            return [
                [ $data['List'][0]['AlphaID'], $data['List'][0]['ApplicationFlag'], $data['List'][0]['RequestKey'] ]
            ];
        }

        return [];
    }
}