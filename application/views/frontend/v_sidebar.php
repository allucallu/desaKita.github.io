<div class="sidebar-wrap ">
<!-- <form action="<?php echo base_url().'search' ?>" method="get"> -->
    <?php echo form_open(base_url().'search'); ?>
                    <div class="sidebar-widget search card p-4 mb-3 border-0">
                        <input type="text" class="form-control" placeholder="search">
                        <button type="submit" class="btn btn-mian btn-small d-block mt-2">search</button>
                    </div>
</form>

                   
                    <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                        <h5>Berita Terbaru</h5>

                        <?php 
 $artikel = $this->db->query("SELECT * FROM tb_artikel,tb_kategori WHERE kategori_artikel=id_kategori ORDER BY id_artikel DESC LIMIT 3")->result();
 foreach($artikel as $a){ ?>
                        <div class="media border-bottom py-3">
                            <!-- <a href="#"><img class="mr-4" src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->sampul ?>" alt=""></a> -->
                            <div class="media-body">
                                <h6 class="my-2"><a href="<?php echo base_url().$a->slug_artikel; ?>"><?php echo $a->judul; ?></a></h6>
                                <span class="text-sm text-muted"><?php echo date('d-M-Y', strtotime($a->tanggal));?></span>
                            </div>
                        </div>
<?php }?>
                    </div>

                    <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                        <h5 class="mb-4">Kategori</h5>
                        <?php 
 $kategori = $this->m_data->get_data('tb_kategori')->result();
 foreach($kategori as $k){
 ?>
                        <a href="<?php echo base_url().'kategori/'.$k->slug; ?>"><?php echo $k->kategori; 
?></a>
                        <?php }?>
                    </div>
                </div>