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
                    <a href="<?php echo base_url().'dashboard/tambah_profil'; ?>"class="btn btn-sm btn-primary">Tambah Profil</a>
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th style="text-align: center;">Profil</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php 
                        $no = 1;
                        foreach($profil as $a){ 
                        ?>
                        <tr>
                          <td width="1%"><?php echo $no++; ?></td>
                          <td><?php echo $a->profil;?></td>
                          <td><img 
width="50%" class="img-responsive" src="<?php echo base_url().'/gambar/website/'.$a->foto; 
?>"></td>
                          <td>
                                <a href="<?php echo base_url().'dashboard/profil_edit/'.$a->id_profil; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                <a href="<?php echo base_url().'dashboard/profil_hapus/'.$a->id_profil; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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