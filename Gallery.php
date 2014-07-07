<?php

include_once 'classes\Find\Find.php';

class Gallery	{

	private $options 	=	[];
	private $find 		=	null;

	public function __construct( $options = [] )	{

		if( ! is_array( $options ) )	$options = [];
		$this->setOptions( $options );
		
		$this->find 	=	new Find;
	}

	private function setOptions( $options )	{
		
		if( isset( $options['ext'] ) && is_string( $options['ext'] ) )
			$options['ext']	= array( $options['ext'] );

		$this->options 	=	array_merge( [
											'path'	=>	'uploads',
											'ext'	=>	['jpg', 'png']
										], $options
							);		
	}

	public function getImages()	{

		$images 		=	[];

		$current_url 	= 	(isset($_SERVER['HTTPS']) ? "https" : "http") . 
							"://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

		$files 	=	$this->find->sort(2)->extension( $this->options['ext'] )->limit(0,10)->in( __DIR__ . '\\' . $this->options['path'] );

		if( $files )	{
			$index = 1;
			foreach ($files as $key => $value) {
				$images[ $index ]['full']		=	$current_url . $this->options['path'] . '/full/' .	$value->getFileName();
				$images[ $index ]['thumb']		=	$current_url . $this->options['path'] . '/thumbs/' .	$value->getFileName();
				$images[ $index ]['filename']	=	$value->getFileName();
				$index++;
			}
		}

		return $images;
	}
}