<?php
//set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
$secondHandDAO = DAOFactory::getSecondHandDAO();
$secondHandArr = null;
$secondHandArr =$secondHandDAO->getActiveSecondHand();
include_once '_/components/lang/select.lang.php';
?>
<html>
	<head>
		<meta name="keyword" content="Agri Technics, Fendt, tractor">	
		<meta name="description" content="Dekens Agri Technics - Specialist in tuinmachines en parkmachines met een uitstekende service">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?php echo  $lang ['secondhand_pagetitle'];?></title>
		<link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/lightbox.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
  		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	</head>

</head>
<body id="home">
	<section class="container">
        <div class="content row container">
         	<?php include "_/components/php/header.php"; ?>
        	<h1 class="page-header"><?php echo  $lang ['secondhand_title'];?></h1>
        	<div class="row news">
        			<?php
        			$items = 0;
        			if(sizeof($secondHandArr) == 0)
        			{
        				
        				echo '<div class="col-md-12">';
        				echo '<h2>'.$lang["secondhand_no_items"].'</h2>';
        				echo '</div>';
        			}
        			foreach ($secondHandArr as $secondHand ){
					//todo mod function 
						if($items == 3 || $items == 6 || $items == 9){
							echo '</div>';
							echo '<div class="row news">';
						}
						echo '<div class="col-md-4">';
						if($secondHand->sold){
								
									echo '<img src="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image1.'" class="mythumbnail myImage img-responsive img-center"></a>';
									echo '<div class="mywrapper">';
									echo '<div class="caption mypost-content">';
									
									echo '<h1 style="font-size:50px;font-style:bold;color:red">'.$lang["secondhand_sold"].'</h1>';
									//echo '<p>Lorem ipsum dolor sit amet</p>';
									
									echo '</div></div>';
									echo '<h2 style="text-align:center;">';
								echo $secondHand->title;
								//echo "<br/>VERKOCHT";
							echo '</h2>';
						}
						else
						{
							echo '<a href="2dehandsDetail.php?id='.$secondHand->id.'" title="'.$secondHand->title.'">';
							echo '<img src="images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image1.'" class="myImage img-responsive img-center"></a>';
							echo '<h2 style="text-align:center;">';
							echo '<a href="2dehandsDetail.php?id='.$secondHand->id.'">';
							echo $secondHand->title;
							echo '</a></h2>';
							echo '</a>';
						}
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
</body>
</html>