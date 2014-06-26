<?php 
	require_once('_/components/core/ResizeImage.class.php');
	$resize = new ResizeImage('images/fotoalbum/batman.jpg');
	$resize->resizeTo(100, 100, 'exact');
	$resize->saveImage('images/fotoalbum/batman-original-exact.jpg'); 

	$resize = new ResizeImage('images/fotoalbum/batman.jpg');
	$resize->resizeTo(100, 100, 'maxWidth');
	$resize->saveImage('images/fotoalbum/batman-original-maxWidth.jpg');

	$resize = new ResizeImage('images/fotoalbum/batman.jpg');
	$resize->resizeTo(100, 100, 'maxHeight');
	$resize->saveImage('images/fotoalbum/batman-original-maxHeight.jpg');

	$resize = new ResizeImage('images/fotoalbum/batman.jpg');
	$resize->resizeTo(100, 100);
	$resize->saveImage('images/fotoalbum/batman-original-default.jpg');
?>	