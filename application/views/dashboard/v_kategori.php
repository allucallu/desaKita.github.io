<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kategori <small>Artikel</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <a href="<?php echo base_url().'dashboard/tambah_kategori'; ?>"class="btn btn-sm btn-primary">Tambah Kategori</a>
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th>Kategori</th>
                          <th>Slug</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kategori as $k){ ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $k->kategori; ?></td>
                          <td><?php echo $k->slug; ?></td>
                          <td>
                            <a href="<?php echo base_url().'dashboard/kategori_edit/'.$k->id_kategori; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                            <a href="<?php echo base_url().'dashboard/kategori_hapus/'.$k->id_kategori; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>