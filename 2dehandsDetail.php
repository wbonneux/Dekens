<?php
if(!isset($_REQUEST['id'])){
	header("location:index.php");
} 
?>
<?php
set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
$secondHandDAO = DAOFactory::getSecondHandDAO();
$secondHand =$secondHandDAO->load($_REQUEST['id']);
?>
<html>
	<head>	
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Dekens Agri Technics - 2dehands</title>
		<link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/lightbox.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
	</head>

	<title></title>
</head>
<body id="home">
	<section class="container">
        <div class="content row container">
         	<?php include "_/components/php/header.php"; ?>
         	<div class="row">
         		<div class="col-lg-12">
         			<h1 class="page-header"><a href="2dehands.php">Tweedehands</a> / <?php echo $secondHand->title; if($secondHand->sold){echo " - VERKOCHT";} ?></h1>
        		</div>
        	</div>
		    <div class="row news">
		    	<div class="col-lg-12">
				  <div class="col-md-5"> 
				    <h3>
				    	<div class="description">
				  			<?php echo $secondHand->description; ?>
				  		</div>
			  		</h3>
			  		<h4>
				  		<?php
					  		if(isset($secondHand->buildYear)){
					  			echo '<div class="alert alert-success">Bouwjaar: '.$secondHand->buildYear.'</div>';
					  		}
					  		if(isset($secondHand->sizeTireFront) && $secondHand->sizeTireFront != ""){
					  			echo '<div class="alert alert-success">Bandenmaat(voor): '.$secondHand->sizeTireFront.'</div>';
					  		}
					  		if(isset($secondHand->sizeTireBack) && $secondHand->sizeTireBack != ""){
					  			echo '<div class="alert alert-success">Bandenmaat(achter): '.$secondHand->sizeTireBack.'</div>';
					  		}
					  		if(isset($secondHand->hoursWork)){
					  			echo '<div class="alert alert-success">Aantal uren: '.$secondHand->hoursWork.'</div>';
					  		}
				  		?>
				  	</h4>
				  </div>
				  <div class="col-md-7"> 
					<a href="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image1; ?>" data-lightbox="Nieuws" title="<?php echo $secondHand->title; ?>"> 	
						<img src="images/secondHand/<?php echo $secondHand->id.'/sm/'.$secondHand->image1; ?>" class="img-responsive img-center	">
					</a> 
				  </div>
				</div>
			</div>
			<br>
			<div class="row news">
				<div class="col-lg-12">
					<?php 
					if(isset($secondHand->image2) && $secondHand->image2 != ''){ 
						echo '<div class="col-md-3">';
							echo '<a href="images/secondHand/'.$secondHand->id.'/'.$secondHand->image2.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
								echo '<img src="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image2.'" class="myImage img-responsive img-center	">';
							echo '</a>'; 
						echo '</div>';
					}
					if(isset($secondHand->image3) && $secondHand->image3 != ''){
						echo '<div class="col-md-3">';
							echo '<a href="images/secondHand/'.$secondHand->id.'/'.$secondHand->image3.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
								echo '<img src="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image3.'" class="myImage img-responsive img-center	">';
							echo '</a>';
						echo '</div>';
					}
					if(isset($secondHand->image4) && $secondHand->image4 != ''){
						echo '<div class="col-md-3">';
							echo '<a href="images/secondHand/'.$secondHand->id.'/'.$secondHand->image4.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
								echo '<img src="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image4.'" class="myImage img-responsive img-center	">';
							echo '</a>';
						echo '</div>';
					}
					if(isset($secondHand->image5) && $secondHand->image5 != ''){
						echo '<div class="col-md-3">';
							echo '<a href="images/secondHand/'.$secondHand->id.'/'.$secondHand->image5.'" data-lightbox="Nieuws" title="'.$secondHand->title.'">';
								echo '<img src="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image5.'" class="myImage img-responsive img-center	">';
							echo '</a>';
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