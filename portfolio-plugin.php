<?php

/*
Plugin Name: Portfolio Plugin Extension
Description: Extensions for the Portfolio website
Version:     1.0
Author: Rui Sousa
License: All rights reserved
*/

if(!defined('ABSPATH')) {
    exit;
}

function require_once_in_all_files($folder) {
    $i1 = glob( plugin_dir_path(__FILE__) . '/' . $folder . '/*.php' );
    foreach ($i1 as $file ) require_once( $file );
}

require_once_in_all_files('mods');

