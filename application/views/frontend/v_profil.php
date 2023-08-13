<section class="section about-2 position-relative">
	<div class="container">
		<div class="row">
			<?php foreach($profil as $p){ ?>
			<div class="col-lg-5 col-md-6">
				<div class="about-item-img">
					<img src="<?php echo base_url(); ?>gambar/website/<?php echo $p->foto ?>" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-7 col-md-6">
				<h2 class="mt-3 mb-4 position-relative content-title">Profil Desa Ulu Wawo</h2>
				<p class="mb-5"><?php echo $p->profil; ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
