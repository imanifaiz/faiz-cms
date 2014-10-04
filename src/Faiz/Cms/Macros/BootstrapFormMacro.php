<?php

/**
 * HTML Macro to generate Bootstrap 3 Form Items.
 *
 * Example usage:
 *	{{ HTML::textField('name', 'Name') }}
 * 
 * @param string $name 			The item name.
 * @param string $label 		The item label.
 * @param string $value 		The item value.
 * @param array  $attributes 	The item extra attributes
 * @param array  $options 		The source of data for select list options.
 *
 * @return  HTML Bootstrap Form Item
 */

Form::macro('textField', function($name, $label = null, $value = null, $attributes = array())
{
	$element = Form::text($name, $value, fieldAttributes($name, $attributes));

	return fieldWrapper($name, $label, $element);
});
 
Form::macro('passwordField', function($name, $label = null, $attributes = array())
{
	$element = Form::password($name, fieldAttributes($name, $attributes));

	return fieldWrapper($name, $label, $element);
});
 
Form::macro('textareaField', function($name, $label = null, $value = null, $attributes = array())
{
	$element = Form::textarea($name, $value, fieldAttributes($name, $attributes));

	return fieldWrapper($name, $label, $element);
});
 
Form::macro('selectField', function($name, $label = null, $options, $value = null, $attributes = array())
{
	$element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

	return fieldWrapper($name, $label, $element);
});
 
Form::macro('selectMultipleField', function($name, $label = null, $options, $value = null, $attributes = array())
{
	$attributes = array_merge($attributes, ['multiple' => true]);
	$element = Form::select($name, $options, $value, fieldAttributes($name, $attributes));

	return fieldWrapper($name, $label, $element);
});
 
Form::macro('checkboxField', function($name, $label = null, $value = 1, $checked = null, $attributes = array())
{
	$attributes = array_merge(['id' => 'id-field-' . $name], $attributes);

	$out = '<div class="checkbox';
	$out .= fieldError($name) . '">';
	$out .= '<label>';
	$out .= Form::checkbox($name, $value, $checked, $attributes) . ' ' . $label;
	$out .= '</div>';

	return $out;
});

/**
 * Generate bootstrap field wrapper
 * @param  string $name    The item's name
 * @param  string $label   The item's label
 * @param  string $element The items
 * @return string The form item wrapped in bootstrap wrapper
 */
function fieldWrapper($name, $label, $element)
{
	$out = '<div class="form-group';
	$out .= fieldError($name) . '">';
	$out .= fieldLabel($name, $label);
	$out .= $element;
	$out .= '</div>';

	return $out;
}

/**
 * Generate bootstrap field wrapper
 * @param  string $field    The item's name
 * @return string Bootstrap form error class
 */
function fieldError($field)
{
	$error = '';

	if ($errors = Session::get('errors'))
	{
		$error = $errors->first($field) ? ' has-error' : '';
	}

	return $error;
}

/**
 * Generate field label
 * @param  string $name    The item's name
 * @param  string $label    The item's label
 * @return string Bootstrap form label
 */
function fieldLabel($name, $label)
{
	if (is_null($label)) return '';

	$name = str_replace('[]', '', $name);

	$out = '<label for="id-field-' . $name . '" class="control-label">';
	$out .= $label . '</label>';

	return $out;
}

/**
 * Generate field extra attributes
 * @param  string $name    		The item's name
 * @param  array  $attribute    The attributes
 * @return string The extra attibutes
 */
function fieldAttributes($name, $attributes = array())
{
	$name = str_replace('[]', '', $name);

	return array_merge(['class' => 'form-control', 'id' => 'id-field-' . $name], $attributes);
}
