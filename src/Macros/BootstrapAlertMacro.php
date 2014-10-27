<?php

/**
 * HTML Macro to generate Bootstrap 3 alert.
 *
 * Example usage:
 *	{{ HTML::alert('danger', $error, 'Whoops') }}
 * 
 * @param string $type 		Type of alert (Info, Error, Warning, Success).
 * @param string $message 	The alert message.
 * @param string $head 		The alert title.
 *
 * @return  HTML Bootstrap Alert
 */

HTML::macro('alert', function($type, $message, $head = null)
{	
	if ($type=='danger') {
		$head = $head ? $head : 'Error';
	}

	$head = $head ? $head : ucwords($type);

 	return '<div class="alert alert-'. $type .'"><strong>'. $head .': </strong>' . $message . '</div>';
});
