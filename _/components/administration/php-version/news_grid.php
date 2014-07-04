<?php require_once('../_/components/php/include_dao.php'); ?>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-align-justify"></i> Nieuws</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round" data-rel="tooltip" title="Item Toevoegen"><i class="icon-plus"></i></a>
				<!-- <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> -->
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr style="text-align:center">
				  	  <th>Created</th>
					  <th>Titel</th>
					  <th>Tekst</th>
					  <!-- <th>Image</th> -->
					  <th style="width:50px">Taal</th>
					  <th style="width:40px">Online</th>
					  <th style="width:120px">Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	<!-- 
			  		nieuws items ophalen (all)
			  		in een array plaatsen en per gevonden record een rij laten tonen met de gegevens
				-->

				<?php 

				
				$newsArray = DAOFactory::getContentDAO()->getContentBySectionOrderBy(1,'S_I_CREATE_TECH');
					for($i=0;$i<count($newsArray);$i++){
						echo "<tr>";
						$row = $newsArray[$i];
							echo "<td class='center' style='width:25%'>$row->created</td>";
							echo "<td class='center' style='width:25%'>$row->title</td>";
							echo "<td class='center'>$row->introtext</td>";
							echo "<td class='center'>";
								$language = DAOFactory::getLanguageDAO()->load($row->languageid);
								echo "$language->descrNed";
							echo "</td>";
							echo "<td class='center'>";
							if($row->published){
								
								echo "<a href='nieuws.php?action=switchPublic&id=$row->id'>";
								?>
								<span class='label label-success'>Ja</span>
								</a>
								
								<?php 
							}else{
								 
								 echo "<a href='nieuws.php?action=switchPublic&id=$row->id'>";
								 ?>
								<span class='label label-error'>Nee</span>
								</a>
								<?php
							}

				
							
						
							echo "</td>";
							echo '<td class="center"><a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white" data-rel="tooltip" title="Detail"></i></a>';
								echo '<a class="btn btn-info" href="#"><i class="icon-edit icon-white" data-rel="tooltip" title="Bewerken"></i></a>';
								echo '<a class="btn btn-danger" href="#"><i class="icon-trash icon-white" data-rel="tooltip" title="Verwijderen"></i></a>';
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
	</div><!--/span-->

</div><!--/row-->

<?php 

if(isset($_GET["action"])){
	switch($_GET["action"])
	{
		case 'switchPublic':
			switchPublic();
			break;
		case 'add':
			echo 'adding';
			addContent();
			break;
	}

}

function switchPublic()
{
	$content = DAOFactory::getContentDAO()->load($_GET["id"]);
	DAOFactory::getContentDAO()->setSwitchPublic($content->id,$content->published);
	//redirect to nieuws.php
}

function addContent(){
	$user = DAOFactory::getUserDAO()->getUserByUsername($_SESSION['myusername']);
	//getting the post pars(title,descr(full),language);
	//getting the user variables(author)
	//fixed variables(published, section)
	//setting the object with the parameters
	$content = new Content();
	//echo $_FILES['File']['name'].'</br>';
	//echo $_POST['Title'];
	$content->title = $_POST['Title'];
	$content->fulltext = $_POST['Descr'];
	$content->author = $user->name;
	$content->languageid = '1';
	$content->sectionid = '1';
	$content->published = $_POST['published'];
	$content->imageUrl = $_FILES['File']['name'];
	echo 'post-imageurl: '.$content->imageUrl.'</br>';
	uploadImage($_FILES['File']);
	DAOFactory::getContentDAO()->insert($content);
	//redirect to nieuws.php
}

	function uploadImage($uploadfile){
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/Websites/Dekens/images/content'; 
		echo $uploaddir;
		//$uploaddir = '/tmp/'; 

		echo (file_exists($uploaddir) && is_dir($uploaddir)) ? 'Directory path ok' : 'Directory does not exist'; 

		     if (is_uploaded_file($_FILES['File']['tmp_name'])) { 
		          $name = $_FILES['File']['name']; 
		          $uploaddir = $uploaddir . $name; 
		          $tempname = $_FILES['File']['tmp_name']; 

		          $result = move_uploaded_file($_FILES['File']['tmp_name'],$uploaddir); 

		          if ($result == 1){ echo "<p>File uploaded.</p>";} 
		               else { die("Error uploading file.  Please contact an administrator"); 
		               } 
		} 
	}
?>