<?php
$required = null;
$errors = null;
include_once '../_/components/lang/lang.nl.php';
include_once '../_/components/php/include_dao.php';

$avInformationDAO = DAOFactory::getAvInformationDAO();

if(isset($_POST['save'])){
	//get the vars from the form & update
	//go to index
	$avInformationobj = new AvInformation();
	//$obj = $avInformationDAO->load(1);

	$avInformationobj->id = 1;
	if (isset ( $_POST ['obj_active'] )) {
		$_SESSION ['obj_active'] = '1';
	} else {
		$_SESSION ['obj_active'] = '0';
	}
	$avInformationobj->active = $_SESSION['obj_active'];
	$avInformationobj->information = $_POST['obj_information'];
	//echo $_POST['obj_information'];
	$_SESSION['obj_active'] = null;
	$_SESSION['obj_information'] = null;
	$avInformationDAO->update($avInformationobj);
	header("location:index.php");
}
if(isset($_POST['cancel'])){
	//go to index
	header("location:index.php");
}
if(!isset($_POST['save']) && !isset($_POST['cancel'])){
	include "../_/components/administration/php-version/header.php";
// 	echo 'laden';
	$avInformationobj = $avInformationDAO->load(1);
// 	echo 'info'.$avInformationobj->information.'<br>';
	//get the object & put in session & form
	$_SESSION['obj_id'] = 1;
	$_SESSION['obj_active'] = $avInformationobj->active;
	$_SESSION['obj_information'] = $avInformationobj->information;
// 	echo 'session info'.$_SESSION['obj_information'];
}

 
//get the information with record (id = 1)
?>

<!-- content -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="index.php">Dashboard  <span class="divider">/ </span> Beschikbaarheid <span class="divider">/ </span></a>
		</li>
		<li class="active">
			Extra informatie
		</li>
	</ul>
</div>

<?php include "../_/components/administration/php-version/forms/avInformation.form.php"; ?>

<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
