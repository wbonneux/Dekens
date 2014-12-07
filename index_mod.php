<?php   
//require_once('_/components/php/include_dao.php');
include_once '_/components/lang/select.lang.php';
include_once '_/components/php/include_dao.php';
?>
<!DOCTYPE>
<html>  
	<head>
		<meta name="keyword" content="Agri Technics, Fendt, tractor">
		<meta name="description" content="Dekens Agri Technics - Specialist in tuinmachines en parkmachines met een uitstekende service">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?php echo  $lang ['index_pagetitle'];?></title>
        <link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link rel="stylesheet" href="_/css/prettyPhoto.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	</head>
	<body id="home">
		<?php include_once("_/components/google/analyticstracking.php") ?>
    	<section class="container">
            <div class="content row container">
             	<?php include "_/components/php/header.php"; ?>
                <h1 class="page-header"><?php  echo $lang['index_title'];?></h1>
                <?php
                $countSh = 0;
                $countRt = 0;
                $countSh = DAOFactory::getSecondHandDAO()->countActiveSecondHand();
                $countRt = DAOFactory::getRentalDAO()->countActiveRental();
                if($countSh == 0 && $countRt == 0)
				{
					echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
				}
				else
				{
					echo '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">';
				}
                ?>
                
	                <?php
	                	$frontPageDAO = DAOFactory::getContentFrontPageDAO();
	                	$frontPageArray = $frontPageDAO->getActiveFrontPage();
	                	for($i = 0; $i < count ( $frontPageArray ); $i ++) {
							$row = $frontPageArray [$i];
							echo '<div class="media">';
								if($row->imagePos != "" && $row->imagePos == 'right')
								{
									echo '<a class="pull-right" href="detail.php?id='.$row->id.'">';
								}
								else
								{
									echo '<a class="pull-left" href="detail.php?id='.$row->id.'">';
								} 
								
									echo '<img class="media-object" width="300px" src="images/frontPage/'.$row->id.'/'.$row->image.'" alt="...">';
								echo '</a>';
								echo '<div class="media-body">';
									echo '<h4 class="media-heading">'.$row->title.' '.$row->imagePos.'</h4>';
										echo $row->description;
								echo '</div>';
							echo '</div>';
							echo '<hr/>';
						}
	                ?>
                </div>
                <?php
                	if($countSh != 0 || $countRt != 0)
                	{
                		echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
                		if($countSh != 0){
                			include '_/components/secondHandTicker/index_module.php';
                		}
                		echo '<br/>';
                		if($countRt != 0){
                			include '_/components/rentalTicker/index_module.php';
                		}
                		echo '</div>';
                	}	
                ?>
            </div><!-- content -->
            <div class="row hidden-md hidden-sm hidden-xs ">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/MasseyLogo.gif"/>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/FendtLogo.jpg"/>    
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/kubota01.gif"/>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/record.jpg"/>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/thaler.gif"/>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/pageLogoKuhn.gif"/>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/FELLA.jpg"/>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <img class="img-responsive" src="images/merken_index/HusqvarnaLogo.gif"/>
                </div>                    
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    
                </div>
            </div>
		</section>        
        <?php
        include "_/components/php/footer.php"; ?> 
		<script type="text/javascript" src="_/js/bootstrap.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!--         <script type="text/javascript" src="_/components/newsTicker/jquery.easy-ticker.js"></script> -->
        <script type="text/javascript" src="_/components/secondHandTicker/jquery.easy-ticker.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#demo').hide();
            $('.vticker').easyTicker();
        });
        </script>
        <script type="text/javascript" src="_/js/jquery.cycle2.min.js"></script>
        <script type="text/javascript" src="_/js/myscript.js"></script>
        
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-36251023-1']);
          _gaq.push(['_setDomainName', 'jqueryscript.net']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>  
    </body>
</html>