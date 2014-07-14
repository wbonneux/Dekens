<?php
set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
$secondHandDAO = DAOFactory::getSecondHandDAO();
$secondHandArr =$secondHandDAO->getActiveSecondHand();
foreach ($secondHandArr as $secondHand){
	echo $secondHand->id;
}
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
        	<h1 class="page-header">2dehands</h1>
        	<div class="row news">
        			<?php
        				echo '<div class="col-md-4">';
        				echo '<a href="images/secondHand/'.$secondHand->id.'/'.$secondHand->image1.'"data-lightbox="Nieuws"  title="2dehands - Klik op de foto voor details">';
        				echo '<img src="images/secondHand/'.$secondHand->id.'/'.$secondHand->image1.'" class="myImage img-responsive img-center">';
        				echo '<h2 style="text-align:center;"><a href="2dehandsDetail.php?id='.$secondHand->id.'">';
        				echo $secondHand->title; 
        				if($secondHand->sold)
							{echo "<br/>VERKOCHT";}
						echo '</a></h2>';
        				echo '</a>'; 
        				echo '</div>';
        			?>
        	
				  
				<div class="col-md-4"> 
					<a href="images/nieuws/blog-item2.jpg" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/nieuws/blog-item2.jpg" class="myImage img-responsive img-center	">
						<h2 style="text-align:center;"><a href="NieuwsDetail.php">Nieuwe 2dehands tractor te koop!</a></h2>
					</a> 
					
				</div>
				<div class="col-md-4"> 
					<a href="images/nieuws/blog-item2.jpg" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/nieuws/blog-item2.jpg" class="myImage img-responsive img-center	">
						<h2 style="text-align:center;"><a href="NieuwsDetail.php">Nieuwe 2dehands tractor te koop!</a></h2>
					</a> 
					
				</div>
			</div>
		    <div class="row news">
				  <div class="col-md-4"> 
				  	<a class="media" href="images/nieuws/blog-item1.jpg" data-lightbox="Nieuws"  title="2dehands - Klik op de foto voor details">
				  		<img src="images/nieuws/blog-item1.jpg" class="myImage img-responsive img-center">
				  		<h2 style="text-align:center;"><a href="#">Fendt 210 VVario demo</a></h2>
				  	</a> 
				  </div>
				<div class="col-md-4"> 
					<a href="images/nieuws/blog-item2.jpg" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/nieuws/blog-item2.jpg" class="myImage img-responsive img-center	">
						<h2 style="text-align:center;"><a href="NieuwsDetail.php">Nieuwe 2dehands tractor te koop!</a></h2>
					</a> 
					
				</div>
				<div class="col-md-4"> 
					<a href="images/nieuws/blog-item2.jpg" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/nieuws/blog-item2.jpg" class="myImage img-responsive img-center	">
						<h2 style="text-align:center;"><a href="NieuwsDetail.php">Nieuwe 2dehands tractor te koop!</a></h2>
					</a> 
					
				</div>
			</div>
			<br>
			<div class="row news">
				  <div class="col-md-4"> 
				  	<a href="images/nieuws/blog-item1.jpg" data-lightbox="Nieuws"  title="2dehands - Klik op de foto voor details">
				  		<img src="images/nieuws/blog-item1.jpg" class="myImage img-responsive img-center">
				  		<h2 style="text-align:center;"><a href="#">Fendt 210 VVario demo</a></h2>
				  	</a> 
				  </div>
				<div class="col-md-4"> 
					<a href="images/nieuws/blog-item2.jpg" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/nieuws/blog-item2.jpg" class="myImage img-responsive img-center	">
						<h2 style="text-align:center;"><a href="NieuwsDetail.php">Nieuwe 2dehands tractor te koop!</a></h2>
					</a> 
					
				</div>
				<div class="col-md-4"> 
					<a href="images/nieuws/blog-item2.jpg" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/nieuws/blog-item2.jpg" class="myImage img-responsive img-center	">
						<h2 style="text-align:center;"><a href="NieuwsDetail.php">Nieuwe 2dehands tractor te koop!</a></h2>
					</a> 
					
				</div>
			</div>

			
		  	
			
        </div><!-- content -->
	</section>   
	<?php include "_/components/php/footer.php"; ?>
	<script type="text/javascript" src="_/js/bootstrap.js"></script>
	<script type="text/javascript" src="_/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="_/js/myscript.js"></script>
    <script type="text/javascript" src="_/js/lightbox.js"></script>
	</script>
</body>
</html>