<?php
/**
 * Customer Created By
 *
 * This AddOn will create one additional field in WHMCS clients table to track about which
 * admin user created this User. This is an important piece but IDK where to find that information.
 * It is necessary to track user creation by User
 *
 * For more info, please refer to the hooks documentation @ http://docs.whmcs.com/Hooks
 *
 * @package    WHMCSCustomAddon
 * @author     Shaharia Azam <shaharia.azam@gmail.com>
 * @license    MIT
 * @version    $Id$
 * @link       http://blog.shahariaazam.com/
 */

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

function customercreatedby_client_add($vars) {
	update_query("tblclients", array('created_by_admin_id' => $_SESSION['adminid']), array("id" => $vars['userid']));
}

// Define Client Login Hook Call
add_hook("ClientAdd",1,"customercreatedby_client_add");
