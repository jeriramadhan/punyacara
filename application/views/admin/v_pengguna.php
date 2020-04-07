<!doctype html>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Users</title>

        <meta name="description" content="">
        <meta name="author" content="Jtech Setiadi">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

        <!-- END Icons -->
        <link rel="stylesheet" href="<?php echo base_url().'assets/js/plugins/datatables/dataTables.bootstrap4.min.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url().'assets/css/codebase.min.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

       

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
                                    <a class="active" href="<?php echo base_url().'admin/pengguna'?>"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
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
                                    <h3 class="block-title">Users</h3>
                                    <div class="block-options">
                                        <button class="btn btn-primary" id="btn-add-new"><span class="fa fa-plus"></span> Add New</button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table id="mytable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Password</th>
                                                <th>Level</th>
                                                <th style="text-align:center;width: 130px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data2->result_array() as $i) :
                                            $pengguna_id=$i['pengguna_id'];
                                            $pengguna_nama=$i['pengguna_nama'];
                                            $pengguna_jenkel=$i['pengguna_jenkel'];
                                            $pengguna_email=$i['pengguna_email'];
                                            $pengguna_username=$i['pengguna_username'];
                                            $pengguna_password=$i['pengguna_password'];
                                            $pengguna_nohp=$i['pengguna_nohp'];
                                            $pengguna_level=$i['pengguna_level'];
                                            $pengguna_photo=$i['pengguna_photo'];
                                        ?>
                                            <tr>
                                                <td><img width="40" height="40" class="img-avatar" src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>"></td>
                                                <td style="vertical-align: middle;"><?php echo $pengguna_username;?></td>
                                                <td style="vertical-align: middle;"><?php echo $pengguna_nama;?></td>
                                                <?php if($pengguna_jenkel=='L'):?>
                                                    <td style="vertical-align: middle;">Laki-Laki</td>
                                                <?php else:?>
                                                    <td style="vertical-align: middle;">Perempuan</td>
                                                <?php endif;?>
                                                <td style="vertical-align: middle;"><?php echo $pengguna_password;?></td>
                                                <?php if($pengguna_level=='1'):?>
                                                    <td style="vertical-align: middle;">Administrator</td>
                                                <?php else:?>
                                                    <td style="vertical-align: middle;">Operator</td>
                                                <?php endif;?>
                                                <td style="text-align:right;vertical-align: middle;">
                                                   <a class="btn btn-sm btn-secondary btn-circle" data-toggle="modal" data-target="#ModalEdit<?php echo $pengguna_id;?>"><span class="fa fa-pencil"></span></a>
                                                   <a class="btn btn-sm btn-secondary btn-circle" href="<?php echo base_url().'admin/pengguna/reset_password/'.$pengguna_id;?>"><span class="fa fa-refresh"></span></a>
                                                   <a class="btn btn-sm btn-secondary btn-circle btn-hapus" data-id="<?php echo $pengguna_id;?>"><span class="fa fa-trash"></span></a>
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

        <!-- Modal Add New -->
        <form action="<?php echo base_url().'admin/pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="col-md-5">
                                     <div class="form-group">
                                        <input type="file" name="filefoto" class="dropify" data-height="140" required>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="xnama" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="xemail" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="xjenkel" class="form-control" placeholder="Jenis Kelamin" required>
                                            <option value="">Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="xusername" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="xpassword" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="xpassword2" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="xkontak" class="form-control" placeholder="Kontak Person">
                            </div>
                            <div class="form-group">
                                <select name="xlevel" class="form-control" placeholder="Level" required>
                                    <option value="">Level</option>
                                    <option value="1">Administrator</option>
                                </select>
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

        <?php foreach ($data2->result() as $row) :?>
        <!-- Modal Add New -->
        <form action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
        <div class="modal" id="ModalEdit<?php echo $row->pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                            <div class="row">
                                <div class="col-md-5">
                                     <div class="form-group">
                                        <input type="file" name="filefoto" class="dropify" data-height="140" data-default-file="<?php echo base_url().'assets/images/'.$row->pengguna_photo;?>">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="xnama" value="<?php echo $row->pengguna_nama;?>" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="xemail" value="<?php echo $row->pengguna_email;?>" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="xjenkel" class="form-control" placeholder="Jenis Kelamin" required>
                                        <?php if($row->pengguna_jenkel=='L'):?>
                                            <option value="L" selected>Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        <?php else:?>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P" selected>Perempuan</option>
                                        <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="xusername" value="<?php echo $row->pengguna_username;?>" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="xpassword" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="xpassword2" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <input type="text" name="xkontak" value="<?php echo $row->pengguna_nohp;?>" class="form-control" placeholder="Kontak Person">
                            </div>
                            <div class="form-group">
                                <select name="xlevel" class="form-control" placeholder="Level" required>
                                <?php if($row->pengguna_level=='1'):?>
                                    <option value="">-No Selected-</option>
                                    <option value="1" selected>Administrator</option>
                                <?php else:?>
                                    <option value="" selected>-No Selected-</option>
                                    <option value="1">Administrator</option>
                                <?php endif;?>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="kode" value="<?php echo $row->pengguna_id;?>" required>
                        <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-square">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- END Normal Modal -->
        <?php endforeach;?>

        <!-- Modal Hapus -->
        <form action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" method="post">
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
                            <p>Anda yakin mau menghapus pengguna ini?</p>
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

        <!-- Modal Reset Password -->
        <div class="modal" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
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
                             <table>
                                <tr>
                                    <th style="width:120px;">Username</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('uname');?></th>
                                </tr>
                                <tr>
                                    <th style="width:120px;">Password Baru</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('upass');?></th>
                                </tr>
                            </table>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
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
        <script src="<?php echo base_url().'assets/js/dropify.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();

                $('.dropify').dropify({ //overate input type file
                    messages: {
                        default: 'Photo',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                //Show Modal Add New
                $('#btn-add-new').on('click',function(){ 
                    $('#ModalAddNew').modal('show');
                });

                //Show Modal Update Kategori
                $('.btn-edit').on('click',function(){
                    var kategori_id=$(this).data('id');
                    var kategori_nama=$(this).data('kategori');
                    $('#ModalUpdate').modal('show');
                    $('[name="xkode"]').val(kategori_id);
                    $('[name="xkategori2"]').val(kategori_nama);
                });

                //Show Konfirmasi modal hapus record
                $('.btn-hapus').on('click',function(){
                    var kategori_id=$(this).data('id');
                    $('#Modalhapus').modal('show');
                    $('[name="kode"]').val(kategori_id);
                });  

            });
        </script>

        <?php if($this->session->flashdata('msg')=='error'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password dan Confirm Password yang Anda masukan tidak sama.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='warning'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Warning',
                        text: "Gambar yang Anda masukan terlalu besar.",
                        showHideTransition: 'slide',
                        icon: 'warning',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FFC017'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Pengguna Berhasil disimpan ke database.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Info',
                        text: "Pengguna berhasil di update",
                        showHideTransition: 'slide',
                        icon: 'info',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#00C9E6'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Pengguna Berhasil dihapus.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
            <script type="text/javascript">
                    $('#ModalResetPassword').modal('show');
            </script>
        <?php else:?>

        <?php endif;?>

    </body>
</html>