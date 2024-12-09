<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Bank Sampah BLM Mekar Laha</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Bank Sampah" name="Bank-Sampah" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="img/logo/favicon.ico">

    
    <!-- dark layout js -->
    <script src="assets/js/pages/layout.js"></script>

    <!-- Sweet Alert-->
    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- simplebar css -->
    <link href="assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- BACKGROUND PATEN HALAMAN LOGIN -->
    <div class="container-fluid authentication-bg overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <!-- LOGO DARK DAN LIGHT -->
                            <a href="login.php" class="logo-dark">
                                <img src="img/logo/logo-dark.png" alt="" height="160" class="auth-logo logo-dark mx-auto">
                            </a>
                            <a href="index.html" class="logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                            </a>
                            

                            <h4 class="mt-4">Welcome Back !</h4>
                            <p class="text-muted">Sign in to continue to Bank Sampah-BLM.</p>
                        </div>

                         <!-- CEK PROSES LOGIN -->
                            <?php 
                              require_once'z_config/Koneksi.php';
                              if (isset($_POST['nik'])){

                                  $user = $_POST['nik'];
                                  $pass = md5($_POST['pass']);
                                  //cek
                                  $cek = mysqli_query($con,"SELECT * FROM tb_pengurus WHERE nik ='$user' AND pass ='$pass'");
                                  $r = mysqli_fetch_array($cek, MYSQLI_NUM);
                                  $jml = mysqli_num_rows($cek);
                                  
                                    if ($jml==1 && $r[9]=='Ya'){
                                      
                                        session_start();
                                        $_SESSION['nik'] = $r[0];
                                        $_SESSION['Jabatan'] = $r[5];
                                        // $nik = $_SESSION ['nik'];
                                        // $Jabatan = $_SESSION ['Jabatan'];

                                        echo "
                                          <script>
                                              Swal.fire({
                                              icon: 'success',
                                              title: 'Login Berhasil',
                                              showConfirmButton: false,
                                              timer: 1500
                                            })
                                          </script>
                                        ";
                                        echo "<meta http-equiv='refresh' content='1; url=admin.php'>";
                                    }
                                    else if($jml==1 && $r[9] =='Tidak' ){
                                     echo "

                                        <script>
                                              Swal.fire({
                                              icon: 'error',
                                              title: 'Kamu Tidak Mempunyai Hak Akses Sistem',
                                              text: 'Silahkan Hubungi Pihak Admin!',
                                              showConfirmButton: true,
                                            })
                                          </script>
                                        ";
                                    }
                                     else {
                                     echo "
                                         <script>
                                              Swal.fire({
                                              icon: 'Warning',
                                              title: 'Username Dan Password Salah',
                                              text: 'Periksa Kembali Username Dan Password Anda!',
                                              showConfirmButton: true,
                                              timer: 3000
                                            })
                                          </script>
                                        ";
                                        echo "<meta http-equiv='refresh' content='1; url=login.php'>";
                                  } 
                                   
                                }
                            ?>
                        <!-- END CEK PROSES LOGIN -->
                        <div class="p-2 mt-5">
                            <form action="" method="POST">
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text" name="nik" class="form-control" placeholder="Masukan Username..." aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" name="pass" class="form-control" id="userpassword" placeholder="Masukan Password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="pt-3 text-center">
                                    <button class="btn btn-primary w-xl waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </form>

                            <div class="mt-3 text-center">
                                <a href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#lupa-pass"><i class="mdi mdi-lock me-1"></i> Lupa Password?</a>
                            </div>
                           
                        </div>

                        <div class="mt-5 text-center">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script> BLM. Crafted with <i class="mdi mdi-heart text-danger"></i> by Bank Sampah BLM 
                            </p>
                        </div>
                    </div>

                    <!-- STAR MODAL LUPA PASSWORD-->
                         <div class="modal fade" id="lupa-pass">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Data!</h5><button type="button" class="btn btn-sm btn-label-danger btn-icon" data-bs-dismiss="modal"><i class="mdi mdi-close"></i></button>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="Cek_Data_Pass.php" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="d-grid gap-3">
                                                <div class="row">
                                                    <div class="col-sm-4 col-lg-3">
                                                        <label class="col-form-label" for="nik">NIK</label>
                                                    </div>
                                                    <div class="col-sm-4 col-lg-8">
                                                        <input type="text" id="nik" class="form-control" name="PassLama" placeholder="Masukan NIK Anda" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-lg-3">
                                                        <label class="col-form-label" for="Tem_L">Password Baru</label>
                                                    </div>
                                                    <div class="col-sm-4 col-lg-8">
                                                        <input type="password" class="form-control"  name="PassBaru" placeholder="Masukan Password Baru" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-lg-3">
                                                        <label class="col-form-label" for="Tem_L">Ulangi Pass Baru</label>
                                                    </div>
                                                    <div class="col-sm-4 col-lg-8">
                                                        <input type="Password" class="form-control" name="PassUlang" placeholder="Masukan Ulang Password Baru" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Cek Data</button> 
                                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- END MODAL LUPA PASSWORD-->
                    

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>