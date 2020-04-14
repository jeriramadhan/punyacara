<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
      error_reporting(0);
      $b=$data->row_array();
      $url=base_url().'blog/'.$b['tulisan_slug'];
      $img=base_url().'assets/images/'.$b['tulisan_gambar'];
      $title=$b['tulisan_judul'];
      $deskripsi=strip_tags($b['tulisan_isi']);
      if(empty($b['tulisan_deskripsi'])){
          $meta_deskripsi=strip_tags(limit_words($b['tulisan_isi'],50));
      }else{
          $meta_deskripsi=$b['tulisan_deskripsi'];
      }
      
    ?>
    <meta charset="utf-8">
    <title><?php echo $b['tulisan_judul'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/favicon.png'?>"/>
	<!-- META FOR IOS & HANDHELD -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="HandheldFriendly" content="true" />
	<meta name="apple-mobile-web-app-capable" content="YES" />

    
    <meta name="description" content="<?php echo $meta_deskripsi;?>" />
    <link rel="canonical" href="<?php echo $url;?>" />
    <meta property="og:locale" content="id_id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="<?php echo $meta_deskripsi;?>" />
    <meta property="og:url" content="<?php echo $url?>" />
    <meta property="og:site_name" content="punyacara" />
    
    <meta property="article:publisher" content="https://id-id.facebook.com/Hannahhotel.syariah/" />
    <meta property="article:section" content="<?php echo $b['tulisan_kategori_nama'];?>" />
    <meta property="og:image" content="<?php echo $img?>" />
    <meta property="og:image:width" content="460" />
    <meta property="og:image:height" content="440" />
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="<?php echo $meta_deskripsi;?>" />
    <meta name="twitter:title" content="<?php echo $title;?>" />
    <meta name="twitter:site" content="@MFikri75770694" />
    <meta name="twitter:image" content="<?php echo $img?>" />
    <meta name="twitter:creator" content="@MFikri75770694" />
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
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/jssocials.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/jssocials-theme-flat.css'?>">
    
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
                                <!-- POST SINGLE -->
                                <article class="post post-single">

                                    <div class="entry-media">
                                        <img src="<?php echo $img;?>" alt="<?php echo $title;?>">
                                        <span class="posted-on"><strong><?php echo $b['hari'];?></strong><?php echo $b['bulan'];?></span>
                                    </div>
                                    
                                    <div class="entry-header">

                                        <h2 class="entry-title"><?php echo $title;?></h2>

                                        <p class="entry-meta">

                
                                            <span class="entry-author">
                                                <span class="screen-reader-text">Posted by </span>
                                                <a href="#" class="entry-author-link">
                                                    <span class="entry-author-name"><?php echo $b['tulisan_author'];?></span>
                                                </a>
                                            </span>

                                            <span class="entry-categories">
                                                <a href="#"><?php echo $b['tulisan_kategori_nama'];?></a>
                                            </span>

                                            <span class="entry-comments-link">
                                                <a href="#"><?php echo $jum_views->num_rows().' Views';?></a>
                                            </span>
                                        </p>

                                    </div>

                                    <div class="entry-content"><?php echo $b['tulisan_isi'];?></div>
                                    
                                    <div class="entry-share" style="margin-top: 20px;margin-left: 13%;">
                                        <h4>Share:</h4>
                                        <div id="sharePopup"></div>
                                    </div>
                                </article>
                                
                                
                                <!-- END / POST SINGLE -->

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
    <script type="text/javascript" src="<?php echo base_url().'theme/js/jssocials.js'?>"></script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#sharePopup").jsSocials({
                    showCount: true,
                    showLabel: true,
                    shareIn: "popup",
                    shares: [
                    { share: "twitter", label: "Twitter" },
                    { share: "facebook", label: "Facebook" },
                    { share: "googleplus", label: "Google+" },
                    { share: "linkedin", label: "Linked In" },
                    { share: "pinterest", label: "Pinterest" },
                    { share: "whatsapp", label: "Whats App" }
                    ]
            });
        });
    </script>
</body>
</html>