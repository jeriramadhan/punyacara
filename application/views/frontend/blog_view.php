<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/favicon.png'?>"/>
	<meta name="description" content="punyacara blog">
    
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
        
        <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        
        <!-- BLOG -->
        <section class="section-blog bg-white">
            <div class="container">
                <div class="blog">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="blog-content">
                            <?php 
                                error_reporting(0);
                                function limit_words($string, $word_limit){
                                    $words = explode(" ",$string);
                                    return implode(" ",array_splice($words,0,$word_limit));
                                }
                                foreach ($data->result() as $row): 
                            ?>
                                <!-- POST ITEM -->
                                <article class="post">

                                    <div class="entry-media">
                                        <a href="<?php echo site_url('blog/'.$row->tulisan_slug);?>" class="post-thumbnail hover-zoom"><img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" alt=""></a>

                                        <span class="posted-on"><strong><?php echo $row->hari;?></strong><?php echo $row->bulan;?></span>

                                    </div>
                                    
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo site_url('blog/'.$row->tulisan_slug);?>"><?php echo $row->tulisan_judul;?></a></h2>
                                    </div>

                                    <div class="entry-content">
                                        <?php echo limit_words($row->tulisan_isi,70).'<b>...</b>';?>
                                    </div>

                                    <div class="entry-footer">
                                        <p class="entry-meta">
                
                                            <span class="entry-author">
                                                <span class="screen-reader-text">Posted by </span>
                                                <a href="#" class="entry-author-link">
                                                    <span class="entry-author-name"><?php echo $row->tulisan_author;?></span>
                                                </a>
                                            </span>

                                            <span class="entry-categories">
                                                <a href="#"><?php echo $row->tulisan_kategori_nama;?></a>
                                            </span>

                                            <span class="entry-comments-link">
                                                <a href="#"><?php echo $row->tulisan_views;?> Views</a>
                                            </span>

                                           
                                        </p>
                                    </div>

                                </article>
                                <!-- END / POST ITEM -->

                                <?php endforeach;?>

                                <center><?php echo $page;?></center>

                            </div>
                        </div> 

                    </div>
                </div>
            </div>
        </section>
        <!-- END / BLOG -->
        

        <!-- FOOTER -->
       <?php $this->load->view('frontend/footer');?>
		<!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


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