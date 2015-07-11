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

<link rel="stylesheet" href="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/css/validationEngine.jquery.css" type="text/css"/>
<?php if($load_jquery == 1) { ?>
<script src="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
<?php } ?>
<script src="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo JURI::base(); ?>/modules/mod_psinstantcontact/assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery(".psinstantcontactFrmBoot").validationEngine();
	});
</script>
<style>
	.psinstantcontactFrmBoot { margin: 0;}
	.psinstantcontactFrmBoot .form-control { width: 93%; padding: 4px 6px; height: auto; box-sizing: unset;}
	.psinstantcontactFrmBoot .input-group { margin-bottom: 10px;}
	.psinstantcontactFrmBoot input { border: 1px solid #cccccc; border-radius: 3px; display: inline-block; margin-bottom: 9px; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s; box-sizing: unset; height: auto; padding: 4px 6px;}
</style>

<div class="psinstantcontact<?php echo $moduleclass_sfx; ?>">
	
	<form class="psinstantcontactFrmBoot" id="psinstantcontactFrmBoot" action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="POST">
    	
		<div class="psinstantcontact_userdata col-md-12 row">
			<div class="input-group">
			  <span class="input-group-addon glyphicon glyphicon-user hasTooltip" data-original-title="Name*"></span>
			  <input type="text" placeholder="Name" name="name" id="name" value="<?php echo @$psquickcontact_data['name']; ?>" class="form-control input-medium validate[required]">
			</div>
			<div class="input-group">
			  <span class="input-group-addon glyphicon glyphicon-envelope hasTooltip" data-original-title="Email*"></span>
			  <input type="text" placeholder="Email*" name="email" id="email" value="<?php echo @$psquickcontact_data['email']; ?>" class="form-control validate[required, custom[email]]">
			</div>
			<div class="input-group">
			  <span class="input-group-addon glyphicon glyphicon-phone-alt hasTooltip" data-original-title="Phone"></span>
			  <input type="text" placeholder="Phone" name="phone" id="phone" value="<?php echo @$psquickcontact_data['phone']; ?>" class="form-control validate[required]">
			</div>
			<div class="input-group">
			  <span class="input-group-addon glyphicon glyphicon-pencil hasTooltip" data-original-title="Message*"></span>
			  <textarea placeholder="Message*" name="message" id="message" class="form-control validate[required]"><?php echo @$psquickcontact_data['message']; ?></textarea>
			</div>
			<div class="pscustomCaptcha input-group">
	       	  <input type="text" placeholder="Captcha Code*" name="security_code" id="security_code" class="col-md-5 validate[required] captcha">
	       	  <img src="<?php echo JURI::base().'modules/mod_psinstantcontact/captcha/CaptchaSecurityImages.php?width=65&amp;height=31&amp;characters=4'; ?>" class="alignright col-md-3" >
	        </div>
		</div>
		
       <label><button type="submit" class="btn btn-success" name="submitFrm" id="submitFrm"><span class="glyphicon glyphicon-send"></span>&nbsp; Send</button></label>
       <input type="hidden" name="instantcontactFrmsumitted" value="1"/>
       <?php echo JHtml::_('form.token'); ?>
  	</form>
</div>