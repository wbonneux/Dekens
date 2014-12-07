<?php
include_once '_/components/lang/select.lang.php';
if(!isset($_REQUEST['id'])){
	header("location:index.php");
} 
?>
<?php
set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
$rentalDAO = DAOFactory::getRentalDAO();
$rental =$rentalDAO->load($_REQUEST['id']);
?>
<html>
	<head>	
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?php echo  $lang ['rentaldetail_pagetitle'];?></title>
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
         	<div class="row">
         		<div class="col-lg-12">
         			<h6 style="margin-bottom:0px">
         				<button class="btn btn-success btn-sm" type="button">
						    <a style="color:white" href="Verhuur.php"><?php echo $lang['back_to_list'];?></a>
						  </button>
         			</h6>
         		</div>
        	</div>
         	<div class="row">
         		<div class="col-lg-12">
         			<h1 class="page-header"><a href="Verhuur.php"><?php echo $lang['rental_title'];?></a> / <?php echo $rental->title; ?></h1>
        		</div>
        	</div>
        	
		    <div class="row news">
		    	<div class="col-lg-12">
		    	
				  <div class="col-md-6">
				  	<div class="row" style="font-weight:bold">
				  		<div class="col-lg-4" style="text-align:center">
        			<?php echo '<div class="alert alert-success">'.$lang['rentaldetail_price_day'].'<br>&#8364; '.$rental->priceDay.'</div>'; ?>
        		</div>
        		<div class="col-lg-4" style="text-align:center">
        			<?php echo '<div class="alert alert-success">'.$lang['rentaldetail_price_weekend'].'<br>&#8364; '.$rental->priceWeekend.'</div>'; ?>
        		</div>
        		<div class="col-lg-4" style="text-align:center">
        			<?php echo '<div class="alert alert-success">'.$lang['rentaldetail_price_week'].'<br>&#8364; '.$rental->priceWeek.'</div>'; ?>
        		</div>
				  	</div> 
				    <h3>
				    	<div class="description">
				  			<?php echo $rental->description; ?>
				  		</div>
			  		</h3>
			  		<h4>
				  		<?php
					  		if(isset($rental->buildYear)){
					  			echo '<div class="alert alert-success">Bouwjaar: '.$rental->buildYear.'</div>';
					  		}
					  		if(isset($rental->sizeTireFront) && $rental->sizeTireFront != ""){
					  			echo '<div class="alert alert-success">Bandenmaat(voor): '.$rental->sizeTireFront.'</div>';
					  		}
					  		if(isset($rental->sizeTireBack) && $rental->sizeTireBack != ""){
					  			echo '<div class="alert alert-success">Bandenmaat(achter): '.$rental->sizeTireBack.'</div>';
					  		}
					  		if(isset($rental->hoursWork)){
					  			echo '<div class="alert alert-success">Aantal uren: '.$rental->hoursWork.'</div>';
					  		}
				  		?>
				  	</h4>
				  </div>
				  <div class="col-md-5"> 
					<a href="images/rental/<?php echo $rental->id.'/'.$rental->image1; ?>" data-lightbox="Nieuws" title="<?php echo $rental->title; ?>"> 	
						<img src="images/rental/<?php echo $rental->id.'/sm/'.$rental->image1; ?>" class="img-responsive img-center	">
					</a> 
				  </div>
				</div>
			</div>
			<br>
			<div class="row news">
				<div class="col-lg-12">
					<?php 
					if(isset($rental->image2) && $rental->image2 != ''){ 
						echo '<div class="col-md-3">';
							echo '<a href="images/rental/'.$rental->id.'/'.$rental->image2.'" data-lightbox="Nieuws" title="'.$rental->title.'">';
								echo '<img src="images/rental/'.$rental->id.'/sm/'.$rental->image2.'" class="myImage img-responsive img-center	">';
							echo '</a>'; 
						echo '</div>';
					}
					if(isset($rental->image3) && $rental->image3 != ''){
						echo '<div class="col-md-3">';
							echo '<a href="images/rental/'.$rental->id.'/'.$rental->image3.'" data-lightbox="Nieuws" title="'.$rental->title.'">';
								echo '<img src="images/rental/'.$rental->id.'/sm/'.$rental->image3.'" class="myImage img-responsive img-center	">';
							echo '</a>';
						echo '</div>';
					}
					if(isset($rental->image4) && $rental->image4 != ''){
						echo '<div class="col-md-3">';
							echo '<a href="images/rental/'.$rental->id.'/'.$rental->image4.'" data-lightbox="Nieuws" title="'.$rental->title.'">';
								echo '<img src="images/rental/'.$rental->id.'/sm/'.$rental->image4.'" class="myImage img-responsive img-center	">';
							echo '</a>';
						echo '</div>';
					}
					if(isset($rental->image5) && $rental->image5 != ''){
						echo '<div class="col-md-3">';
							echo '<a href="images/rental/'.$rental->id.'/'.$rental->image5.'" data-lightbox="Nieuws" title="'.$rental->title.'">';
								echo '<img src="images/rental/'.$rental->id.'/sm/'.$rental->image5.'" class="myImage img-responsive img-center	">';
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