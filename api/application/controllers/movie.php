<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class movie extends CI_Controller
{
    var $redirect;

    function __construct()
    {
	parent::__construct();

	$this->load->model('_movie');
    }

    function index()
    {
	$query			= $this->_movie->get();
	$movies			= $query->result();

	printf('<ul>');
	foreach( $movies as $m ) {
	    printf( '<li>%s</li>', $m->name );
	}
	printf('</ul>');
    }

    function add()
    {
	$name			= $this->input->get('name');

	if( $name ) {
	    $data['name']	= $name;
	
	    echo $this->_movie->add( $data );
	}
	else {
	    echo 'missing movie name';
	}
    }

    function update()
    {
	$name			= $this->input->get('name');
	$id			= $this->input->get('id');

	if( $id && $name ) {
	    $data['name']	= $name;
	
	    echo $this->_movie->update( $data, intval($id) );
	}
	else {
	    echo 'missing movie name or id';
	}
    }

    function delete()
    {
	$id			= $this->input->get('id');

	if( $id ) {
	    echo $this->_movie->delete( intval($id) );
	}
	else {
	    echo 'missing movie id';
	}
    }

}
