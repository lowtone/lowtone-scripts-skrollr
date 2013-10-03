<?php
/*
 * Plugin Name: Script Library: Skrollr
 * Plugin URI: http://wordpress.lowtone.nl/scripts-skrollr
 * Plugin Type: lib
 * Description: Include Skrollr Javascript libraries for parallax scrolling.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\scripts\skrollr {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_skrollr"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts"),
			Package::INIT_SUCCESS => function() {
				$dependencies = array(
						"skrollr.ie" => array("skrollr"),
						"skrollr.menu" => array("skrollr"),
						"skrollr.stylesheets" => array("skrollr")
					);

				$versions = array(
						"skrollr" => "0.6.11",
						"skrollr.ie" => "1.0.0",
						"skrollr.menu" => "0.1.5",
						"skrollr.stylesheets" => "0.0.4"
					);

				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", $dependencies, $versions)
					);
			}
		));

	function registered() {
		global $lowtone_scripts_skrollr;
		
		return isset($lowtone_scripts_skrollr["registered"]) ? $lowtone_scripts_skrollr["registered"] : false;
	}
	
}