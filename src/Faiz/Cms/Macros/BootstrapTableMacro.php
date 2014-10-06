<?php

/**
 * HTML Macro to generate Bootstrap 3 table.
 *
 * Example usage:
 * {{ HTML::table(array('name', 'emai', 'birthday'), User::all(), 'users', false, false) }} 
 * 
 * @param array   $fields 			Fields that will be used.
 * @param array   $data 			Collection of data.
 * @param string  $resource 		URL for action buttons.
 * @param boolean $showEdit 		Show edit button?
 * @param boolean $showDelete 		Show delete button?
 * @param boolean $showView Show 	view button?
 *
 * @return  HTML Table Data
 */
HTML::macro('table', 
	function($fields = array(), $data = array(),
			$headers =  array(), $resource, $showEdit = true,
			$showDelete = true, $showView = true) {

		$table = '<table class="table">';

		$table .='<thead><tr>';

		// Render the header for selected fields of data
		foreach ($headers as $header) {
			$table .= '<th>' . Str::title($header) . '</th>';
		}

		// Render the header for action buttons
		if ($showEdit || $showDelete || $showView ) {
			$table .= '<th></th>';
		}

		$table .= '</tr></thead>';

		foreach ( $data as $d ) {
			$table .= '<tr>';

			// Render all data
			foreach($fields as $key) {
				// Check for date collumn
				if ($key === 'created_at' or $key === 'updated_at') {
					$table .= '<td>' . date("d F Y, h:i a", strtotime($d->$key)) . '</td>';
				} else {
					$table .= '<td>' . $d->$key . '</td>';
				}
			}
		 	
		 	// Render action buttons
			if ($showEdit || $showDelete || $showView ) {
				$table .= '<td class="text-right">';
				
				if ($showEdit) {
					$table .= '<a href="' . $resource . '/edit/' . $d->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> ';
				}

				if ($showView) {
					$table .= '<a href="' . $resource . '/' . $d->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> View</a> ';
				}

				if ($showDelete) {
					$table .= '<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" data-url="' . $resource . '/delete/' . $d->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</button> ';
				}

				$table .= '</td>';
			}

			$table .= '</tr>';
		}

		$table .= '</table>';

		return $table;

});
