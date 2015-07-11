<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_psinstantcontact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$session = JFactory::getSession();
$psquickcontact_data = $session->get('psquickcontact_data');

?>

<link rel="stylesheet" href="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/css/default.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/css/glyphicon.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/css/validationEngine.jquery.css" type="text/css"/>
<?php if($load_jquery == 1) { ?>
<script src="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
<?php } ?>
<script src="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery(".psinstantcontactFrm").validationEngine();
	});
</script>


<div class="psinstantcontact<?php echo $moduleclass_sfx; ?>">
	
	<form class="psinstantcontactFrm" id="psinstantcontactFrm" action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="POST">
       	
	   <div class="default-input-group"><input type="text" placeholder="Name*" name="name" value="<?php echo @$psquickcontact_data['name']; ?>" id="name" class="validate[required]"></div>
       <div class="default-input-group"><input type="text" placeholder="Email*" name="email" id="email" value="<?php echo @$psquickcontact_data['email']; ?>" class="validate[required, custom[email]]"></div>
       <div class="default-input-group"><input type="text" placeholder="Phone" name="phone" id="phone" value="<?php echo @$psquickcontact_data['phone']; ?>" class="validate[required]"></div>
       <div class="default-input-group"><textarea placeholder="Message*" name="message" id="message" class="validate[required]"><?php echo @$psquickcontact_data['message']; ?></textarea></div>
       <div class="default-input-group">
       		<input type="text" placeholder="Captcha Code*" name="security_code" id="security_code" class="validate[required] custom_captcha">
       		<img src="<?php echo JURI::base().'modules/mod_psinstantcontact/captcha/CaptchaSecurityImages.php?width=65&amp;height=31&amp;characters=4'; ?>" class="alignright" >       		
       </div>
       <div class="default-input-group"><button type="submit" name="submitFrm" class="quickcontact_submit" id="submitFrm"><span class="glyphicon glyphicon-send"></span>&nbsp; Send</button></div>
       <input type="hidden" name="instantcontactFrmsumitted" value="1"/>
       <?php echo JHtml::_('form.token'); ?>
  	</form>
</div>