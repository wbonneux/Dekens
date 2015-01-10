<?php
include_once '_/components/lang/select.lang.php';
if(!isset($_REQUEST['id'])){
	header("location:index.php");
} 
?>
<?php
set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
$secondHandDAO = DAOFactory::getSecondHandDAO();
$secondHand =$secondHandDAO->load($_REQUEST['id']);
if(isset($secondHand) && $secondHand->active = true){
	//continue
}
else{
	header("location:2dehands.php");
}
?>
<html>
	<head>	
		<meta name="description" content="Dekens Agri Technics - Specialist in tuinmachines en parkmachines met een uitstekende service">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?php echo  $lang ['secondhanddetail_pagetitle'];?></title>
		<link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/lightbox.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
  		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	</head>

	<title></title>
</head>
<body id="home">
	<section class="container">
        <div class="content row container">
         	<?php include "_/components/php/header.php"; ?>
         	<h1 class="page-header"><a href="2dehands.php"><?php echo $lang['secondhand_title'];?></a></h1>
         	<div class="row">
         		<div class="col-xs-12">
         		<ol class="breadcrumb">
				  <li><a href="2dehands.php"><?php echo $lang['back_to_list'];?></a></li>
				  <li class="active"><?php echo $secondHand->title; if($secondHand->sold){echo " - VERKOCHT";} ?></li></li>
				</ol>
        	</div>
		    <div class="row news">
		    	<div class="col-lg-12">
				  <div class="col-md-5"> 
				  	<h2 style="margin-top:0px">
				  		<?php echo $secondHand->title;?>
				  	</h2>
				    <h3>
				    	<div class="description">
				  			<?php echo $secondHand->description; ?>
				  		</div>
			  		</h3>
			  		<h4 style="font-weight:bold">
				  		<?php
					  		if(isset($secondHand->buildYear) && $secondHand->buildYear != 0){
					  			echo '<div style="padding:5px;margin-bottom:8px" class="alert alert-success">'.$lang['secondhanddetail_buildyear'].': '.$secondHand->buildYear.'</div>';
					  		}
					  		if(isset($secondHand->hoursWork) && $secondHand->hoursWork != 0){
					  			echo '<div style="padding:5px;margin-bottom:8px" class="alert alert-success">'.$lang['secondhanddetail_workhours'].': '.$secondHand->hoursWork.'</div>';
					  		}
					  		if(isset($secondHand->sizeTireFront) && $secondHand->sizeTireFront != ""){
					  			echo '<div style="padding:5px;margin-bottom:8px" class="alert alert-success">'.$lang['secondhanddetail_sizetirefront'].': '.$secondHand->sizeTireFront.'</div>';
					  		}
					  		if(isset($secondHand->sizeTireBack) && $secondHand->sizeTireBack != ""){
					  			echo '<div style="padding:5px;margin-bottom:8px" class="alert alert-success">'.$lang['secondhanddetail_sizetireback'].': '.$secondHand->sizeTireBack.'</div>';
					  		}
					  		
				  		?>
				  	</h4>
				  	<button class="btn btn-success btn-sm" type="button">
						    <?php echo '<a style="color:white" href="contact.php?2dehands='.$secondHand->id.'">'.$lang['more_info'].'</a>';?>
						  </button>
				  </div>
				  <div class="col-md-7"> 
				  	<div class="thumbnail">
						<a href="images/secondHand/<?php echo $secondHand->id.'/sm/'.$secondHand->image1; ?>" data-lightbox="Nieuws" title="<?php echo $secondHand->title; ?>"> 	
							<img src="images/secondHand/<?php echo $secondHand->id.'/sm/'.$secondHand->image1; ?>" class="img-responsive img-center	">
						</a> 
					</div>
				  </div>
				</div>
			</div>
			<br>
			<div class="row news">
				<div class="col-lg-12">
					<?php 
					if(isset($secondHand->image2) && $secondHand->image2 != ''){ 
						echo '<div class="col-md-3">';
							echo '<div class="thumbnail">';
								echo '<a href="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image2.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
									echo '<img src="images/secondHand/'.$secondHand->id.'/xs/'.$secondHand->image2.'" class="myImage img-responsive img-center	">';
								echo '</a>'; 
							echo '</div>';
						echo '</div>';
					}
					if(isset($secondHand->image3) && $secondHand->image3 != ''){
						echo '<div class="col-md-3">';
							echo '<div class="thumbnail">';
								echo '<a href="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image3.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
									echo '<img src="images/secondHand/'.$secondHand->id.'/xs/'.$secondHand->image3.'" class="myImage img-responsive img-center	">';
								echo '</a>';
							echo '</div>';
						echo '</div>';
					}
					if(isset($secondHand->image4) && $secondHand->image4 != ''){
						echo '<div class="col-md-3">';
							echo '<div class="thumbnail">';
								echo '<a href="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image4.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
									echo '<img src="images/secondHand/'.$secondHand->id.'/xs/'.$secondHand->image4.'" class="myImage img-responsive img-center	">';
								echo '</a>';
							echo '</div>';
						echo '</div>';
					}
					if(isset($secondHand->image5) && $secondHand->image5 != ''){
						echo '<div class="col-md-3">';
						echo '<div class="thumbnail">';
								echo '<a href="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image5.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
									echo '<img src="images/secondHand/'.$secondHand->id.'/xs/'.$secondHand->image5.'" class="myImage img-responsive img-center	">';
								echo '</a>';
							echo '</div>';
						echo '</div>';
					}
					?>
				</div>
			</div>
		
        </div><!-- content -->
	</section>   
	<?php include "_/components/php/footer.php"; ?>
	<script type="text/javascript" src="_/js/bootstrap.js"></script>
	<script type="text/javascript" src="_/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="_/js/myscript.js"></script>
    <script type="text/javascript" src="_/js/lightbox.js"></script>
	
</body>
</html>