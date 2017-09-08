<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdminCapabilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdminCapabilitiesTable Test Case
 */
class AdminCapabilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdminCapabilitiesTable
     */
    public $AdminCapabilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admin_capabilities',
        'app.role_admin_capabilities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdminCapabilities') ? [] : ['className' => AdminCapabilitiesTable::class];
        $this->AdminCapabilities = TableRegistry::get('AdminCapabilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdminCapabilities);

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
}
