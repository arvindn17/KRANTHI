<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoleAdminCapabilitiesFixture
 *
 */
class RoleAdminCapabilitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'role_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'admin_capability_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_admin_role_admin_capabilities_admin_roles_idx' => ['type' => 'index', 'columns' => ['role_id'], 'length' => []],
            'fk_admin_role_admin_capabilities_admin_capabilities1_idx' => ['type' => 'index', 'columns' => ['admin_capability_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_admin_role_admin_capabilities_admin_capabilities1' => ['type' => 'foreign', 'columns' => ['admin_capability_id'], 'references' => ['admin_capabilities', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_admin_role_admin_capabilities_admin_role_id1' => ['type' => 'foreign', 'columns' => ['role_id'], 'references' => ['roles', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'role_id' => 1,
            'admin_capability_id' => 1
        ],
    ];
}
