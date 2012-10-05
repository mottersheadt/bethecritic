<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class _category extends CI_Model
{
    private $db;
    
    function __construct()
    {
	parent::__construct();
	
	$this->db	= $this->load->database('default', true);
    }

    function get() {
	$db		= $this->db;
	
	return $db->get( 'category' );
    }
    
    function add( $data ) {
	$db		= $this->db;

	$db->insert( 'category', $data );

	return $db->last_query();
    }
    
    function update( $data, $id ) {
	$db		= $this->db;

	if( $id !== null && $id !== '' && is_int($id) ) {
	    $db->update( 'category', $data, array( 'id' => $id ) );
	    
	    return $db->last_query();
	}
	else {
	    return false;
	}
    }
    
    function delete( $id ) {
	$db		= $this->db;

	$db->delete( 'category', array( 'id' => $id ) );

	return $db->last_query();
    }
    
}
