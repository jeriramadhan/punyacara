<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Schedule</title>

        <meta name="description" content="">
        <meta name="author" content="Jtech Setiadi">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->
        <link rel="stylesheet" href="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">

       

    </head>
    <body>
        <!-- Page Container -->
       
        <div id="page-container" class="sidebar-o side-scroll main-content-boxed side-trans-enabled page-header-fixed">
            <!-- Side Overlay-->
            

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
                                        <span class="font-size-xl text-dual-primary-dark">PunyA</span><span class="font-size-xl text-success">cara</span>
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
                                    <a href="<?php echo base_url().'admin/dashboard'?>"><i class="si si-screen-desktop"></i><span class="sidebar-mini-hide">Dashboard</span></a>
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
                                <li class="open">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-cup"></i><span class="sidebar-mini-hide">Restaurant</span></a>
                                    <ul>
                                        <li>
                                            <a class="active" href="<?php echo base_url().'admin/schedule'?>">Schedule</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'admin/menu'?>">Menu</a>
                                        </li>
        
                                    </ul>
                                </li>
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

            <!-- Header -->
            <?php echo $this->load->view('admin/header.php');?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Schedule</h3>
                                    <div class="block-options">
                                        <button class="btn btn-primary" id="btn-add-new"><span class="fa fa-plus"></span> Add New</button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table id="mytable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 120px;text-align: left;">No</th>
                                                <th>Name</th>
                                                <th>Time</th>
                                                <th style="text-align:center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no=0;
                                            foreach ($schedule->result() as $row) :
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->nama;?></td>
                                                <td><?php echo $row->jam;?></td>
                                                <td style="width: 90px;text-align: center;">
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-circle btn-edit" data-id="<?php echo $row->kd_makan;?>" data-nama="<?php echo $row->nama;?>" data-jam="<?php echo $row->jam;?>"><span class="fa fa-pencil"></span></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-circle btn-hapus" data-id="<?php echo $row->kd_makan;?>"><span class="fa fa-trash"></span></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                 
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Created with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://jtech.my.id" target="_blank">Jtech Setiadi</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://jtech.my.id" target="_blank">Jtech</a> &copy; <span class="js-year-copy"><?php echo date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Modal Hapus -->
        <form action="<?php echo base_url().'admin/schedule/simpan_schedule'?>" method="post">
        <div class="modal" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Add New</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group">
                                <input type="text" name="xnama" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="xjam" class="form-control" placeholder="Time" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-square">Save</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- END Normal Modal -->

        <!-- Modal Hapus -->
        <form action="<?php echo base_url().'admin/schedule/update_schedule'?>" method="post">
        <div class="modal" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Update Kategori</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group">
                                <input type="text" name="xnama2" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="xjam2" class="form-control" placeholder="Time" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="xkode" required>
                        <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-square">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- END Normal Modal -->

        <!-- Modal Hapus -->
        <form action="<?php echo base_url().'admin/schedule/hapus_schedule'?>" method="post">
        <div class="modal" id="Modalhapus" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Info</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Anda yakin mau menghapus schedule ini?</p>
                            <input type="hidden" name="kode" id="kode" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary btn-square">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- END Normal Modal -->


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
        <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/plugins/datatables/jquery.dataTables.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.js'?>"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();

                //Show Modal Add New
                $('#btn-add-new').on('click',function(){ 
                    $('#ModalAddNew').modal('show');
                });

                //Show Modal Update Kategori
                $('.btn-edit').on('click',function(){
                    var id=$(this).data('id');
                    var nama=$(this).data('nama');
                    var jam=$(this).data('jam');
                    $('#ModalUpdate').modal('show');
                    $('[name="xkode"]').val(id);
                    $('[name="xnama2"]').val(nama);
                    $('[name="xjam2"]').val(jam);
                });

                //Show Konfirmasi modal hapus record
                $('.btn-hapus').on('click',function(){
                    var id=$(this).data('id');
                    $('#Modalhapus').modal('show');
                    $('[name="kode"]').val(id);
                });  

            });
        </script>

    </body>
</html>