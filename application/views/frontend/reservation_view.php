<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/favicon.png'?>"/>
	<meta name="description" content="Aplikasi Punyacara">
    
	<!-- META FOR IOS & HANDHELD -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-mobile-web-app-capable" content="YES" />
	<!-- //META FOR IOS & HANDHELD -->

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>
	
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/font-awesome.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/font-lotusicon.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/owl.carousel.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/magnific-popup.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/settings.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/lib/bootstrap-select.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/helper.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/custom.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/responsive.css'?>">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'theme/css/style.css'?>">
    
    
</head>

<body>

    
    <!-- PRELOADER -->
    <!-- <div id="preloader">
        <span class="preloader-dot"></span>
    </div> -->
    <!-- END / PRELOADER -->


    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header" class="header-v2">
            
            <!-- HEADER TOP -->
            <?php $this->load->view('frontend/headertop');?>
            <!-- END / HEADER TOP -->
            
            <!-- HEADER LOGO & MENU -->
          <?php $this->load->view('frontend/header');?>
		   <!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->
        
        <!--BANNER -->
        <section class="section-sub-banner bg-9">
            <div></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                    </div>
                </div>

            </div>

        </section>
        <!-- END BANNER -->
        
        <!-- BLOG -->
        <section class="section-blog bg-white">
            <div class="container">
                <div class="blog">
                    <div class="row">

					
					<!-- DEALS PACKAGE -->
    <section class="section-deals mt90">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                        <div class="ot-heading row-20 mb30 text-center">
                            <h2>Reservation With</h2>
                            <h4>Please select one of our partners to make a reservation</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-xs-12 col-sm-6">
                        <div class="item item-deal">
                            <div class="img">
                                <img class="img-full" src="<?php echo base_url().'theme/images/reservation_pantner/traveloka.png'?>" alt="">
                            </div>
                            <div class="info">
                                <!-- GANTI DENGAN LINK TRAVELOKA HOTEL ANDA -->
                                <a class="awe-btn awe-btn-12 btn-medium font-hind f12 bold" href="https://www.traveloka.com/" target="_blank">Reservation with</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="item item-deal">
                            <div class="img">
                                <img class="img-full" src="<?php echo base_url().'theme/images/reservation_pantner/pegipegi.png'?>" alt="">
                            </div>
                            <div class="info"> 
                                <!-- GANTI DENGAN LINK PEGI PEGI HOTEL ANDA -->
                                <a class="awe-btn awe-btn-12 btn-medium font-hind f12 bold" href="https://www.pegipegi.com/" target="_blank">Reservation with</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="item item-deal">
                            <div class="img">
                                <img class="img-full" src="<?php echo base_url().'theme/images/reservation_pantner/booking.png'?>" alt="">
                            </div>
                            <div class="info">
                                <!-- GANTI DENGAN LINK BOOKING.COM HOTEL ANDA -->
                                <a class="awe-btn awe-btn-12 btn-medium font-hind f12 bold" href="https://www.booking.com/" target="_blank">Reservation with</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="item item-deal">
                            <div class="img">
                                <img class="img-full" src="<?php echo base_url().'theme/images/reservation_pantner/agoda.png'?>" alt="">
                            </div>
                            <div class="info">
                                <!-- GANTI DENGAN LINK AGODA HOTEL ANDA -->
                                <a class="awe-btn awe-btn-12 btn-medium font-hind f12 bold" href="https://www.agoda.com/" target="_blank">Reservation with</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
    <!-- END / DEALS PACKAGE -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END / BODY -->

        <!-- FOOTER -->
		 <?php $this->load->view('frontend/footer');?>
	   <!-- END / FOOTER -->

    </div>
    <!-- END / -->


    
    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery-1.11.0.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery-ui.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/bootstrap.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/bootstrap-select.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/isotope.pkgd.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.themepunch.revolution.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.themepunch.tools.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/owl.carousel.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.appear.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.countTo.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.countdown.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.parallax-1.1.3.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/lib/jquery.magnific-popup.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'theme/js/scripts.js'?>"></script>
</body>
</html>