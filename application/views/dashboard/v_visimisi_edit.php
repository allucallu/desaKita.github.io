<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Profil Desa</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Visi & Misi</h2>
                                   <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php foreach($visi as $v){?>
                                    <form class="" action="<?php echo base_url('dashboard/visimisi_update') ?>" method="post" novalidate>
                                        
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Visi<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                            <input type="hidden" 
name="id" value="<?php echo $v->id_visimisi; ?>">
                                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="visi" value="<?php echo $v->visi; ?>" required="required" /></div>
                                        </div>
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Misi<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <textarea required="required" id="editor" name='misi'><?php echo $v->misi; ?></textarea></div>
                                        </div><br><br><br><br>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6">
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