<?php
if ( ! defined( 'WPINC' ) )  die;

require_once ROBO_GALLERY_VENDOR_PATH.'scss/scssphp/scss.inc.php';
use ScssPhp\ScssPhp\Compiler;

if( function_exists('robogallery_init_sccs_compille_current') ) return ;

function robogallery_init_sccs_compille_current(){
	return new Compiler() ;	
}
