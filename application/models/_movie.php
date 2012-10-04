<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class _movie extends CI_Model
{
    private $db;
    
    function __construct()
    {
	parent::__construct();
	
	$this->db	= $this->load->database('default', true);
    }

    function get() {
	$db		= $this->db;
	
	return $db->get( 'movie' );
    }
    
    function add( $data ) {
	$db		= $this->db;

	$db->insert( 'movie', $data );

	return $db->last_query();
    }
    
    function update( $data, $id ) {
	$db		= $this->db;

	if( $id !== null && $id !== '' && is_int($id) ) {
	    $db->update( 'movie', $data, array( 'id' => $id ) );
	    
	    return $db->last_query();
	}
	else {
	    return false;
	}
    }
    
    function delete( $id ) {
	$db		= $this->db;

	$db->delete( 'movie', array( 'id' => $id ) );

	return $db->last_query();
    }
    
}
