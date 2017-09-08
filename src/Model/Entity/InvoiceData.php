<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceData Entity
 *
 * @property int $id
 * @property string $district
 * @property string $pincode
 * @property string $invoice_number
 * @property string $date
 * @property string $vehicle_number
 * @property string $starting_reding
 * @property string $ending_reding
 * @property string $number_of_kilometers
 * @property string $number_of_animals
 * @property float $rupees_per_kilometer
 * @property float $total_amount
 * @property string $starting_point
 * @property string $ending_point
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $creation_date
 * @property \Cake\I18n\FrozenTime $modification_date
 *
 * @property \App\Model\Entity\Status $status
 */
class InvoiceData extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
