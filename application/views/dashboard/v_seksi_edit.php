<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Edit Bidang</h3>
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
                                <?php foreach($seksi as $s){ ?>
                                    <form class="" action="<?php echo base_url('dashboard/seksi_update') ?>" enctype="multipart/form-data" method="post" novalidate>
                                        
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Bidang<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="hidden"
                            name="id" value="<?php echo $s->id_seksi; ?>">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="bidang" value="<?php echo $s->bidang;?>" required="required" />
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