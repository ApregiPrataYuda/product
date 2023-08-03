
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
        <h3><span class="badge badge-secondary"><?= $title ?></span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a class="text-secondary" href="<?= site_url('') ?>"><span class="badge badge-outline-secondary">Kembali</span></a></li> -->
          <!-- <li class="breadcrumb-item"><span class="badge badge-secondary">Master Class Form</span></a></li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('pesan') ?>">
      <div id="flasherr" data-flasherr="<?= $this->session->flashdata('error') ?>">
        <!-- Default box -->
        <div class="card">
        <div class="card-header" style="background-color:RGB(105, 105, 105);">
            <h3 class="card-title text-light"></h3>
             
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="card">
              <div class="card-header">
                <span class="badge badge-secondary"><?= $title?></span>
                <div class="container my-5">
		           <div class="row">
			     <div class="col-md-12">
				
                 <form action="" method="post">
                <div class="row">
                <div class="col-md-4  mt-2 <?= form_error('name') ? '' : null ?>">
                    <label for="name"><span> Name Category *</span> </label>
                    <input type="hidden" value="<?= $row->id ?>" name="id">
                    <input type="text" class="form-control" value="<?= $row->name ?>" name="name" id="name" placeholder=" Name  ...">
                    <small  class="form-text text-muted"><?= form_error('name') ?></small>
                </div>

                <div class="col-md-4  mt-2 <?= form_error('price') ? '' : null ?>">
                    <label for="price"><span> Price *</span> </label>
                    <input type="text" class="form-control" value="<?= $row->price ?>" name="price" id="price" placeholder=" price ...">
                    <small  class="form-text text-muted"><?= form_error('price') ?></small>
                </div>


                <div class="col-md-4  mt-2 <?= form_error('id_category') ? '' : null ?>">
                    <label for="id_category"><span>  Category *</span> </label>
                <select name="id_category" id="id_category" class="form-control">
                    <option value="">-Pilih-</option>
                 <?php foreach ($datax->result() as $key => $value) { ?>
                  <option value="<?= $value->id_category ?>" <?=$value->id_category == $row->id_category ? "selected" : null?>><?= $value->name_category ?></option>
                <?php  }?>
                </select>
                    <small  class="form-text text-muted"><?= form_error('id_category') ?></small>
                </div>


                </div>

				<div class="row ml-auto mb-3 mr-5 mt-3">
                <button type="submit" name="<?= $page?>" class="btn btn-outline-info btn-sm ml-2"> <i class="fa fa-save"></i><?= $page?></button>
                <button type="reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-spinner"></i>  reset</button>
                </div>
            </form>
            </div>
        </div>
  </section>
