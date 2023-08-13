<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Kategori <small>Artikel</small></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Tambah Kategori</h2>
                                   <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('dashboard/aksi_kategori') ?>" method="post" novalidate>
                                        
                                        <div class="">
                                            <label class="col-form-label col-md-3 col-sm-3  label-left">Kategori<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="kategori" required="required" />
                                        </div>
                                        <br><br><br>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 ">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>