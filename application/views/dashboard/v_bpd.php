<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Halaman data BPD</h3>
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
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="<?php echo base_url().'dashboard/tambah_bpd'; ?>"class="btn btn-sm btn-primary">Tambah Bpd</a>
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama</th>
                          <th>Gender</th>
                          <th>Jabatan</th>
                          <th>Kontak</th>
                          <th width="7%">Opsi</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php 
                        $no = 1;
                        foreach($bpd as $a){ ?>
                        <tr>
                          <td width="1%"><?php echo $no++; ?></td>
                          <td><?php echo $a->nama;?></td>
                          <td><?php echo $a->gender;?></td>
                          <td><?php echo $a->jabatan;?></td>
                          <td><?php echo $a->kontak;?></td>
                          <td>
                                <a href="<?php echo base_url().'dashboard/bpd_edit/'.$a->id_bpd; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                                <a href="<?php echo base_url().'dashboard/bpd_hapus/'.$a->id_bpd; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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