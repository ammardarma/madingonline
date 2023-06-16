<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MADING ONLINE</title>
        <!-- Favicon-->
       
        <link rel="icon" type="image/x-icon" href="<?= base_url('asset/assets/favicon.ico');?>"/>
        <!-- Font Awesome icons (free version)-->
        <script src='https://use.fontawesome.com/releases/v6.3.0/js/all.js' crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <style>
            body, header{
                font-family: "Open Sans";
                text-size-adjust: 100%;
                
            }

            .tdark {
                color: #333;
            }

            .tdark-bold {
                color: #333;
                font-weight: bold;
            }

            .tdark-p {
                color: #333;
                font-weight: normal;
                white-space: pre-wrap;
                font-family: "Open Sans";
                font-size: 18px;
                font-weight: normal;
                text-decoration: none;
                line-height: 24px;
            }
            
            .bg-page {
                background-image: url("http://localhost/madingonline/asset/logo.png");
                opacity: 0.1;
            }
        </style>
    </head>
   <!-- Navigation-->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="http://localhost/madingonline/asset/logo.png" alt="" width="50" height="50" class="d-inline-block align-text-top ms-4 rounded">
            </a>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-5">
                        <a class="nav-link text-white fw-bold" href="#">Article</a>
                    </li>
                    <li class="nav-item me-5">
                        <?php if($id != null){
                            ?>
                            <a class="nav-link text-white fw-bold logout" href="#">Logout</a>
                       <?php }
                       else{
                            ?>
                            <a class="nav-link text-white fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
    
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-dark rounded-3">
          <div class="modal-body">
            <form class="formLogin" method='post' action='<?=base_url()?>home/login'>
            <div class="mb-4 tdark-bold text-center mt-3" style='font-size:26px;'>
                Login Admin
            </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label tdark-bold" style='font-size:18px;'>Email</label>
                <input type="text" class="form-control form-control-lg rounded" name="email" id="email" required />
              </div>
              <div class="mb-4">
                <label for="recipient-name" class="col-form-label tdark-bold" style='font-size:18px;'>Password</label>
                <input type="password" class="form-control form-control-lg rounded" name="password" id="password" required />
              </div>
              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-dark tdark-bold text-white w-75 rounded-pill btnLogin" style="height:48px;">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.logout').on('click', function() {
            Swal.fire({
                icon:'warning',
            text: 'Anda ingin keluar?',
            showCancelButton: true,
            confirmButtonText: 'Ya, Keluar',
            confirmButtonColor: '#333',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire({
                                icon: 'success',
                                text: 'Berhasil Logout!',
                                showConfirmButton: false,
                                timer: 1500
                                }).then(function () {
                                    location.href="<?=base_url()?>home/logout";
                                });
            }
            });
return false;
        });

        $('.btnLogin').on('click', function () {
            if($('.formLogin')[0].checkValidity()){
                        var email = $('#email').val();
                        var password = $('#password').val();

                        var fd = new FormData();
                        fd.append('email', email);
                        fd.append('password', password);
                        $.ajax({	
							url: "<?=base_url()?>home/login",
							type: 'post',
							data:fd,
							processData:false,
							contentType:false,
                            async:false,
							success: function (data) {
                                console.log(data);
                                if(data == "true"){
                                   
                                    Swal.fire({
                                    text: "Username atau password salah!",
                                    icon: 'warning',
                                    
                                    confirmButtonColor: '#333',
                                    cancelButtonColor: '#d33',
                                    });
                                }else {    
                                $('#login').modal('hide');                                 
                                Swal.fire({
                                icon: 'success',
                                text: 'Berhasil Login!',
                                showConfirmButton: false,
                                timer: 1500
                                }).then(function () {
                                    location.reload();
                                });
                                }
							},
						error: function(error){
							console.log(error);
                            return false;
						}
					});
                }else{
                    Swal.fire({
                    title: 'Authentication',
                    text: "Username dan password tidak boleh kosong!",
                    icon: 'warning',
                    
                    confirmButtonColor: '#333',
                    cancelButtonColor: '#d33',
                    });
                }
                return false;
        });
    });
</script>