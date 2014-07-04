<!DOCTYPE>
<html>  
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Dekens Agri Technics -  Fotoalbum</title>
        <link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link rel="stylesheet" href="_/css/lightbox.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
	</head>

	<body id="home">
    	<section class="container">
            <div class="content row container">
             	<?php include "_/components/php/header.php"; ?>
                <br>
                <ol class="breadcrumb">
                  <li><a href="Fotoalbum.php">Fotoalbum</a></li>
                  <li class="active">
                    <?php
                        echo $_GET["album"];
                    ?>
                  </li>
                </ol>
                <?php
                    $dirname = "images/fotoalbum/".$_GET["album"]."/";
                    $images = glob($dirname."*.jpg");
                    foreach($images as $image) {
                        echo '<div class="col-lg-3">';
                        echo '<a href="'.$image.'" data-lightbox="Album" title="Opendeurdag 2007">';
                        echo '<img class="img-responsive" style="margin-bottom:10px" src="'.$image.'" />';
                        echo '</a>';
                        echo '</div>';
                    }
                ?>
                    
               
            </div><!-- content -->
            
		</section>        
        <?php include "_/components/php/footer.php"; ?> 
		<script type="text/javascript" src="_/js/bootstrap.js"></script>
        <script type="text/javascript" src="_/js/myscript.js"></script>
        <script type="text/javascript" src="_/js/lightbox.js"></script>
        <script src="js/jquery-1.10.2.min.js"></script>
        </script>
    </body>
</html>