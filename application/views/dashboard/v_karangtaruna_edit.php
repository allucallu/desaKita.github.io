<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit karangtaruna</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php foreach($karangtaruna as $t){ ?>
                                    <form class="" action="<?php echo base_url('dashboard/karangtaruna_update') ?>" enctype="multipart/form-data" method="post" novalidate>
                                        
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="hidden"
                                                name="id" value="<?php echo $t->id_karangtaruna; ?>">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="ex. John f. Kennedy" value="<?php echo $t->nama; ?>" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jabatan<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                                <select class="form-control" data-validate-length-range="6" data-validate-words="2" name="jabatan" required="required">
                                                    <option value="">-Pilih Jabatan-</option>
                                                <?php foreach($seksi as $s){ ?>
                                                    <option <?php if($t->jabatan == $s->id_seksi){echo "selected='selected'";} ?> value="<?php echo $s->id_seksi 
                                                    ?>"><?php echo $s->bidang; ?></option>
                                                <?php } ?>
                                                </select>
                                                </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kontak<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="email" class='email' name="kontak" data-validate-linked='email' value="<?php echo $t->kontak; ?>" required='required' />
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary btn-sm">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                           </div>
                       </div>
              </div>
         </div>
    </div>
 </div>