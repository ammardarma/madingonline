<?php include ('./application/views/header.php')?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class=" container mt-5" style="font-family:Open sans">

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h1 class="fw-semibold">Judul</h1>
                </div>
                <div class="col mx-3 text-end" id="HapusArtikel">
                        <button class="btn" >
                        <i class="fa-solid fa-circle-xmark fa-2xl" style="color: #000000;"></i>
                        </button>
                </div>

            </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor maiores saepe adipisci voluptatum libero in accusantium id voluptas aspernatur! Deleniti possimus modi nihil aut adipisci velit, atque laborum quaerat. Quaerat?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus minima repellat ipsam eveniet quam! Dignissimos molestias magnam delectus debitis eum doloremque totam dicta sint ipsam a, voluptatibus ducimus aut distinctio nemo, beatae commodi unde voluptatem cumque laudantium odit. Dolores architecto minima sunt rerum quasi velit deleniti, amet ipsum autem consequuntur veritatis laudantium ratione earum nisi. Id saepe debitis nesciunt totam necessitatibus fuga aut beatae dolores dolore velit, voluptate minima sapiente soluta perspiciatis quasi. Ab maiores laborum, aliquam animi eum accusantium excepturi blanditiis quasi. Quidem doloremque in reprehenderit veritatis saepe deleniti, tenetur et quae quibusdam, suscipit non illo dolorem voluptate velit.
        </div>
        
        <div class="col mx-3">
            <div class="row card">
                <div class="card-body" style="height: 400px;">
                    <img src="http://localhost/madingonline/asset/logo.png" alt="" class="d-inline-block align-text-top rounded w-100 h-100"> 
                </div>
            </div>
            <div class="row mt-4 my-3 card border border-2 border-dark" style="border-radius:1rem">
                <div class="mt-1 fw-bold text-end">
                    Isi Komentar
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="mt-2 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="addon-wrapping">
                        </div>
                        <div class="mt-2 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping">
                        </div>
                        <div class="mt-2 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Komentar" aria-label="Komentar" aria-describedby="addon-wrapping">
                        </div>
                    </form>
                    
                </div> 
                <div class="d-grid gap-2 d-md-flex justify-content-md-end p-2 w-100">
                    <button class="btn btn-dark rounded-pill text-white me-md-2 w-25" type="button">Kirim</button>
                </div>    
            </div>            
        </div>
    </div>

    <div class="container-fluid mt-2 mx-4">
        <div class="row">
            <div class="card border border-dark border-2" style="border-radius:1rem">
                <div class=" fw-bold">
                    Komentar
                </div>
                <div class= "m-2 card border border-2 border-dark" style="border-radius:1rem">
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold mx-3 m-1">Ammar Ridwan</p>
                        </div>
                        <div class="col mx-3 text-end" data-bs-toggle="modal" data-bs-target="#ModalHapus">
                            <button class="btn">
                                <i class="fa-solid fa-circle-xmark" style="color: #000000;"></i>
                            </button>
                        </div>
                    </div>
                    <p class="mx-3">isi komentarnyaaaaaaaaaaaaaaaaaaa</p>
                </div>
                <div class= "m-3 card border border-2 border-dark" style="border-radius:1rem">
                    <p class="fw-bold mx-3 m-1">Ammar Ridwan</p>
                    <p class="mx-3">isi komentarnyaaaaaaaaaaaaaaaaaaa</p>
                </div>
                <div class= "m-3 card border border-2 border-dark" style="border-radius:1rem">
                    <p class="fw-bold mx-3 m-1">Ammar Ridwan</p>
                    <p class="mx-3">isi komentarnyaaaaaaaaaaaaaaaaaaa</p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- modal artikel-->

<div class="modal fade text-center justify-content-center" tabindex="-1" id="HapusArtikel"  data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        Hapus Artikel
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus artikel ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" style="border-radius:0.75rem">Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- javascript -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#HapusArtikel').on("click", function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
        });
    });
</script>