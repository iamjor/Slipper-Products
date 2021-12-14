<!DOCTYPE html>
<!--
 - Author: Jomar Oliver Reyes
 - Author URL: https://www.jomaroliverreyes.com
-->

<!-- Page that lets the user update the inputs or values of his/her chosen slipper product to update. -->

<html>
<head>
	<title><?php echo $title; ?></title>
</head>
<body>
	<h1><?php echo $title; ?></h1>

	<?php 

	echo validation_errors();
    //Calls verifyEdit method of slippers class after form is submitted
	echo form_open('slippers/verifyEdit/'.$this->uri->segment(3), '');
	extract($slipper);
    
    //Display form inputs where the user shall enter updated inputs
	echo form_label('Slipper Name', 'slipper_name');
	echo form_input('slipper_name', $slipper_name, 'id="slipper_name"').'<br>';

	echo form_label('Price', 'price');
	echo form_input('price', $price, 'id="price"').'<br>';

	echo form_label('is Available?', 'isAvailable');

	//if isAvailable is equal to 1, product is 'Available'. Else, it is 'Not Available'
	echo form_checkbox('isAvailable', 1, $isAvailable==1 ? TRUE : FALSE ).'<br>';

	echo form_submit('btnUpdate', 'Update');
	echo form_close();
	?>
</body>
</html>