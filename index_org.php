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
               <!--  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img class="img-responsive merk-index" src="images/merken_index/MasseyLogo.gif"/>
                    <img class="img-responsive merk-index" src="images/merken_index/FendtLogo.jpg"/>
                    <img class="img-responsive merk-index" src="images/merken_index/kubota01.gif"/>
                    <img class="img-responsive merk-index" src="images/merken_index/record.jpg"/>
                    <img class="img-responsive merk-index" src="images/merken_index/thaler.gif"/>
                    <img class="img-responsive merk-index" src="images/merken_index/pageLogoKuhn.gif"/>
                    <img class="img-responsive merk-index" src="images/merken_index/FELLA.jpg"/>
                    <img class="img-responsive merk-index" src="images/merken_index/HusqvarnaLogo.gif"/>
                </div> -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <p>
                        Wilt u graag een nieuwe tractor aankopen of is uw huidige tractor gewoon toe aan een groot onderhoud ? Is uw plukwagen of spuitmachine defect of aan vervanging toe ? Wilt u de nieuwste trends in de land- & tuinbouwmachines van dichtbij opvolgen ? Steekt u liever zelf de handen uit de mouwen maar ontbreken u nog enkele wisselstukken ?
                    </p>
                    <!-- <p>
                        Bent u op zoek naar een kettingzaag of een haagschaar ? Overweegt u de aankoop van een grasmachine of een zitmaaier ? Wilt u uw kind verrassen met een kanjer van een speelgoed tractor ?
                    </p> -->
                    <p>
                        Op deze website vindt u ons aanbod aan machines en tractoren voor land- & tuinbouw en voor fruitteelt. Naast professionelen kunnen ook particulieren bij ons terecht voor de courante park- en tuingereedschappen. Bij ons kan je terecht voor verkoop (nieuw en tweedehands) als ook voor herstellingen.
                    </p>
                    <p>
                        We hopen u vlug te mogen verwelkomen als klant. Maar ook indien u meer informatie wenst over onze diensten of graag een offerte had gekregen, twijfel dan niet en contacteer ons.
                    </p>
                    <p>
                        <?php //include '_/components/newsTicker/index_module.php'; ?>
                    <p>
                </div>
                <?php
                	$frontPageDAO = DAOFactory::getContentFrontPageDAO();
                	$frontPageArray = $frontPageDAO->getActiveFrontPage();
                	for($i = 0; $i < count ( $frontPageArray ); $i ++) {
						$row = $frontPageArray [$i];
						echo '<div class="media">';
							echo '<a class="pull-left" href="#">';
								echo '<img class="media-object" width="200px" src="images/frontPage/'.$row->id.'/'.$row->image.'" alt="...">';
							echo '</a>';
							echo '<div class="media-body">';
								echo '<h4 class="media-heading">'.$row->title.'</h4>';
									echo $row->description;
							echo '</div>';
						echo '</div>';
					}
                ?>
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs visible-lg visible-md">
                    <div class="cycle-slideshow">
                        <img class="img-responsive" src="images/slides_index/IMG_3073.JPG"/>
                        <img class="img-responsive" src="images/slides_index/IMG_3081.JPG"/>
                        <img class="img-responsive" src="images/slides_index/IMG_3084.JPG"/>
                        <img class="img-responsive" src="images/slides_index/IMG_3085.JPG"/>
                        <img class="img-responsive" src="images/slides_index/IMG_3086.JPG"/>
                    </div>
               	</div>
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
        // set BarcodeQR object
        
        $qr = new BarcodeQR();
        
        // create URL QR code
        $qr->url("www.shayanderson.com");
        
        // display new QR code image
        $qr->draw();
        include "_/components/php/footer.php"; ?> 
		<script type="text/javascript" src="_/js/bootstrap.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="_/components/newsTicker/jquery.easy-ticker.js"></script>
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