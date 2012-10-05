<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller
{
    var $redirect;

    function __construct()
    {
	parent::__construct();

	$this->load->model('_category');
    }

    function index()
    {
	$query			= $this->_category->get();
	$categories		= $query->result();

	printf('<ul>');
	foreach( $categories as $c ) {
	    printf( '<li>%s</li>', $c->name );
	}
	printf('</ul>');
    }

    function add()
    {
	$name			= $this->input->get('name');
	$weight			= $this->input->get('weight');

	if( $name && $weight ) {
	    $data['name']	= $name;
	    $data['weight']	= $weight;
	
	    echo $this->_category->add( $data );
	}
	else {
	    echo 'missing category name or weight';
	}
    }

    function update()
    {
	$name			= $this->input->get('name');
	$id			= $this->input->get('id');

	if( $id && $name ) {
	    $data['name']	= $name;
	
	    echo $this->_category->update( $data, intval($id) );
	}
	else {
	    echo 'missing category name or id';
	}
    }

    function delete()
    {
	$id			= $this->input->get('id');

	if( $id ) {
	    echo $this->_category->delete( intval($id) );
	}
	else {
	    echo 'missing category id';
	}
    }

}
