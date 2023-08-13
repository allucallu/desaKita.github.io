<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Galeri</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Foto</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?php echo base_url().'dashboard/tambah_foto'; ?>"class="btn btn-sm btn-primary">Tambah Foto</a>
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th>Tanggal</th>
                          <th>Deskripsi</th>
                          <th width="25%">Foto</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php 
                        $no = 1;
                        foreach($foto as $f){ ?>
                        <tr>
                          <td width="1%"><?php echo $no++; ?></td>
                          <td><?php echo $f->tanggal;?></td>
                          <td><?php echo $f->deskripsi;?></td>
                          <td><img width="50%" class="img-responsive" src="<?php echo base_url().'/gambar/foto/'.$f->foto; ?>"></td>
                          <td>
                                <a href="<?php echo base_url().'dashboard/foto_edit/'.$f->id_foto; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                <a href="<?php echo base_url().'dashboard/foto_hapus/'.$f->id_foto; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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