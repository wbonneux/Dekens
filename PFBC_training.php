<?php 


error_reporting(E_ALL);
include("_/components/PFBC/Form.php");

use PFBC\Form;
use PFBC\Element;

$form = new Form("login");
$form->configure(array(
	"prevent" => array("bootstrap", "jQuery", "focus")
));
$form->addElement(new Element\HTML('<legend>Login</legend>'));
$form->addElement(new Element\Hidden("form", "login"));
$form->addElement(new Element\Email("Email Address:", "Email", array("required" => 1)));
$form->addElement(new Element\Password("Password:", "Password", array("required" => 1)));
$form->addElement(new Element\Checkbox("", "Remember", array("1" => "Remember me")));
$form->addElement(new Element\Button("Login"));
$form->addElement(new Element\Button("Cancel", "button", array(
	"onclick" => "history.go(-1);"
)));
$form->render();
 ?>