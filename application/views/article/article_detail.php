<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('templates/common', '') ?>
<div class=" container mt-5 ">
    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <div class="col">
                    <h1 class="fw-semibold"><?=$article[0]['judul']?></h1>
                </div>
                <?php if($id != null){ ?>
                <div class="col mx-3 text-end" id="HapusArtikel">
                        <button class="btn" >
                        <i class="fa-solid fa-circle-xmark fa-2xl" style="color: #000000;"></i>
                        </button>
                </div>
                <?php } ?>
            </div>
        <p class="me-4" style="font-size: 14px; text-align:justify;">
        <?=$article[0]['content']?>
        </div>
        
        <div class="col mx-3">
            <div class="row card">
                <div class="card-body" style="height: 400px;">
                    <img src="<?=base_url(). "upload/post/". $article[0]['image']?>" alt="" class="d-inline-block align-text-top rounded w-100 h-100"> 
                </div>
            </div>
            <div class="row mt-3 mb-5 card border border-2 border-dark" style="border-radius:1rem">
                <div class="mt-2 ms-1 fw-bold">
                    Isi Komentar
                </div>
                <div class="card-body">
                    <form method='post' action="<?=base_url()?>home/inputKomentar">
                        <div class="mt-2 input-group flex-nowrap">
                        <input type="hidden" class="form-control" name='id' placeholder="Id" aria-label="Id" aria-describedby="addon-wrapping" value="<?=$article[0]['id']?>" />
                            <input type="text" class="form-control" name='nama' placeholder="Nama" aria-label="Nama" aria-describedby="addon-wrapping">
                        </div>
                        <div class="mt-2 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Email" name='email' aria-label="Email" aria-describedby="addon-wrapping">
                        </div>
                        <div class="mt-2 input-group flex-nowrap">
                        <textarea class="form-control" placeholder="Komentar" name="komentar" id="komentar" rows="8" required></textarea>
                        </div>
                        
                    </div> 
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end p-2 w-100">
                        <button class="btn btn-dark rounded-pill text-white me-md-2 w-25" type="submit">Kirim</button>
                    </div>    
                </form>
            </div>            
        </div>
    </div>

    <div class="container-fluid mt-2 mb-5">
        <div class="row">
            <div class="card border border-dark border-2" style="border-radius:1rem">
                <div class="card-header bg-white fw-bold">     
                        Komentar      
                </div>
                <div class="card-body">
                    <?php 
                    foreach($komentar as $data): ?>
                    <div class= "my-3 card border border-2 border-dark" style="border-radius:1rem">
                        <div class="card-header bg-white" style="border-radius:1rem">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <p class="fw-bold mt-2"><?=$data['nama']?> (<?=$data['email']?>)</p>
                                </div>
                                <?php if($id != null){ ?><div class="col text-end">
                                    
                                    <a href="<?=base_url(). "home/hapusKomentar/" . $data['id'] . '/'  . $article[0]['id'] ?>" class="btn">
                                        <i class="fa-solid fa-circle-xmark" style="color: #000000;"></i>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <p class="mx-3 mt-2" style="font-size: 14px; text-align:justify;"><?=$data['isi']?></p>
                    </div>
                    <?php endforeach; ?>
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
                    ).then(function () {
                        location.href="<?=base_url(). 'home/hapusArticle/' . $article[0]['id'] ?>";
                    });
                }
                })
        });
    });
</script>