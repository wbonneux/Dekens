<?php require_once('../_/components/php/include_dao.php'); ?>
<?php
/**
 * first search all ids of the hoursDay table -> queryAll
 * for each of the array
 * take the id of each row(row->id) & place the value with the same id of the rows for an update
 */

if(isset($_POST['save']))
{
	$daysHoursArray = DAOFactory::getDaysHoursDAO()->queryAll ();
	
	for($i = 0; $i < count ( $daysHoursArray ); $i ++) {
		$row = $daysHoursArray [$i];
		$hrs_am_begin = '';
		
// 		echo $row->id;
// 		echo "my my: ".$_POST['hrs_am_begin_'.$row->id];
		if(isset($_POST['hrs_am_begin_'.$row->id]) && $_POST['hrs_am_begin_'.$row->id] != ''){
			$_SESSION ['hrs_am_begin_'.$row->id] = $_POST ['hrs_am_begin_'.$row->id];
			//echo 'hrs_am_begin_'.$row->id.': '.$_POST['hrs_am_begin_'.$row->id].'<br>';
			$row->hoursAmBegin = $_POST['hrs_am_begin_'.$row->id];
		}else{
			$row->hrs_am_begin = '';
			$_SESSION['hrs_am_begin_'.$row->id] = '';
		}
		if(isset($_POST['hrs_pm_begin_'.$row->id]) && $_POST['hrs_pm_begin_'.$row->id] != ''){
			$_SESSION ['hrs_pm_begin_'.$row->id] = $_POST ['hrs_pm_begin_'.$row->id];
			$row->hoursPmBegin = $_POST['hrs_pm_begin_'.$row->id];
		}else{
			$row->hrs_pm_begin = '';
			$_SESSION['hrs_pm_begin_'.$row->id] = '';
		}
		if(isset($_POST['hrs_dy_begin_'.$row->id]) && $_POST['hrs_dy_begin_'.$row->id] != ''){
			$_SESSION ['hrs_dy_begin_'.$row->id] = $_POST ['hrs_dy_begin_'.$row->id];
			$row->hoursDayBegin = $_POST['hrs_dy_begin_'.$row->id];
		}else{
			$row->hoursDayBegin = '';
			$_SESSION['hrs_dy_begin_'.$row->id] = '';
		}
		if(isset($_POST['hrs_am_end_'.$row->id]) && $_POST['hrs_am_end_'.$row->id] != ''){
			$_SESSION ['hrs_am_end_'.$row->id] = $_POST ['hrs_am_end_'.$row->id];
			$row->hoursAmEnd = $_POST['hrs_am_end_'.$row->id];
		}else{
			$row->hrs_am_end = '';
			$_SESSION['hrs_am_end_'.$row->id] = '';
		}
		if(isset($_POST['hrs_pm_end_'.$row->id]) && $_POST['hrs_pm_end_'.$row->id] != ''){
			$_SESSION ['hrs_pm_end_'.$row->id] = $_POST ['hrs_pm_end_'.$row->id];
			$row->hoursPmEnd = $_POST['hrs_pm_end_'.$row->id];
		}else{
			$row->hrs_pm_end = '';
			$_SESSION['hrs_pm_end_'.$row->id] = '';
		}
		if(isset($_POST['hrs_dy_end_'.$row->id]) && $_POST['hrs_dy_end_'.$row->id] != ''){
			$_SESSION ['hrs_dy_end_'.$row->id] = $_POST ['hrs_dy_end_'.$row->id];
			$row->hoursDayEnd = $_POST['hrs_dy_end_'.$row->id];
		}
		else{
			$row->hoursDayEnd = '';
			$_SESSION['hrs_dy_end_'.$row->id] = '';
		}
		//save the record & delete the session vars?
		$result = DAOFactory::getDaysHoursDAO()->update($row);
	}
	
	
	
	
	
	//echo 'saved';
	//echo 'first days hours: ' .$_POST['hrs_dy_begin_1'];
	if(isset($_POST['hrs_dy_begin_1']) && $_POST['hrs_dy_begin_1'] != ''){
// 	echo 'hrs day begin is set';}
// 	echo '';
	}
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-align-justify"></i> Openingsuren
			</h2>
			<div>
<!-- 			<a href="addDaysClosed.php">Toevoegen</a> -->
			</div>
		</div>
		<div class="box-content">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<table
				class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr style="text-align: center">
						<th style="width: 5%">Order</th>
						<th style="width: 100px">Dag</th>
						<th>Uren Voormiddag</th>
						<th>Uren Namiddag</th>
						<th>Uren Dag</th>
						<!--<th>Tekst</th>-->
						<!-- <th>Image</th> -->
						<th style="width: 20px">Gesloten</th>
						<th style="width: 20px">Actief</th>
					</tr>
				</thead>
				<tbody>
					<!-- 
			  		nieuws items ophalen (all)
			  		in een array plaatsen en per gevonden record een rij laten tonen met de gegevens
				-->

				<?php
				
				$daysClosedArray = DAOFactory::getDaysHoursDAO()->queryAll ();
				for($i = 0; $i < count ( $daysClosedArray ); $i ++) {
					$row = $daysClosedArray [$i];
					echo "<tr id=rowid-".$row->id.">";
					echo "<td class='center' style='width:5%'>$row->order</td>";
					echo "<td class='center' style='width:100px'>$row->day</td>";
					?>
					<td class='center'>van: <input type='time' name='hrs_am_begin_<?php echo $row->id; ?>' id='hrs_am_begin_<?php echo $row->id; ?>' value="<?php if(isset($_SESSION['hrs_am_begin_'.$row->id])){echo $_SESSION['hrs_am_begin_'.$row->id];}else{echo $row->hoursAmBegin;} ?>"><br />tot: &nbsp;<input type='time' name='hrs_am_end_<?php echo $row->id; ?>' id='hrs_am_end_<?php echo $row->id; ?>' value="<?php if(isset($_SESSION['hrs_am_end_'.$row->id])){echo $_SESSION['hrs_am_end_'.$row->id];}else{echo $row->hoursAmEnd;} ?>"></td>
					<td class='center'>van: <input type='time' name='hrs_pm_begin_<?php echo $row->id; ?>' id='hrs_pm_begin_<?php echo $row->id; ?>' value="<?php if(isset($_SESSION['hrs_pm_begin_'.$row->id])){echo $_SESSION['hrs_pm_begin_'.$row->id];}else{echo $row->hoursPmBegin;} ?>"><br />tot: &nbsp;<input type='time' name='hrs_pm_end_<?php echo $row->id; ?>' id='hrs_pm_end_<?php echo $row->id; ?>' value="<?php if(isset($_SESSION['hrs_pm_end_'.$row->id])){echo $_SESSION['hrs_pm_end_'.$row->id];}else{echo $row->hoursPmEnd;} ?>"></td>
					<td class='center'>van: <input type='time' name='hrs_dy_begin_<?php echo $row->id; ?>' id='hrs_dy_begin_<?php echo $row->id; ?>' value="<?php if(isset($_SESSION['hrs_dy_begin_'.$row->id])){echo $_SESSION['hrs_dy_begin_'.$row->id];}else{echo $row->hoursDayBegin;} ?>"><br />tot: &nbsp;<input type='time' name='hrs_dy_end_<?php echo $row->id; ?>' id='hrs_dy_end_<?php echo $row->id; ?>' value="<?php if(isset($_SESSION['hrs_dy_end_'.$row->id])){echo $_SESSION['hrs_dy_end_'.$row->id];}else{echo $row->hoursDayEnd;} ?>"></td>
 					<?php 
 					echo "</td>";
					echo "<td class='center' style='width:20px'>";
					if ($row->closed == 1) {
						// 						echo "<span class='label label-success'>Ja</span>";
						echo "<span style='cursor: pointer;' id=closed-".$row->id." onclick=setDayOpen(".$row->id.") class='label label-success'>Ja</span>";
					} else {
						// 						echo "<span class='label label-error'>Nee</span>";
						echo "<span style='cursor: pointer;' id=open-".$row->id." onclick=setDayClosed(".$row->id.") class='label label-error'>Nee</span>";
					
					}
					echo "</td>";
					echo "<td class='center' style='width:20px'>";
					if ($row->active == 1) {
						// 						echo "<span class='label label-success'>Ja</span>";
						echo "<span style='cursor: pointer;' id=active-".$row->id." onclick=setDayInactive(".$row->id.") class='label label-success'>Ja</span>";
					} else {
						// 						echo "<span class='label label-error'>Nee</span>";
						echo "<span style='cursor: pointer;' id=inactive-".$row->id." onclick=setDayActive(".$row->id.") class='label label-error'>Nee</span>";
					
					}
					echo "</td>";
					echo "</tr>";
				}
				?>
				<!-- <tr>
					<td>David R</td>
					<td class="center">2012/01/01</td>
					<td class="center">Member</td>
					<td class="center">
						<span class="label label-success">Active</span>
					</td>
					<td class="center">
						<a class="btn btn-success" href="#">
							<i class="icon-zoom-in icon-white"></i>  
							                                            
						</a>
						<a class="btn btn-info" href="#">
							<i class="icon-edit icon-white"></i>  
							                                            
						</a>
						<a class="btn btn-danger" href="#">
							<i class="icon-trash icon-white"></i> 
							
						</a>
					</td>
				</tr> -->
				</tbody>
			</table>
			<button type="submit" name="save" class="btn btn-primary">Verzenden</button>
			</form>
		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->

<?php

if (isset ( $_GET ["action"] )) {
	switch ($_GET ["action"]) {
		case 'switchPublic' :
			switchPublic ();
			break;
		case 'add' :
			echo 'adding';
			addContent ();
			break;
	}
}
function switchPublic() {
	$content = DAOFactory::getContentDAO ()->load ( $_GET ["id"] );
	DAOFactory::getContentDAO ()->setSwitchPublic ( $content->id, $content->published );
	// redirect to nieuws.php
}
function addContent() {
	$user = DAOFactory::getUserDAO ()->getUserByUsername ( $_SESSION ['myusername'] );
	// getting the post pars(title,descr(full),language);
	// getting the user variables(author)
	// fixed variables(published, section)
	// setting the object with the parameters
	$content = new Content ();
	// echo $_FILES['File']['name'].'</br>';
	// echo $_POST['Title'];
	$content->title = $_POST ['Title'];
	$content->fulltext = $_POST ['Descr'];
	$content->author = $user->name;
	$content->languageid = '1';
	$content->sectionid = '1';
	$content->published = $_POST ['published'];
	$content->imageUrl = $_FILES ['File'] ['name'];
	echo 'post-imageurl: ' . $content->imageUrl . '</br>';
	uploadImage ( $_FILES ['File'] );
	DAOFactory::getContentDAO ()->insert ( $content );
	// redirect to nieuws.php
}
function uploadImage($uploadfile) {
	$uploaddir = $_SERVER ['DOCUMENT_ROOT'] . '/Websites/Dekens/images/content';
	echo $uploaddir;
	// $uploaddir = '/tmp/';
	
	echo (file_exists ( $uploaddir ) && is_dir ( $uploaddir )) ? 'Directory path ok' : 'Directory does not exist';
	
	if (is_uploaded_file ( $_FILES ['File'] ['tmp_name'] )) {
		$name = $_FILES ['File'] ['name'];
		$uploaddir = $uploaddir . $name;
		$tempname = $_FILES ['File'] ['tmp_name'];
		
		$result = move_uploaded_file ( $_FILES ['File'] ['tmp_name'], $uploaddir );
		
		if ($result == 1) {
			echo "<p>File uploaded.</p>";
		} else {
			die ( "Error uploading file.  Please contact an administrator" );
		}
	}
}
?>