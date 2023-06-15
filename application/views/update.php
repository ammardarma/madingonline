<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h6><?php echo validation_errors(); ?></h6>
<h6><?php echo $this->session->flashdata('error'); ?></h6>

<!-- Update Album Section-->
<section class="page-section portfolio mt-5" id="portfolio">
    <div class="container">
    <div class="row">
      <form action="<?php echo site_url('welcome/update/'.$post->id); ?>" method="post" enctype="multipart/form-data">
          <div class="row justify-content-center">
            <div class="col-12 text-center">
              <img class="img-fluid rounded mb-5 responsive-img" id="image" src="<?=site_url("upload/post/".$post->filename) ?>" style="width:250px; height:250px;"/>
            </div>
          </div>

          <div class="row justify-content-start mb-2">
            <div class="input-field col s12">
              <label for="name">Name</label>
              <input class="form-control" name="name" id="name" type="text" class="validate" value="<?php echo $post->name; ?>">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description" ><?php echo $post->description; ?></textarea>
            </div>
          </div>
          <div class="file-field input-field mt-2 mb-2">
            <div class="row light-blue darken-4">
              <span>Select File</span>
            </div>              
          </div>
          <div class="row">
              <div class="col-6">
                <input name="image" class="form-control" type="file" id="file" accept=".jpg,.png,.jpeg" value="<?php echo $post->filename; ?>">
              </div>
              <div class="col-6">
                <input class="form-control" type="text" name="file" onchange="thumbnail();" value="<?php echo $post->filename; ?>"disabled>
              </div>
            </div>
          
          <div class="row justify-content-center mt-5">
            <div class="col-2">
              <button type="submit" class="btn btn-primary light-blue darken-4">Update</button>
            </div>
            <div class="col-2">
              <a type="delete" href="<?php echo site_url('welcome/delete/'.$post->id); ?>" class="btn btn-danger light-blue darken-4">delete</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</section>

<script type="text/javascript">
  var elem = document.querySelector('#description');
  M.textareaAutoResize(elem);

  function thumbnail () {
    var preview = document.querySelector('#image');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
</script>