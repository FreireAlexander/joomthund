<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

// The class name must always be the same as the filename (in camel case)
class JFormFieldcustom extends JFormField {

	//The field class must know its own type through the variable $type.
	protected $type = 'custom';

	public function getLabel() {
		$doc = \Joomla\CMS\Factory::getDocument();
		$style = '.control-label:empty {display: none;}';
		$doc->addStyleDeclaration($style);
		return null;
	}

	public function getInput() {
		// code that returns HTML that will be shown as the form field
		$input = '
		    <div style="width: 100%; height:auto;">Hello Label</div>
		           ';
        return $input;
	}
}