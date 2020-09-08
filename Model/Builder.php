<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Faonni\SalesSequence\Model;

use Magento\Framework\App\ResourceConnection as AppResource;
use Magento\Framework\DB\Ddl\Sequence as DdlSequence;
use Magento\Framework\Webapi\Exception;
use Magento\SalesSequence\Model\ResourceModel\Meta as ResourceMetadata;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class Builder
 *
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 100.0.2
 */
class Builder extends \Magento\SalesSequence\Model\Builder
{
    public function setStoreId($storeId)
    {
        //Always return storeId 21 (nl) to enforce proper incrementation across stores
        $this->data['store_id'] = '21';
        return $this;
    }
}
