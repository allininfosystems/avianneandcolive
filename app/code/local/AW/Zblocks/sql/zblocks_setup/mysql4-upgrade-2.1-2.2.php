<?php

/**
 * aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/LICENSE-M1.txt
 *
 * @category   AW
 * @package    AW_Zblocks
 * @copyright  Copyright (c) 2008-2010 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/LICENSE-M1.txt
 */

$installer = $this;
$installer->startSetup();

try
{
    $installer->run("
ALTER TABLE `{$this->getTable('zblocks/zblocks')}` ADD `mss_rule_id` INT( 10 ) NOT NULL DEFAULT '0' COMMENT 'aheadWorks Market Segmentation Suite rule ID';
");

} catch(Exception $e) { Mage::logException($e); }

$installer->endSetup();