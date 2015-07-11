<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_psinstantcontact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the helper.
require_once __DIR__ . '/helper.php';

$instantquoteFrmsumitted = JRequest::getVar('instantcontactFrmsumitted');

if($instantquoteFrmsumitted == 1) {

// Send email object.
$query = ModPSInstantContactHelper::sendEmail($params);

}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$load_jquery = $params->get('load_jquery');

require JModuleHelper::getLayoutPath('mod_psinstantcontact', $params->get('layout', 'default'));
