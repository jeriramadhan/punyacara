<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Dashboard</title>

        <meta name="description" content="">
        <meta name="author" content="Jtech Setiadi">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">

        <?php
        /* Mengambil query report*/
            error_reporting(0);
            foreach($visitor as $result){
                $bulan[] = $result->tgl; //ambil bulan
                $value[] = (float) $result->jumlah; //ambil nilai
            }
            /* end mengambil query*/
            foreach($visitor_this_year as $result){
                $month[] = $result->bulan; //ambil bulan
                $count[] = (float) $result->jumlah; //ambil nilai
            }
            $v_this_year=$sum_visitor_year->row_array();
            $v_last_year=$sum_visitor_last_year->row_array();
            $v_average_this_year=$sum_visitor_average_this_year->row_array();
            $v_this_month=$visitor_this_month->row_array();
            $v_last_month=$visitor_last_month->row_array();
            $v_avg_perday=$visitor_average_day->row_array();

        ?>

    </head>
    <body>
        <!-- Page Container -->
       
        <div id="page-container" class="sidebar-o side-scroll main-content-boxed side-trans-enabled page-header-fixed">
            

            <!-- Sidebar -->
         
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Mini Mode -->
                            <div class="content-header-section sidebar-mini-visible-b">
                                <!-- Logo -->
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                                <!-- END Logo -->
                            </div>
                            <!-- END Mini Mode -->

                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->

                                <!-- Logo -->
                                <div class="content-header-item">
                                    <a class="link-effect font-w700" href="<?php echo base_url().'admin/dashboard'?>">
                                        <i class="text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">M</span><span class="font-size-xl text-success"><strong>HOTEL</strong></span>
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->

                        <!-- Side User -->
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <!-- Visible only in mini mode -->
                            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                <img class="img-avatar img-avatar32" src="<?php echo base_url().'assets/images/user_blank.png'?>" alt="">
                            </div>
                            <!-- END Visible only in mini mode -->

                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <?php 
                                    error_reporting(0);
                                    $idadmin=$this->session->userdata('idadmin');
                                    $query=$this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$idadmin'");
                                    $data=$query->row_array();
                                ?>
                                <?php if($this->session->userdata('akses')=='3'):?>
                                    <a class="img-link" href="<?php echo base_url().'assets/images/user_blank.png'?>">
                                        <img class="img-avatar" src="<?php echo base_url().'assets/images/user_blank.png'?>" alt="">
                                    </a>
                                <?php else:?>
                                    <a class="img-link" href="#">
                                        <img class="img-avatar" src="<?php echo base_url().'assets/images/'.$data['pengguna_photo'];?>" alt="">
                                    </a>
                                <?php endif;?>
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="#"><?php echo $this->session->userdata('nama');?></a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- END Visible only in normal mode -->
                        </div>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
                                
                                <li>
                                    <a class="active" href="<?php echo base_url().'admin/dashboard'?>"><i class="si si-screen-desktop"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pin"></i><span class="sidebar-mini-hide">Post</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url().'admin/tulisan/add_tulisan'?>">Add New</a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo base_url().'admin/tulisan'?>">Post</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'admin/kategori'?>">Categories</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'admin/slider'?>"><i class="si si-picture"></i><span class="sidebar-mini-hide">Image Slider</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'admin/paket'?>"><i class="si si-star"></i><span class="sidebar-mini-hide">Paket</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'admin/fasilitas'?>"><i class="si si-badge"></i><span class="sidebar-mini-hide">Fasilities</span></a>
                                </li>
                                 <!-- <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-cup"></i><span class="sidebar-mini-hide">Restaurant</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url().'admin/schedule'?>">Schedule</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'admin/menu'?>">Menu</a>
                                        </li>
        
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="<?php echo base_url().'admin/events'?>"><i class="si si-calendar"></i><span class="sidebar-mini-hide">Events</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'admin/inbox'?>"><i class="si si-envelope"></i><span class="sidebar-mini-hide">Inbox</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'admin/contact'?>"><i class="si si-call-end"></i><span class="sidebar-mini-hide">Info Contact</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'admin/pengguna'?>"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                                </li>
                               
                            </ul>
                        </div>
                        <!-- END Side Navigation -->
                        
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <?php echo $this->load->view('admin/header.php');?>

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-pin fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600"><?php echo number_format_short($total_post);?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Post</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600"><?php echo number_format_short($pengunjung_total);?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Visitors</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-eye fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600"><?php echo number_format_short($page_views);?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Page Views</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-user fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600"><?php echo number_format_short($total_users);?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Users</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    <div class="row gutters-tiny invisible" data-toggle="appear">

                        <!-- Row #2 -->
                        <div class="col-md-6">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">
                                        Visitors <small>This Month</small>
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="pull-all">
                                        <canvas class="js-chartjs-dashboard-lines"></canvas>
                                    </div>
                                </div>
                                
                                <div class="block-content">
                                    <div class="row items-push">
                                        <div class="col-6 col-sm-4 text-center text-sm-left">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                            <div class="font-size-h4 font-w600"><?php echo number_format_short($v_this_month['jumlah']);?></div>
                                            
                                        </div>
                                        <div class="col-6 col-sm-4 text-center text-sm-left">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Last Month</div>
                                            <div class="font-size-h4 font-w600"><?php echo number_format_short($v_last_month['jumlah']);?></div>
                                            
                                        </div>
                                        <div class="col-12 col-sm-4 text-center text-sm-left">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Average per day</div>
                                            <div class="font-size-h4 font-w600"><?php echo number_format_short($v_avg_perday['jumlah']);?></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">
                                        Visitors <small>This Year</small>
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all">
                                        <!-- Lines Chart Container -->
                                        <canvas class="js-chartjs-dashboard-lines2"></canvas>
                                    </div>
                                </div>
                                <div class="block-content bg-white">
                                    <div class="row items-push">
                                        <div class="col-6 col-sm-4 text-center text-sm-left">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Year</div>
                                            <div class="font-size-h4 font-w600"><?php echo number_format_short($v_this_year['jumlah']);?></div>
                                            
                                        </div>
                                        <div class="col-6 col-sm-4 text-center text-sm-left">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Last Year</div>
                                            <div class="font-size-h4 font-w600"><?php echo number_format_short($v_last_year['visitor_last_year']);?></div>
                                            
                                        </div>
                                        <div class="col-12 col-sm-4 text-center text-sm-left">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Average per month</div>
                                            <div class="font-size-h4 font-w600"><?php echo number_format_short($v_average_this_year['jumlah']);?></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #2 -->
                    </div>
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <?php
                            $inbox_query=$this->db->query("SELECT * FROM inbox")->num_rows();
                            $paket_query=$this->db->query("SELECT * FROM compare")->num_rows();
                            $makan_query=$this->db->query("SELECT * FROM makanan")->num_rows();
                        ?>
                        <!-- Row #3 -->
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-envelope-open fa-4x text-info"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600"><?php echo $inbox_query;?> Inbox</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-building fa-4x text-info"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600"><?php echo $paket_query;?> Paket Terdaftar</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-cutlery fa-4x text-info"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600"><?php echo $makan_query;?> Menu</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #3 -->
                    </div>
                    
                    
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://jtech.my.id" target="_blank">Jtech Setiadi</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://jtech.my.id" target="_blank">Jtech</a> &copy; <span class="js-year-copy"><?php echo date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->



        <!-- Codebase Core JS -->
        <script src="<?php echo base_url().'assets/js/core/jquery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/popper.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.scrollLock.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.appear.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/jquery.countTo.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/core/js.cookie.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/codebase.js'?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url().'assets/js/plugins/chartjs/Chart.bundle.min.js'?>"></script>

        <!-- Page JS Code -->


        <script type="text/javascript">
            $(document).ready(function(){


                var BePagesDashboard = function() {
                    // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
                    var initDashboardChartJS = function () {
                        // Set Global Chart.js configuration
                        Chart.defaults.global.defaultFontColor              = '#555555';
                        Chart.defaults.scale.gridLines.color                = "transparent";
                        Chart.defaults.scale.gridLines.zeroLineColor        = "transparent";
                        Chart.defaults.scale.display                        = false;
                        Chart.defaults.scale.ticks.beginAtZero              = true;
                        Chart.defaults.global.elements.line.borderWidth     = 2;
                        Chart.defaults.global.elements.point.radius         = 5;
                        Chart.defaults.global.elements.point.hoverRadius    = 7;
                        Chart.defaults.global.tooltips.cornerRadius         = 3;
                        Chart.defaults.global.legend.display                = false;

                        // Chart Containers
                        var chartDashboardLinesCon  = jQuery('.js-chartjs-dashboard-lines');
                        var chartDashboardLinesCon2 = jQuery('.js-chartjs-dashboard-lines2');

                        // Chart Variables
                        var chartDashboardLines, chartDashboardLines2;

                        // Lines Charts Data
                        var chartDashboardLinesData = {
                            labels: <?php echo json_encode($bulan);?>,
                            datasets: [
                                {
                                    label: 'This Week',
                                    fill: true,
                                    backgroundColor: 'rgba(66,165,245,.25)',
                                    borderColor: 'rgba(66,165,245,1)',
                                    pointBackgroundColor: 'rgba(66,165,245,1)',
                                    pointBorderColor: '#fff',
                                    pointHoverBackgroundColor: '#fff',
                                    pointHoverBorderColor: 'rgba(66,165,245,1)',
                                    data: <?php echo json_encode($value);?>
                                }
                            ]
                        };

                        var chartDashboardLinesOptions = {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        suggestedMax: 50
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItems, data) {
                                        return ' ' + tooltipItems.yLabel + ' Visitors';
                                    }
                                }
                            }
                        };

                        var chartDashboardLinesData2 = {
                            labels: <?php echo json_encode($month);?>,
                            datasets: [
                                {
                                    label: 'This Week',
                                    fill: true,
                                    backgroundColor: 'rgba(156,204,101,.25)',
                                    borderColor: 'rgba(156,204,101,1)',
                                    pointBackgroundColor: 'rgba(156,204,101,1)',
                                    pointBorderColor: '#fff',
                                    pointHoverBackgroundColor: '#fff',
                                    pointHoverBorderColor: 'rgba(156,204,101,1)',
                                    data: <?php echo json_encode($count);?>
                                }
                            ]
                        };

                        var chartDashboardLinesOptions2 = {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        suggestedMax: 480
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItems, data) {
                                        return ' ' + tooltipItems.yLabel + ' Visitors';
                                    }
                                }
                            }
                        };

                        // Init Charts
                        if ( chartDashboardLinesCon.length ) {
                            chartDashboardLines  = new Chart(chartDashboardLinesCon, { type: 'line', data: chartDashboardLinesData, options: chartDashboardLinesOptions });
                        }

                        if ( chartDashboardLinesCon2.length ) {
                            chartDashboardLines2 = new Chart(chartDashboardLinesCon2, { type: 'line', data: chartDashboardLinesData2, options: chartDashboardLinesOptions2 });
                        }
                    };

                    return {
                        init: function () {
                            // Init Chart.js Charts
                            initDashboardChartJS();
                        }
                    };
                }();

                // Initialize when page loads
                jQuery(function(){ BePagesDashboard.init(); });
            });
        </script>
    </body>
</html>