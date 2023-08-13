<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Aparat Desa</h3>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Aparat </h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php foreach($aparat as $a){ ?>
                                    <form class="" action="<?php echo base_url('dashboard/aparat_update') ?>" enctype="multipart/form-data" method="post" novalidate>
                                        
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="hidden" 
name="id" value="<?php echo $a->id_aparat; ?>">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nama" value="<?php echo $a->nama; ?>" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jabatan<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="jabatan" data-validate-length-range="5,15" type="text" value="<?php echo $a->jabatan; ?>"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Foto<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="foto" class='email' required="required" type="file" /></div>
                                                <?php 
if(isset($gambar_error)){
echo $gambar_error;
}
?>
<?php echo form_error('foto'); ?>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Kontak<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="email" class='email' name="kontak" data-validate-linked='email' value="<?php echo $a->kontak; ?>" required='required' /></div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
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