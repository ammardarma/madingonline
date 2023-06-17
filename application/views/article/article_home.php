<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row mt-3 mx-3">
    <div class= "col text-end d-flex justify-content-end align-items-center">
        <?php if($id != null){
            ?>
            <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#add">
                <i class="fa-solid fa-circle-plus fa-2xl mx-2"  style="color: #000000;"></i>
            </button>
            <?php
        }
        ?>
        <i class="fa-solid fa-magnifying-glass fa-2xl" style="color: #000000;"></i>
    </div>
</div>
<?php $this->load->view('templates/common', '') ?>
<div class="container mt-3">
    <div class="row mt-3 mb-5 text-center">
        <h3 class="fw-bold">
            ARTIKEL
        </h3>
    </div>
    <?php  if($article != null){
           $dataContent = explode(".", $article[0]['content']); 
        ?>
    <div class="container mb-5">
        <div class="row">
            <div class="col-6">
                <h4 class="fw-bold">
                    <?=$article[0]['judul']?>
                </h4>
                <p style="font-size: 16px; text-align:justify;">
                   <?=$dataContent[0] . '.' ?>
                </p>
                <a href="<?=base_url(). "home/article_detail/". $article[0]['id']?>" class="btn btn-sm w-25 btn-outline-secondary border-2 rounded-pill">Lihat Selengkapnya</a>

            </div>
            <div class="col-6 text-end">
                <img src="<?=base_url(). "upload/post/". $article[0]['image']?>" alt="" class="d-inline-block align-text-top rounded w-75 h-100 me-5">
            </div>
        </div>
        <?php if(count($article) > 1){
             $dataContent2 = explode(".", $article[1]['content']); 
            ?>
        <div class="row mt-5">
            <div class="col-6">
                <img src="<?=base_url(). "upload/post/". $article[1]['image']?>" alt="" class="d-inline-block align-text-top rounded w-75 h-100 me-5">
            </div>
        <div class="col-6">
                <h4 class="fw-bold"><?=$article[1]['judul']?></h4>
                <p style="font-size: 16px; text-align:justify;">
                    <?=$dataContent2[0] . '.'?>
                </p>
                <a href="<?=base_url(). "home/article_detail/". $article[1]['id']?>" class="btn btn-sm w-25 btn-outline-secondary border-2 rounded-pill">Lihat Selengkapnya</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
    }
    ?>

    <div class="scroll mt-5 mb-5">
        <div class="row flex-nowrap overflow-auto mt-5 justify-content-center">
            <?php for($i=0; $i <count($article); $i++): ?>
                <?php
                $data = explode(".", $article[$i]['content']); 
                ?>
            <div class="col-3">
                <div class="card border-0" style="width: 18rem;">
                <img src="<?=base_url(). "upload/post/". $article[$i]['image']?>" alt="" class="d-inline-block align-text-top rounded w-100 h-70 me-5 text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?=$article[$i]['judul']?></h5>
                        <p class="card-text" style="font-size: 16px; text-align:justify;"><?=$data[0]?>.</p>
                        <a href="<?=base_url(). "home/article_detail/". $article[$i]['id']?>" class="btn btn-sm w-15 btn-outline-secondary border-2 rounded-pill">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <?php endfor;?>
        </div>
    </div>
</div>
<!-- Modal Add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="login" aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content border border-dark rounded-3">
          <div class="modal-body">
            <form class="formInput" enctype="multipart/form-data" method='post' action='<?=base_url()?>home/inputArticle'>
            <div class="mb-4 tdark-bold text-center mt-3" style='font-size:26px;'>
                Tambah Artikel
            </div>
            <div class="mb-3">
                <label for="Judul" class="col-form-label tdark-bold" style='font-size:18px;'>Judul Artikel</label>
                <input type="text" class="form-control form-control-lg rounded" name="judul" id="judul" required />
              </div>
              <div class="mb-4">
                  <label for="Konten" class="col-form-label tdark-bold" style='font-size:18px;'>Konten Artikel</label>
                  <textarea class="form-control" name="konten" id="konten" rows="8" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="Image" class="col-form-label tdark-bold" style='font-size:18px;'>Gambar Artikel</label>
                  <input type="file" accept=".jpg,.png,.jpeg" class="form-control form-control-lg rounded" name="image" id="image" />
                </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end p-2 w-100">
                    <button class="btn btn-dark btn-sm rounded-pill text-white" style="width:100px;" type="submit">Tambah</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
