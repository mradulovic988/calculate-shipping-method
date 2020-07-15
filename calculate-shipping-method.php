<?php
/**
 * @author            Marko FixRunner <marko@fixrunner.com>
 * @link              https://www.fixrunner.com
 * @since             1.0.0
 * @package           calculate-shipping-method
 *
 * @wordpress-plugin
 * Plugin Name:       Calculate Shipping Mehod
 * Plugin URI:        https://www.fixrunner.com
 * Description:       Calculate all shipping method per specific condition
 * Version:           1.0.0
 * Author:            FixRunner
 * Author URI:        https://www.fixrunner.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       csm
 * Domain Path:       /languages
 */

defined('ABSPATH') or die('You can not access here.');

function csm_activate()
{
	require_once plugin_dir_path(__FILE__) . '/inc/CsmActivate.php';
}

function csm_deactivate()
{
	flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'csm_activate');
register_deactivation_hook(__FILE__, 'csm_deactivate');