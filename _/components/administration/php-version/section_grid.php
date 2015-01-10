<?php require_once('../_/components/php/include_dao.php'); ?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<i class="icon-align-justify"></i> Menu
			</h2>
			<div>
			<a href="addSection.php">Toevoegen</a>
			</div>
		</div>
		<div class="box-content">
			<table
				class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr style="text-align: center">
					    <th style="width: 1px">Sortering</th>
						<th style="width: 150px">Titel</th>
						 <!--<th>Tekst</th> -->
						<!-- <th>Image</th> -->
						<th style="width: 10px;text-align:center;">Sorteren</th>
						<th style="width: 10px;text-align:center;">Actief</th>
						<th style="width: 40px;text-align:center;">Actions</th>
					</tr>
				</thead>
				<tbody>
					<!-- 
			  		nieuws items ophalen (all)
			  		in een array plaatsen en per gevonden record een rij laten tonen met de gegevens
				-->
				<?php
				
				$sectionArray = DAOFactory::getProductSectionDAO()->getAllProductSectionOrderByOrder ();
				for($i = 0; $i < count ( $sectionArray ); $i ++) {
					$row = $sectionArray [$i];
					echo "<tr id=rowid-".$row->id.">";
					echo "<td class='center' style='width:1px'>$row->order</td>";
					echo "<td class='center' style='width:150px'>$row->titleNed</td>";
// 					echo "<td class='center' style='width:25%'>$row->description</td>";
					//sortering
					echo '<td class="center" style="width:10px;text-align:center;">';
					if($i != 0)
					{
						echo "<span style='cursor: pointer;' id=up-".$row->id." onclick=setProductSectionUp(".$row->id.")><img src='../images/arrowup.png'/></span>";
					}
// 					echo 'i: '.$i;
// 					echo 'count: '.count($sectionArray);
					echo '&nbsp;';
					if($i != (count($sectionArray) - 1))
					{
						echo "<span style='cursor: pointer;' id=down-".$row->id." onclick=setProductSectionDown(".$row->id.")><img src='../images/arrowdown.png'/></span>";
					}
					
					echo "</td>";
					//actief
					echo '<td class="center" style="text-align:center;">';
					if ($row->active == 1) {
						//echo "<a id='active' href='javascript:return(0);' id='".$row->id."><span class='label label-success'>Ja</span></a>";
						echo "<span style='cursor: pointer;' id=active-".$row->id." onclick=setProductSectionInactive(".$row->id.") class='label label-success'>Ja</span>";
					} else {
						echo "<span style='cursor: pointer;' id=inactive-".$row->id." onclick=setProductSectionActive(".$row->id.") class='label label-error'>Nee</span>";
						
					}
					echo "</td>";
					
					echo '<td class="center" style="text-align:center">';
					echo '<a class="btn btn-info" href="editProductSection.php?id='.$row->id.'"><i class="icon-edit icon-white" data-rel="tooltip" title="Bewerken"></i></a>';
					echo '&nbsp&nbsp';
					//echo '<a class="btn btn-danger" href="deleteCategory.php?id='.$row->id.'"><i class="icon-trash icon-white" data-rel="tooltip" title="Verwijderen"></i></a>';
					echo '<a class="btn btn-danger" id="'.$row->id.'"><i onclick="deleteSection('.$row->id.')" class="icon-trash icon-white" data-rel="tooltip" title="Verwijderen"></i></a>';
					echo '&nbsp&nbsp';
// 					echo '<a class="btn btn-danger" href="printCategory.php?id='.$row->id.'"><i class="icon-print icon-white" data-rel="tooltip" title="Print"></i></a>';
					echo '</td>';
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