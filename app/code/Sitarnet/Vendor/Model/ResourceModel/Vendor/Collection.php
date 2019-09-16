<?php
namespace Sitarnet\Vendor\Model\ResourceModel\Department;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = \Sitarnet\Vendor\Model\Vendor::VENDOR_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Sitarnet\Vendor\Model\Vendor', 'Sitarnet\Vendor\Model\ResourceModel\Vendor');
    }
}
