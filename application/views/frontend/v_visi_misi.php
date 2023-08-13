<section class="section about-2 position-relative">
	<div class="container">
		<div class="row">
			<?php foreach($visimisi as $v){ ?>
			<div class="col-lg-5 col-md-6">
                <?php foreach($profil as $p){?>
				<div class="about-item-img">
					<img src="<?php echo base_url(); ?>gambar/website/<?php echo $p->foto ?>" alt="" class="img-fluid">
				</div>
                <?php } ?>
			</div>
			<div class="col-lg-7 col-md-6">
				<h2 class="mt-3 mb-4 position-relative content-title" style="text-align: center;">Visi</h2>
				<p class="mb-3" style="text-align: center;"><?php echo $v->visi; ?></p>

                <h2 class="mt-3 mb-4 position-relative content-title" style="text-align: center;">Misi</h2>
				<p class="mb-3" ><?php echo $v->misi; ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
