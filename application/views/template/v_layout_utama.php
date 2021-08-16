<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $judul_tab;?></title>

    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/');?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/');?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/');?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/');?>plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- Bootstrap Select Css -->
    <link href="<?= base_url('assets/');?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?= base_url('assets/');?>css/style.css" rel="stylesheet">

    <link href="<?= base_url('assets/');?>plugins/morrisjs/morris.css" rel="stylesheet" />


    <link href="<?= base_url('assets/');?>css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?= base_url('assets/');?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="<?= base_url('assets/');?>plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Multi Select Css -->
    <link href="<?= base_url('assets/');?>plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Multi Select Css -->
</head>

<body class="theme-red">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>

    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <input type="hidden" id='base_url' value="<?= base_url()?>">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="widgets/index.html">Sistem Informasi Raport</a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= $this->M_1Settings->getGambar('user.png');?>" width="48" height="48" alt="User" />
                    
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("nama_user"); ?></div>
                    <!-- <div class="email">john.doe@example.com</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li> -->
                            <!-- <li role="seperator" class="divider"></li> -->
                            <?php if($this->session->userdata("hak_akses")=='admin' || $this->session->userdata("hak_akses")=='guru' ){ ?>
                            <li><a href="<?= base_url().$this->session->userdata("hak_akses");?>/page/profil"><i class="material-icons">people</i>Profil</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url();?>auth/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?= base_url().$this->session->userdata("hak_akses");?>">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata("hak_akses")=='admin'){ ?>

                    <li>
                        <a href="javascript:void(0);" class='menu-toggle'>
                            <i class="material-icons">people</i>
                            <span>Pengguna</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>admin/index/0"><span>Admin</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>siswa/index/0"><span>Siswa</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>guru/index/0"><span>Guru</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class='menu-toggle'>
                            <i class="material-icons">menu</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>ta/index/0"><span>Tahun Ajaran</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>program_keahlian/index/0"><span>Program Keahlian</span></a>
                            </li>
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>mapel/index/0"><span>Mata Pelajaran</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class='menu-toggle'>
                            <i class="material-icons">menu</i>
                            <span>Olah Data</span>
                        </a>
                        <ul class="ml-menu">
                         <li>
                            <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>kelas/index/0"><span>Kelas</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>guru_mapel/index/0"><span>Guru Mapel</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>kelas_Tahunan/index/0"><span>Kelas Tahunan</span></a>
                        </li>

                    </ul>
                </li>
                <?php }elseif($this->session->userdata("hak_akses")=='guru'){
                    ?>
                    <li>
                        <a href="javascript:void(0);" class='menu-toggle'>
                            <i class="material-icons">menu</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>guru_mapel/index/0" >
                                    <i class="material-icons">list</i>
                                    <span>Mata Pelajaran</span>
                                </a>
                            </li>
                            <?php
                            foreach ($menu_wali as $menu_wali) {
                                ?>
                                <li>
                                    <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>kelas_tahunan/index/<?= $menu_wali['id_kelas_tahunan']?>">
                                        <i class="material-icons">person</i>
                                        <span><?= $menu_wali['nama_kelas']?> (Wali Kelas)</span>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php foreach ($menu_mapel as $menu_mapel) {
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">people</i>
                                    <span><?= $menu_mapel['nama_kelas']?> (Guru <?= $menu_mapel['nama_mapel']?>)</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>nilai_semester/index/<?= $menu_mapel['id_guru_mapel']?>"><span>Nilai</span></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>presensi/index/<?= $menu_mapel['id_kelas_tahunan']?>/0"><span>Presensi</span></a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>

                            <?php } elseif($this->session->userdata("hak_akses")=='siswa'){
                                ?>
                                <li>
                                    <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>presensi" >
                                        <i class="material-icons">menu</i>
                                        <span>Presensi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>nilai_semester" >
                                        <i class="material-icons">menu</i>
                                        <span>Nilai</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- #Menu -->
                        <!-- Footer -->
                        <div class="legal">
                            <div class="copyright">
                                &copy; 2021-Aug <a href="javascript:void(0);">-YD-</a>.

                            </div>
                            <div class="version">
                                <b>Version: </b> <font id='timer'></font>
                            </div>
                        </div>
                        <!-- #Footer -->
                    </aside>
                    <!-- #END# Left Sidebar -->
                    <!-- Right Sidebar -->

                    <!-- #END# Right Sidebar -->
                </section>

                <?php
                if (! empty ($isi)){
                    echo $isi;
                }
                ?>

                <!-- Bootstrap Core Js -->
                <script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
                <script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.js"></script>

                <!-- Select Plugin Js -->
                <script src="<?= base_url('assets/');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
                <!-- Multi Select Plugin Js -->
                <script src="<?= base_url('assets/');?>plugins/multi-select/js/jquery.multi-select.js"></script>

                <!-- Slimscroll Plugin Js -->
                <script src="<?= base_url('assets/');?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

                <!-- Waves Effect Plugin Js -->
                <script src="<?= base_url('assets/');?>plugins/node-waves/waves.js"></script>
                <script src="<?= base_url('assets/');?>js/style.js"></script>


                <!-- Jquery DataTable Plugin Js -->
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/jquery.dataTables.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
                <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>



                <script src="<?= base_url('assets/');?>js/pages/tables/jquery-datatable.js"></script>

                <script src="<?= base_url('assets/');?>plugins/ckeditor/ckeditor.js"></script>
                <script src="<?= base_url('assets/');?>plugins/tinymce/tinymce.js"></script>
                <!-- Custom Js -->
                <script src="<?= base_url('assets/');?>js/admin.js"></script>
                <script src="<?= base_url('assets/');?>js/pages/forms/editors.js"></script>
                <script src="<?= base_url('assets/');?>chart/chart.js"></script>
                <!-- TinyMCE -->
                <!-- Demo Js -->
                <script src="<?= base_url('assets/');?>js/demo.js"></script>

                <script src="<?= base_url('assets/');?>js/pages/ui/tooltips-popovers.js"></script>
            </body>

            </html>