<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Model
{
    
    function __construct()
    {
	parent::__construct();
	
	header('Content-Type: Application/json');
    }

    function error( $msg = '', $type = '' ) {
	$trace				= debug_backtrace();

	$data['type']			= $type;
	$data['message']		= $msg;
	$data['info']['file']		= $file		= $trace[0]['file'];
	$data['info']['line']		= $line		= $trace[0]['line'];
	$data['info']['class']		= $class	= $trace[1]['class'];
	$data['info']['function']	= $func		= $trace[1]['function'];
	
	$log				= sprintf( '%s (%s): %s',
						   $file, $line, $msg );
	log_message( 'error', $log );
	
	echo format_json( json_encode($data) );
    }
    
}
