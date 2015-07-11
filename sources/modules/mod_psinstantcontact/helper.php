<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_psinstantcontact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * PS Instant Quote module helper.
 *
 * @package     Joomla.Site
 * @subpackage  mod_psinstantcontact
 * @since       2.5
 */
class ModPSInstantContactHelper
{
	public function sendEmail($params) {
		
		$app = JFactory::getApplication();
				
		$session = JFactory::getSession();
		$security_code = $session->get('security_code');
			
		$data = JRequest::get('post');
		
		$session->set( 'psquickcontact_data', $data );

		if($data['name'] == '') {
			
			$app->enqueueMessage('Please fill Name.', 'error');
			return false;
			
		} else if($data['email'] == '') {
			
			$app->enqueueMessage('Please fill Email.', 'error');
			return false;
			
		} else if($data['message'] == '') {
			
			$app->enqueueMessage('Please fill Message.', 'error');
			return false;
			
		} else if($data['security_code'] == '') {
			
			$app->enqueueMessage('Please fill Captcha code.', 'error');
			return false;
			
		} else {
			
			if($security_code == $data['security_code']) {
							
				$mailer = JFactory::getMailer();
				
				$sender = array( 
				    $data['email'],
				    $data['name'] );
				 
				$mailer->setSender($sender);
				
				$recipient = array(
				    $params->get('email'),
				     $app->getCfg( 'fromname' ) );
		 
				$mailer->addRecipient($recipient);
				
				$body   = '<h2>Message from '.$data['name'].' ('.$data['email'].')</h2>';
				$body  .= '<table>';
				$body  .= '<tr>';
				$body  .= '<td><b>Name</b></td><td> : </td><td>'.$data['name'].'</td>';
				$body  .= '</tr>';
				$body  .= '<tr>';
				$body  .= '<td><b>Email</b></td><td> : </td><td>'.$data['email'].'</td>';
				$body  .= '</tr>';
				$body  .= '<tr>';
				$body  .= '<td><b>Phone No.</b></td><td> : </td><td>'.$data['phone'].'</td>';
				$body  .= '</tr>';
				$body  .= '<tr>';
				$body  .= '<td><b>Message</b></td><td> : </td><td>'.$data['message'].'</td>';
				$body  .= '</tr>';
				$body  .= '</table>';
				
				$mailer->isHTML(true);
				$mailer->Encoding = 'base64';
				$mailer->setSubject('Message from '.$app->getCfg( 'sitename' ));
				$mailer->setBody($body);
				
				$send = $mailer->Send();
					
				if ( $send !== true ) {
					
				    $app->enqueueMessage('Error sending email: ' . $send->__toString(), 'error');
				    return false;
				} else {
					
				    $app->enqueueMessage('Message sent successfully.', 'message');
				    $session->set( 'psquickcontact_data', '' );
				    return true;
				}
				
			} else {
				
				$app->enqueueMessage('Invalid captcha code. Please try again.', 'error');
				return false;
			}
		}
	}
	
}
