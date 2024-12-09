
<!-- Logo -->

<!-- Start Navbar-Brand -->
<div class="navbar-logo-box">
    <a href="admin.php" class="logo logo-dark">
        <span class="logo-sm">
            <img src="img/logo/logo-sm.png" alt="logo-sm-dark" height="30">
        </span>
        <span class="logo-lg">
            <img src="img/logo/logo-dark2.png" alt="logo-dark" height="45">
        </span>
    </a>

    <a href="admin.php" class="logo logo-light">
        <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="logo-sm-light" height="20">
        </span>
        <span class="logo-lg">
            <img src="assets/images/logo-light.png" alt="logo-light" height="18">
        </span>
    </a>

    <button type="button" class="btn btn-sm top-icon sidebar-btn" id="sidebar-btn">
        <i class="mdi mdi-menu-open align-middle fs-19"></i>
    </button>
</div>
<!-- End navbar brand -->

<!-- Start menu -->
<div class="d-flex justify-content-between menu-sm px-3 ms-auto">
    <div class="d-flex align-items-center gap-2">
        <!-- <div class="dropdown d-none d-lg-block">
            <button type="button" class="btn btn-primary btn-sm fs-14 d-inline" data-bs-toggle="dropdown">
                Apps
                <i class="mdi mdi-chevron-down align-middle"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-start dropdown-menu-animated">
                <a href="#" class="dropdown-item">
                    <div class="dropdown-icon"><i class="fa fa-boxes"></i></div>
                    <span class="dropdown-content">Inventory Manager</span>
                    <div class="dropdown-addon"><span class="badge badge-warning rounded-pill">20</span></div>
                </a>
                <div class="dropdown-submenu">
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-icon"><i class="fa fa-project-diagram"></i></div>
                        <span class="dropdown-content">Project manager</span>
                        <div class="dropdown-addon"><i class="mdi mdi-chevron-right align-middle"></i></div>
                    </a>
                    <div class="dropdown-submenu-menu dropdown-submenu-end">
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Create project</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Delete project</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Ongoing project</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Completed project</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Urgent project</span></a>
                    </div>
                </div>
                <div class="dropdown-submenu">
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-icon"><i class="fa fa-tasks"></i></div>
                        <span class="dropdown-content">Task manager</span>
                        <div class="dropdown-addon"><i class="mdi mdi-chevron-right align-middle"></i></div>
                    </a>
                    <div class="dropdown-submenu-menu dropdown-submenu-end">
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Show task</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Assign task</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Assign member</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Completed task</span> </a>
                        <a href="#" class="dropdown-item"><i class="dropdown-bullet"></i> <span class="dropdown-content">Urgent task</span></a>
                    </div>
                </div>
                <a href="#" class="dropdown-item">
                    <div class="dropdown-icon"><i class="fa fa-dollar-sign"></i></div>
                    <span class="dropdown-content">Invoice</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="apps-contact.html" class="dropdown-item">
                    <div class="dropdown-icon"><i class="fa fa-user-cog"></i></div>
                    <span class="dropdown-content">My Account</span>
                </a>
            </div>
        </div> -->

        <div class="dropdown d-none d-lg-block">
            <button type="button" class="btn btn-primary btn-sm fs-14" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                Features
                <i class="mdi mdi-chevron-down align-middle"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-start dropdown-menu-lg-widest dropdown-menu-widest dropdown-menu-animated bg-primary-subtle overflow-hidden">
                <div class="dropdown-row justify-content-center">
                    <div class="p-2 menu-image">
                        <img src="assets/images/mega-menu.png" alt="mega-menu image" class="img-fluid" style="height: 200px;">
                    </div>
                    <?php 
                    require_once 'z_config/Koneksi.php';
                    $tampil = mysqli_query($con,"SELECT * FROM tb_tentang_kami");
                    $a = mysqli_fetch_array($tampil) ?>
                    <div class="dropdown-col">
                        <h4 class="">Visi & Misi</h4>

                        <p class="text-muted mb-0" align="justify">
                            <b>Visi :</b> <?=$a[3]?>
                        </p><br>
                        <p class="text-muted mb-0" align="justify">
                            <b>Misi :</b> <?=$a[4]?>
                        </p>
                        <div class="mt-3">
                            <a href="index.php" class="btn btn-dark btn-wider">Kunjungsi User</a>
                        </div>
                    </div>
                    <div class="dropdown-col border-start border-primary border-opacity-50">
                        <h4 class="dropdown-header">Features</h4>
                        <div class="grid-nav grid-nav-action">
                            <div class="grid-nav-row">
                                <a href="admin.php" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-window-restore"></i></div>
                                    <span class="grid-nav-content">Dashboard</span>
                                </a>
                                <a href="admin.php?page=Tabungan" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-clipboard"></i></div>
                                    <span class="grid-nav-content">Cek Timbangan</span>
                                </a>
                                <a href="https://wa.me/+6281240691238" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-question-circle"></i></div>
                                    <span class="grid-nav-content">Help Center</span>
                                </a>
                            </div>
                            <div class="grid-nav-row">
                                <a href="admin.php?page=Galeri" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-images"></i></div>
                                    <span class="grid-nav-content">Gallery</span>
                                </a>
                                <a href="admin.php?page=Laporan_Grafik" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-chart-bar"></i></div>
                                    <span class="grid-nav-content">Grafik Timbangan</span>
                               <!--  </a>
                                <a href="#" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-bookmark"></i></div>
                                    <span class="grid-nav-content">Docs</span> -->
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-col border-start border-primary border-opacity-50">
                        <h4 class="dropdown-header">Tools</h4>
                        <a href="admin.php?page=Pengurus" class="dropdown-item"><i class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i> <span class="dropdown-content">Pengurus BLM</span> </a>

                        <a href="admin.php?page=Nasabah" class="dropdown-item"><i class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i> <span class="dropdown-content">Nasabah</span> </a>

                        <a href="admin.php?page=Timbangan_Nasabah" class="dropdown-item"><i class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i> <span class="dropdown-content">Timbangan Nasabah</span> </a>

                        <a href="admin.php?page=Tabungan" class="dropdown-item"><i class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i> <span class="dropdown-content">Tabungan Nasabah</span> </a>

                        <a href="admin.php?page=Lap_Timbangan" class="dropdown-item"><i class="mdi mdi-checkbox-blank-circle align-middle dropdown-bullet me-2"></i> <span class="dropdown-content">Laporan Timbangan</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2">
        <!--Start App Search-->
             <style>
                @keyframes moveText {
                    0% {
                        transform: translateX(100%);
                    }
                    100% {
                        transform: translateX(-100%);
                    }
                }

                .text-container {
                    width: 300px; /* Tentukan lebar sesuai kebutuhan Anda */
                    overflow: hidden;
                    border-radius: 15px; /* Membuat border menjadi rounded */
                    
                }

                .position-relative {
                    display: inline-block;
                    white-space: nowrap;
                    animation: moveText 10s linear infinite;
                    color: green; /* Mengubah warna teks menjadi hijau */
                } h5{
                    color: green;
                }
            </style>
            <div class="text-container">
                <div class="position-relative">
                    <h5>Bank Sampah Bumi Lestari Maluku Mekar Laha</h5>
                </div>
            </div>

        <!-- End Notification -->

        <!-- Start Activities -->
        <!-- <div class="d-inline-block activities">
            <button type="button" class="btn btn-sm top-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-rightsidabar">
                <i class=" fas fa-calendar-alt align-middle"></i>
            </button>
        </div> -->
        <!-- End Activities -->

        <!-- Start Profile -->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm top-icon p-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded avatar-2xs p-0" src="img/Pengurus/<?=$r[10]?>" alt="Header Avatar">
            </button>
            <div class="dropdown-menu dropdown-menu-wide dropdown-menu-end dropdown-menu-animated overflow-hidden py-0">
                <div class="card border-0">
                    <div class="card-header bg-primary rounded-0">
                        <div class="rich-list-item w-100 p-0">
                            <div class="rich-list-prepend">
                                <div class="avatar avatar-label-light avatar-circle">
                                    <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                                </div>
                            </div>
                            <div class="rich-list-content">
                                <h3 class="rich-list-title text-white"><?=$r['nama']?></h3>
                                <span class="rich-list-subtitle text-white"><?=$r['jabatan']?></span>
                            </div>
                            <div class="rich-list-append"><span class="badge badge-label-light fs-6">6+</span></div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="grid-nav grid-nav-flush grid-nav-action grid-nav-no-rounded">
                            <div class="grid-nav-row">
                                <a href="admin.php?page=Pengurus_Detail&nik=<?=$r['nik']?>" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-address-card"></i></div>
                                    <span class="grid-nav-content">Profile</span>
                                </a>
                                <a href="admin.php?page=Galeri" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="fas fa-image"></i></div>
                                    <span class="grid-nav-content">Galeri</span>
                                </a>
                                <a href="#!" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-clone"></i></div>
                                    <span class="grid-nav-content">Activities</span>
                                </a>
                            </div>
                            <div class="grid-nav-row">
                                <a href="#!" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-calendar-check"></i></div>
                                    <span class="grid-nav-content">Tasks</span>
                                </a>
                                <a href="#!" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-sticky-note"></i></div>
                                    <span class="grid-nav-content">Notes</span>
                                </a>
                                <a href="#!" class="grid-nav-item">
                                    <div class="grid-nav-icon"><i class="far fa-bell"></i></div>
                                    <span class="grid-nav-content">Notification</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer card-footer-bordered rounded-0"><a href="logout.php" class="btn btn-label-danger">Sign out</a></div>
                </div>
            </div>
        </div>
        <!-- End Profile -->
    </div>
</div>
<!-- End menu -->