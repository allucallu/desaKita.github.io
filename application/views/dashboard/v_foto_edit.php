<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Galeri</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Foto</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php foreach($foto as $f){?>
                            <form class="" action="<?php echo base_url('dashboard/update_foto') ?>" method="post" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Deskripsi<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                            <input type="hidden" 
name="id" value="<?php echo $f->id_foto; ?>">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="deskripsi" value="<?php echo $f->deskripsi;?>" required="required" />
                                        </div>
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Foto<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="file"  required="required" name='foto'></input>
                                                <br/>
                                                    <?php 
                                                    if(isset($gambar_error)){
                                                    echo $gambar_error;
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div><br><br><br><br><br><br><br>
                                    <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-2 ">
                                                    
                                                    <input type='submit' name="status" value="Publish" class="btn btn-success btn-block"></input>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </form>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>