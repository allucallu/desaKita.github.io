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
                                    <h2>Tambah Profil</h2>
                                   <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php foreach($profil as $p){ ?>
                                    <form class="" action="<?php echo base_url('dashboard/profil_update') ?>" method="post" novalidate>
                                        
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Profil<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                            <input type="hidden" 
name="id" value="<?php echo $p->id_profil; ?>">
                                                <textarea required="required" id="editor" name='profil'> <?php echo $p->profil; ?></textarea></div>
                                        </div><br><br><br>
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