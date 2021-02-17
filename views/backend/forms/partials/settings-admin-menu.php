<?php
/**
 * Form fields for admin settings menu tab
 *
 * @package    Pack_Station
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace PackStation\Views\Admin;
use PackStation\Classes\Admin as Admin;

// Instance of the Manage_Website_Page class.
$page = new Admin\Admin_Settings_Page;


settings_fields( 'aps-site-admin-menu' );
do_settings_sections( 'aps-site-admin-menu' );

