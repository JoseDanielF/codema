<?php
//No Direct Access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modFooterCodemaHelper::getList($params);

require JModuleHelper::getLayoutPath('mod_footercodema', $params->get('layout', 'default'));
?>