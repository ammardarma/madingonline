<?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success alert-dismissible">
                <div class="row">
                    <div class="col-12 text-start">
                        <button type="button" class="btn btn-danger" data-dismiss="alert" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
                <div class="row text-center">
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                </div>
                <div class="row text-center">
                    <div class="col-12 text-center">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
              </div>
              <?php } ?>
              <?php if ($this->session->flashdata('error')) { ?>
              <div class="alert alert-danger alert-dismissible">
              <div class="row">
                    <div class="col-12 text-start">
                        <button type="button" class="btn btn-danger" data-dismiss="alert" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
                <div class="row text-center">
                    <h4><i class="icon fa fa-check"></i> Error!</h4>
                </div>
                <div class="row text-center">
                    <div class="col-12 text-center">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                </div>
              </div>
              <?php } ?>

              <?php if ($this->session->flashdata('warning')) { ?>
              <div class="alert alert-warning alert-dismissible">
              <div class="row">
                    <div class="col-12 text-start">
                        <button type="button" class="btn btn-danger" data-dismiss="alert" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
                <div class="row text-center">
                    <h4><i class="icon fa fa-check"></i> Warning!</h4>
                </div>
                <div class="row text-center">
                    <div class="col-12 text-center">
                        <?php echo $this->session->flashdata('warning'); ?>
                    </div>
                </div>
              </div>
              <?php } ?>

			  <?php if ($this->session->flashdata('fielderror')) { ?>
				  <span style="color: red">
					  <?php echo $this->session->flashdata('fielderror'); ?>
				  </span>
			  <?php } ?>