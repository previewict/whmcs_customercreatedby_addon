<?php
/**
 * Addon Module Sample File
 *
 * Track which admin user created which client
 *
 * @package    customercreatedby
 * @author     Preview ICT <info@previewict.com>
 * @license    MIT
 * @version    $Id$
 * @link       http://www.previewict.com/
 */

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

function customercreatedby_config() {
    $configarray = array(
    "name" => "Customer Created by",
    "description" => "To add admin user ID (who created this customer) for admin user performance report",
    "version" => "1.0",
    "author" => "Shaharia Azam",
    "language" => "english",
    "fields" => array());
    return $configarray;
}

function customercreatedby_activate() {

    # Create Custom DB Table
    $query = "ALTER TABLE  `tblclients` ADD  `created_by_admin_id` INT( 3 ) NULL DEFAULT NULL AFTER  `pwresetexpiry`";
	$result = full_query($query);

    # Return Result
    return array('status'=>'success','description'=>'Add-on added successfully');
    return array('status'=>'error','description'=>'Installation failed. Something went wrong!');
    return array('status'=>'info','description'=>'Add admin user ID with every client');

}

function customercreatedby_deactivate() {

    # Remove Custom DB Table
    $query = "ALTER TABLE `tblclients` DROP `created_by_admin_id`";
	$result = full_query($query);

    # Return Result
    return array('status'=>'success','description'=>'Successfully deactivated this add-on');
    return array('status'=>'error','description'=>'Something went wrong!');
    return array('status'=>'info','description'=>'Removing this addon');

}
