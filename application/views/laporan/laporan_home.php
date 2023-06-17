<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class=" container-fluid mt-3">
<div class="row mt-3 mb-3 text-center">
        <h3 class="fw-bold">
            Laporan
        </h3>
    </div>

    <div class="container-fluid mt-2 mb-5">
        <div class="row">
            <div class="card border border-dark border-2" style="border-radius:1rem">
                <div class="card-body">
                <?php if($article != null){?>
                    <?php for($i=0; $i <count($article); $i++): ?>
                    <div class= "my-3 card border border-2 border-dark" style="border-radius:1rem">
                        <div class="card-header bg-white" style="border-radius:1rem">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <p class="fw-bold mt-2"><?=$article[$i]['judul']?></p>
                                </div>
                                <div class="col text-end" data-bs-toggle="modal" data-bs-target="#HapusArtikel">
                                    <button class="btn">
                                        <i class="fa-solid fa-circle-xmark" style="color: #000000;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $dataCount = 0;?>
                        <?php foreach($komentar as $data){
                            if ($data['artikel_id']== $article[$i]['id']){
                                $dataCount = $dataCount+1;
                                }
                        }
                        ?>
                        <p class="mx-3 mt-2" style="font-size: 14px; text-align:justify;">Komentar (<?=$dataCount?>)</p>
                    </div>
            <?php endfor;?>

                    <?php } ?>
                    </div>
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