<?php 
include_once '_/components/lang/select.lang.php';
$required = null;
$errors = null;
require_once '_/components/classes/FormValidator.class.php';
include_once '_/components/php/include_dao.php';
?>
<!DOCTYPE>
<html>  
	<head>
		<meta name="description" content="Dekens Agri Technics - Specialist in tuinmachines en parkmachines met een uitstekende service">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?php echo  $lang ['secondhand_pagetitle']?></title>
	    <link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
  		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY-BmvO5ZBSs1KTEutG9rKqFqFxLeUXhg&sensor=false"></script>
<script type="text/javascript" src="http://www.map-generator.org/map/iframejs/3103987c-f992-4698-a25b-460b3eaf3e49?key=AIzaSyBY-BmvO5ZBSs1KTEutG9rKqFqFxLeUXhg&width=950px&height=400px"></script>
	</head>

	<body id="home">
	<?php include_once("_/components/google/analyticstracking.php") ?>
    	<section class="container">
            <div class="content row container">
             	<?php include "_/components/php/header.php"; ?>
        	<h1 class="page-header"><?php echo  $lang ['contact_title'];?></h1>
            <div class="col-lg-12"> 
      <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iùframe src. If you want to use the Google Maps API instead then have at it! -->
      <div class="row">
            <div class="col-sm-8">
              
              <p><?php echo $lang['contact_introduction'];?></p>
              <?php 
              if(isset($_POST['send']))
              {
              	include '_/components/php/contact.action.php';
              	include '_/components/php/contact.form.php';
              }else{
              	include '_/components/php/contact.form.php';
              } 
                    ?>
            </div>
            <div class="col-sm-4">
              <h2>Dekens Agri Technics</h2>
              <p><h3>Roosbeekstraat 52<br />
               3800 Zepperen<br />
                </h3>
              </p>
              <p><abbr title="Telefoon"><i class="fa fa-phone"></i></abbr>&nbsp;&nbsp;011/68.44.10</p>
              <p><abbr title="Fax"><i class="fa fa-print"></i></abbr>&nbsp;&nbsp;011/68.24.53</p>      
              <p><abbr title="Email"><i class="fa fa-envelope"></i></abbr>&nbsp;&nbsp;<a href="mailto:info@dekens-agritechnics.be">info@dekens-agritechnics.be</a></p>
<!--               <p><b><i class="fa fa-clock-o"></i> <abbr title="Openingsuren"></abbr>&nbsp;&nbsp;Maandag - Vrijdag: </b></p> -->
<!--               <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<abbr title="Openingsuren"></abbr>&nbsp;&nbsp;08u30 - 12u00 / 13u00 - 17u30</p> -->
<!--               <p><b><i class="fa fa-clock-o"></i> <abbr title="Openingsuren"></abbr>&nbsp;&nbsp;Zaterdag: </b></p> -->
<!--               <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<abbr title="Openingsuren"></abbr>&nbsp;&nbsp;08u30 - 12u00</p> -->
<!--               <p><b><i class="fa fa-clock-o"></i> <abbr title="Openingsuren"></abbr>&nbsp;&nbsp;Zondag en feestdagen gesloten</b></p> -->

              
              	<?php
              		//OpeningsUren
              		$arrDays = DAOFactory::getDaysHoursDAO()->getActiveAvDaysHours();
              		if(count($arrDays) != 0){
						echo '<h3>Openingsuren</h3>';
					}	 
              		for($i = 0; $i < count ( $arrDays ); $i ++) {
						$day = $arrDays[$i];
						if($day->closed == 1)
						{
							echo '<p><b><i class="fa fa-clock-o"></i> <abbr title="Openingsuren"></abbr>'.$day->day.': gesloten</b><br>';
						}elseif($day->hoursDayBegin != '' && $day->hoursDayEnd != ''){
							echo '<p><b><i class="fa fa-clock-o"></i> <abbr title="Openingsuren"></abbr>'.$day->day.': </b><br>'.$day->hoursDayBegin.' - '.$day->hoursDayEnd.'<br>';
						}else{
							echo '<p><b><i class="fa fa-clock-o"></i> <abbr title="Openingsuren"></abbr>'.$day->day.': </b><br>'.$day->hoursAmBegin.' - '.$day->hoursAmEnd.'/'.$day->hoursPmBegin.' - '.$day->hoursPmEnd.'<br>';
						}
						
					}
					//uitzonderlijk gesloten
					$arrDaysClosed = DAOFactory::getDaysClosedDAO()->getActiveAvDaysClosed();
					if(count($arrDaysClosed) != 0){
						echo '<h3>Uitzonderlijk gesloten</h3>';
						foreach($arrDaysClosed as $x=>$row) {
						  echo '<p><b>'.$row->day.'</b></p>';
						}
					}
					//uitzonderlijk open
					$arrDaysOpen = DAOFactory::getDaysOpenedDAO()->getActiveAvDaysOpen();
					if(count($arrDaysOpen) != 0){
						echo '<h3>Uitzonderlijk open</h3>';
						foreach($arrDaysOpen as $x=>$row) {
							echo '<p><b>'.$row->day.'</b></p>';
						}
					}
					//extra informatie - opendeurdagen, jaarlijks verlof
					$rowInfo = DAOFactory::getAvInformationDAO()->loadActive(1);
					if($rowInfo->information != ''){
						echo '<h3>Informatie</h3>';
						echo '<p><b>'.$rowInfo->information.'</b></p>';
					}
              	?>
              	              <!--
              <ul class="list-unstyled list-inline list-social-icons">
                <li class="tooltip-social facebook-link"><a href="#facebook-page" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="icon-facebook-sign icon-2x"></i></a></li>
                <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="icon-linkedin-sign icon-2x"></i></a></li>
                <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="icon-twitter-sign icon-2x"></i></a></li>
                <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="icon-google-plus-sign icon-2x"></i></a></li>
                -->
              </ul>
            </div>
            </div>
              <div class="row hidden-xs hidden-sm hidden-md">
              	<div class="col-lg-12">
	                <div id ="mapid-3103987c-f992-4698-a25b-460b3eaf3e49" class="hidden-sm hidden-md">
	                  <a href="http://www.map-generator.org/3103987c-f992-4698-a25b-460b3eaf3e49/large-map.aspx">Enlarge Map</a>
	                </div>
                </div>
              </div>
            </div><!-- content -->
            
		</section>        
        <?php include "_/components/php/footer.php"; ?> 
		<script type="text/javascript" src="_/js/bootstrap.js"></script>
        <script type="text/javascript" src="_/js/myscript.js"></script>
    </body>
</html>