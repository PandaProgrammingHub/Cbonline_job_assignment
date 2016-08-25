<?php
  
$installer = $this;
  
$installer->startSetup();
  
$installer->run("
DROP TABLE IF EXISTS `{$installer->getTable('panda_seller')}`;


CREATE TABLE {$this->getTable('panda_seller')} (
  `seller_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  `image` varchar(100) NOT NULL default '',
  `mobile` varchar(100) NOT NULL default '',
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
  
$installer->endSetup();
