<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profil Desa</h3>
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
                    <h2>Profil</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?php echo base_url().'dashboard/tambah_visimisi'; ?>"class="btn btn-sm btn-primary">Tambah Visi & Misi</a>
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Visi</th>
                          <th>Misi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php 
                        
                        foreach($visi as $v){ 
                        ?>
                        <tr>
                          <td><?php echo $v->visi ?></td>
                          <td><?php echo $v->misi;?></td>
                          <td>
                                <a href="<?php echo base_url().'dashboard/visimisi_edit/'.$v->id_visimisi; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                <a href="<?php echo base_url().'dashboard/visimisi_hapus/'.$v->id_visimisi; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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