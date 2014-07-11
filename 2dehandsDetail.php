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
        	<h1 class="page-header"><?php echo $secondHand->title; if($secondHand->sold){echo "- VERKOCHT";} ?></h1>
		    <div class="row news">
				  <div class="col-md-6"> 
				    <h3>
				  	<?php echo $secondHand->description; ?><br/>
				  	</h3>
				  	<h4>
				  		Bouwjaar: <?php echo $secondHand->buildYear; ?><br/>
				  		Bandenmaat(voor): <?php echo $secondHand->sizeTireFront; ?><br/>
				  		Bandenmaat(achter): <?php echo $secondHand->sizeTireBack; ?><br/>
				  		<?php
				  		if(isset($secondHand->hoursWork)){
				  			echo 'Aantal uren: '.$secondHand->hoursWork.'<br/>';
				  		}
				  		?>
				  		
				  	</h4>
				  </div>
				  <div class="col-md-5"> 
					<a href="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image1; ?>" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image1; ?>" class="myImage img-responsive img-center	">
					</a> 
				</div>
			</div>
			<br>
			<div class="row news">
				<div class="col-md-3">
					<a href="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image2; ?>" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image2; ?>" class="myImage img-responsive img-center	">
					</a> 
				</div>
				<div class="col-md-3">
					<a href="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image3; ?>" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image3; ?>" class="myImage img-responsive img-center	">
					</a> 
				</div>
				<div class="col-md-3">
					<a href="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image4; ?>" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image4; ?>" class="myImage img-responsive img-center	">
					</a> 
				</div>
				<div class="col-md-3">
					<a href="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image5; ?>" data-lightbox="Nieuws" title="2dehands - Klik op de foto voor details">
						<img src="images/secondHand/<?php echo $secondHand->id.'/'.$secondHand->image5; ?>" class="myImage img-responsive img-center	">
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