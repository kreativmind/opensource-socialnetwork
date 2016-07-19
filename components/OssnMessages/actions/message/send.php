<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014-2016 SOFTLAB24 LIMITED
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
$send = new OssnMessages;
$message = input('message');
$to = input('to');
if ($send->send(ossn_loggedin_user()->guid, $to, $message)) {
    $user = ossn_user_by_guid(ossn_loggedin_user()->guid);
	$message = ossn_restore_new_lines($message);
	
	$params['user'] = $user;
    $params['message'] = $message;
    echo ossn_plugin_view('messages/templates/message-send', $params);

} else {
    echo 0;
}
//messages only at some points #470
// don't mess with system ajax requests
exit;