
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  
    
    <!-- Main content -->
    <section class="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('pesan') ?>">
      <div id="flasherr" data-flasherr="<?= $this->session->flashdata('error') ?>">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title"><?= $title ?></h3> -->
         
    <a href="<?= site_url('Product/Add')?>" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                <table class="table table-bordered" id="tabelPublic">
                  <thead>
                    <tr>
                      <th style="width: 5px">#</th>
                      <th>Name</th>
                      <th>kategori</th>
                      <th>price</th>
                      <th style="width: 5px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($row->result() as $key => $value) { ?>
                  <tr>
                    <td><?= $key+1;?>.</td>
                    <td><?= $value->name?></td>
                    <td><?= $value->name_category?></td>
                    <td><?= $value->price?></td>
                    <td>
                      <a href="<?= base_url('Product/update/'.$value->id) ?>" class="btn btn-warning btn-xs"> <i class="fa fa-recycle"></i></a>
                      <a href="<?= base_url('Product/delete/'.$value->id) ?>" id="btn-hapus" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                   </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
