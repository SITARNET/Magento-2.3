<?php
namespace Sitarnet\Vendor\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Vendor post mysql resource
 */
class Vendor extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('sitarnet_vendor', 'entity_id');
    }
}
