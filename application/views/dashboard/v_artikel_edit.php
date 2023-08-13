<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Artikel</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Artikel</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                        <?php foreach($artikel as $a){ ?>
                            <form class="" action="<?php echo base_url('dashboard/update_artikel') ?>" method="post" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Judul<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                            <input type="hidden" 
name="id" value="<?php echo $a->id_artikel; ?>">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="judul" value="<?php echo $a->judul;?>" required="required" />
                                        </div>
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Konten<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <textarea required="required" id="editor" name='konten'><?php echo $a->konten;?></textarea></div>
                                        </div>
                                        <br><br><br>
                                        
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Kategori<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" data-validate-length-range="6" data-validate-words="2" name="kategori" required="required">
                                                    <option value="">-Pilih Kategori-</option>
                                                <?php foreach($kategori as $k){ ?>
                                                    <option <?php if($a->kategori_artikel == $k->id_kategori){echo "selected='selected'";} ?> value="<?php echo $k->id_kategori 
                                                    ?>"><?php echo $k->kategori; ?></option>
                                                <?php } ?>
                                                </select>
                                        </div><br><br><br><br><br>
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Sampul<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="file"  required="required" id="editor" name='sampul'></input>
                                                <br/>
                                                    <?php 
                                                    if(isset($gambar_error)){
                                                    echo $gambar_error;
                                                    }
                                                    ?>
                                            </div>
                                        </div><br/><br/><br><br>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-12 ">
                                                    
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