<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceDatasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceDatasTable Test Case
 */
class InvoiceDatasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoiceDatasTable
     */
    public $InvoiceDatas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invoice_datas',
        'app.statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InvoiceDatas') ? [] : ['className' => InvoiceDatasTable::class];
        $this->InvoiceDatas = TableRegistry::get('InvoiceDatas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoiceDatas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
