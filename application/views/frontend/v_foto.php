<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-4 text-lg">Foto Kegiatan Desa Ulu Wawo</h1>
          <ul class="list-inline">
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- section portfolio start -->


	<div class="container-fluid">
		<div class="row portfolio-gallery">

        <?php foreach($foto as $a){?>
			<div class="col-lg-4 col-md-6 mt-3">
				<div class="portflio-item position-relative mb-4" style="position: relative; width: 100%; height: 0; padding-bottom: 75%; overflow: hidden;">
					<a href="<?php echo base_url(); ?>gambar/foto/<?php echo $a->foto ?>" class="popup-gallery">
						<img src="<?php echo base_url(); ?>gambar/foto/<?php echo $a->foto ?>" alt="" style="position: absolute; width: 100%; height: 100%; object-fit: cover;" class="img-fluid w-100">

						<i class="ti-plus overlay-item"></i>
						<div class="portfolio-item-content">
							<h3 class="mb-0 text-white"><?php echo $a->deskripsi;?></h3>
						</div>
					</a>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</section>