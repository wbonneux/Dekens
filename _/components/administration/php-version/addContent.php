<style type="text/css">
form{
	margin-left:15px;
	margin-right:15px;
}
</style>

<?php 
//session_start();
/*error_reporting(E_ALL);*/
include("PFBC/Form.php");

use PFBC\Form;
use PFBC\Element;

/*if(isset($_POST['Title']))
{
	echo $_POST['Title'];
	//echo 'testing: '.$_POST['title'];
	echo $_FILES['File']['name'].'</br>';
	echo $_FILES['File']['tmp_name'].'</br>';
	
	$target_path = "uploads/";

	$target_path = $target_path . basename( $_FILES['File']['name']); 

	if(move_uploaded_file($_FILES['File']['tmp_name'], $target_path)) {
	    echo "The file ".  basename( $_FILES['File']['name']). 
	    " has been uploaded";
	} else{
	    echo "There was an error uploading the file, please try again!";
	}
}	*/

//$languageArray = DAOFactory::getLanguageDAO()->queryAll();
$languageArray = array("Nederlands","Frans","Duits");

$form = new Form("addContent");
$form->configure(array(
	"prevent" => array("bootstrap", "jQuery", "focus")
));
$form->addElement(new Element\HTML('<legend>Content zoevoegen</legend>'));
$form->addElement(new Element\Hidden("form", "Content Toevoegen"));
$form->addElement(new Element\Textbox("Titel:", "Title", array("required" => 1)));
$form->addElement(new Element\TextArea("Omschrijving:", "Descr", array("required" => 1)));
//$form->addElement(new Element\Select("Taal:", "Language", $languageArray));
$form->addElement(new Element\File("File:", "File"));
$form->addElement(new Element\Checkbox("published", "published", array("1" => "published")));
$form->addElement(new Element\Button("Toevoegen"));
$form->addElement(new Element\Button("Cancel", "button", array("onclick" => "history.go(-1);"
)));
$form->render();

 ?>