<?php
set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
$rentalDAO = DAOFactory::getRentalDAO();
$rentalArr = null;
$rentalArr =$rentalDAO->getActiveRental();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Dekens Agri Technics - Verhuur</title>
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
        	<h1 class="page-header">Verhuur</h1>
        	<div class="row news">
        			<?php
        			$items = 0;
        			if(sizeof($rentalArr) == 0)
        			{
        			
        				echo '<div class="col-md-12">';
        				echo '<h2>Momenteel geen items te huur</h2>';
        				echo '</div>';
        			}
        			foreach ($rentalArr as $rental ){
					//todo mod function 
						if($items == 3 || $items == 6 || $items == 9){
							echo '</div>';
							echo '<div class="row news">';
						}
						echo '<div class="col-md-4">';
							echo '<a href="VerhuurDetail.php?id='.$rental->id.'" title="'.$rental->title.'">';
								echo '<img src="images/rental/'.$rental->id.'/sm/'.$rental->image1.'" class="myImage img-responsive img-center"></a>';
								echo '<h2 style="text-align:center;">';
						echo '<a href="VerhuurDetail.php?id='.$rental->id.'">';
							echo $rental->title;
						echo '</a></h2>';
						echo '</a>';
						echo '</div>';
						$items++;
					}
        			
        				
        			?>
        	<?php
        	if($items == 4 || $items = 7 || $items == 10){ 		
				echo '</div>';
			}
			?>

			
		  	
			
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