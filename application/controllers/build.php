<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class build extends CI_Controller
{
    var $redirect;

    function __construct()
    {
	parent::__construct();

	$this->load->helper('url');
    }

    function index()
    {
	echo 'hello: your choice dude!';
    }

    function movie_table()
    {
	$this->load->dbforge();
	$this->load->database();
	
	// assign shorter pointer
	$table			= $this->dbforge;
	$db			= $this->db;

	// drop table if exists
	$table->drop_table( 'movie' );

	// define fields
	$fields['id']		= array(
					'type'			=> 'int',
					'unsigned'		=> true,
					'constraint'		=> 11,
					'auto_increment'	=> true
					);
	$fields['name']		= array(
					'type'			=> 'tinytext'
					);
	// add fields
	$table->add_field( $fields );

	// add primary key
	$table->add_key( 'id', true );

	// create table if not exists and print success
	printf( '<h2>%s:</h2><pre>%s</pre>', 
	    $table->create_table( 'movie', true )
		? 'success'
		: 'failed' ,
	    $db->last_query() ) ;
    }

    function movie_parser() {
	//$html				= file_get_contents('http://www.movieweb.com/movies/2012');
	$html				= file_get_contents('http://google.ca');
	$doc				= new DOMDocument();
	$doc->strictErrorChecking	= false;
	$doc->validateOnParse		= true;

	$doc->loadHTML( $html );
	$browse				= $doc->getElementById( 'browse' );

	echo $browse->saveHTML();

	echo 'failed';

	sprintf( '<xmp>%s</xmp>', $html
		? $html : 'failed' );
    }

}
