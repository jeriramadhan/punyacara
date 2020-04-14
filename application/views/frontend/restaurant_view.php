<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Restaurant</title>
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
        
        <!-- RESTAURANTS -->
        <section class="section-restaurant-4 bg-white">
            <div class="container">

                <div class="restaurant-tabs">

                    <div class="tabs tabs-restaurant">

                        <div class="icon-restaurant text-center"><i class="lotus-icon-cooker-hood"></i></div>
	
						
                           <ul>
								<?php
									$sql=$this->db->query("SELECT * from jam_makan");
									foreach($sql->result_array() as $data){
								?>
								
                            <li><a href="#tabs-<?php echo $data['kd_makan']?>"><?php echo $data['nama'] ?><span><?php echo $data['jam'] ?></span></a></li>
							
									<?php } ?>
							
                        </ul>

						
								<?php
									$sql1=$this->db->query("SELECT * from jam_makan");
									foreach($sql1->result_array() as $data1){
								?>
							
                        <div id="tabs-<?php echo $data1['kd_makan'] ?>">

                            <div class="restaurant_content">
                                <div class="row">

								
								<?php
									$kode=$data1['kd_makan'];
									$sql2=$this->db->query("SELECT * from makanan where kd_makan='$kode'");
									foreach($sql2->result_array() as $data2){
											$disc=$data2['disc'];
											$harga = "Rp. ".number_format($data2['harga'],'0',',','.');
												if ($disc > 0){
													$discount = "Rp. ".number_format($data2['disc'],'0',',','.');
													$ket='<span class="sales">';
													$kets='</span>';
													
													$baru=$data2['harga'] - $data2['disc']; 
													$baru = "Rp. ".number_format($baru,'0',',','.');
													
													
													$awal='<del><span class="amout">';
													$akhir='</span></del>';
													
												}if($disc == 0){
													$discount = '';
													$ket='';
													$kets='';
													
													$awal='<ins><span class="amout">'; 
													$akhir='</span></ins>';
													$baru='';
												}
								?>
								
								
								
                                    <!-- ITEM -->
                                    <div class="col-md-6">
                                        <div class="restaurant_item small-thumbs">
                                        
                                            <div class="img">
                                                <a href="#"><img src="<?php echo base_url().'assets/images/'.$data2['gambar'];?>" alt=""></a>
                                               <?php echo $ket?><?php echo $discount?><?php echo $kets?>
                                            </div>
                                        
                                            <div class="text">
                                                <h2><a href="#"><?php echo $data2['makanan']?></a></h2>
                                        
                                                <p class="desc"><?php echo $data2['keterangan']?></p>
                                        
                                                <p class="price">
                                             
                                                    <ins><span class="amout"><?php echo $baru ?></span></ins>
                                                   <?php echo $awal ?><?php echo $harga ?><?php echo $akhir?>
                                                </p>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->
									<?php } ?>
									  

                                </div>

                            </div>

                        </div>
						
						<?php  } ?>

                        </div>
                </div>

            </div>
        </section>
        <!-- END / RESTAURANTS -->

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