<div class="main-wrapper ">
<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					<span class="d-block mb-3 text-white text-capitalize"></span>
					<h1 class="animated fadeInUp mb-5">Selamat Datang <br>Di Desa ULU WAWO <br>Kec. WAWO.</h1>
					<a href="#" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" >Cek Profil Kami<i class="btn-icon fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Intro Start -->

<!-- <section class="section intro">
	<div class="container">
		<div class="row ">
			<div class="col-lg-8">
				<div class="section-title">
					<span class="h6 text-color ">We are creative & expert people</span>
					<h2 class="mt-3 content-title">We work with business & provide solution to client with their business problem </h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="intro-item mb-5 mb-lg-0"> 
					<i class="ti-desktop color-one"></i>
					<h4 class="mt-4 mb-3">Modern & Responsive design</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="intro-item mb-5 mb-lg-0">
					<i class="ti-medall color-one"></i> 
					<h4 class="mt-4 mb-3">Awarded licensed company</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="intro-item">
					<i class="ti-layers-alt color-one"></i>
					<h4 class="mt-4 mb-3">Build your website Professionally</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
				</div>
			</div> 
		</div>
	</div>
</section> -->

<!-- Section Intro END -->
<!-- section Counter Start -->

<!-- Section About Start -->

<section class="section about position-relative">
	<div class="bg-about" style="background: url('<?php echo base_url();?>assets_frontend/images/about/home-9.jpg') no-repeat; position: absolute;
  content: '';
  left: 12px;
  top: 50px;
  width: 45%;
  min-height: 650px;
  background-size: cover;"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-6 offset-md-0">
				<div class="about-item ">
					<span class="h6 text-color">What we are</span>
					<h2 class="mt-3 mb-4 position-relative content-title">We are dynamic team of creative people</h2>
					<div class="about-content">
						<h4 class="mb-3 position-relative">We are Perfect Solution</h4>
						<p class="mb-5">We provide consulting services in the area of IFRS and management reporting, helping companies to reach their highest level. We optimize business processes, making them easier.</p>

						<a href="#" class="btn btn-main btn-round-full">Get started</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><br><br>

<!-- Section About End -->
<section class="section counter">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2 class="mt-3 content-title ">Deskripsi Singkat Desa</h2>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="counter-item text-center mb-5 mb-lg-0 ">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold"><?php echo $jumlah_penduduk?></span> </h3>
					<p class="text-muted">Jumlah Penduduk</p>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold"><?php echo $jumlah_aparat?></span></h3>
					<p class="text-muted">Aparat</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center mb-5 mb-lg-0">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">125.000 </span>Km </h3>
					<p class="text-muted">Luas Wilayah</p>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="counter-item text-center">
					<h3 class="mb-0"><span class="counter-stat font-weight-bold">14</span></h3>
					<p class="text-muted">Dewasa </p>
				</div>
			</div> -->
		</div>
	</div>
</section>
<!-- section Counter End  -->
<!--  Section Services Start -->
<section class="section portfolio pb-0">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2 class="mt-3 content-title ">Aparat Desa Ulu Wawo</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row portfolio-gallery">
		<?php foreach($aparat as $a){?>
			<div class="col-lg-3 col-md-6">
				<div class="portflio-item position-relative mb-4" style="position: relative; width: 100%; height: 0; padding-bottom: 75%; overflow: hidden;">
					<a href="<?php echo base_url(); ?>gambar/aparat/<?php echo $a->foto ?>" class="popup-gallery">
						<img src="<?php echo base_url(); ?>gambar/aparat/<?php echo $a->foto ?>" alt="" style="position: absolute; width: 100%; height: 100%; object-fit: cover;" class="img-fluid w-100">

						<i class="ti-plus overlay-item"></i>
						<div class="portfolio-item-content">
							<h3 class="mb-0 text-white"><?php echo $a->nama;?></h3>
							<p class="text-white-50"><?php echo $a->jabatan;?></p>
						</div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
</section>
<!--  Section Services End -->
 <!-- Section Cta Start --> 
<!-- <section class="section cta">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="cta-item  bg-white p-5 rounded">
					<span class="h6 text-color">We create for you</span>
					<h2 class="mt-2 mb-4">Entrust Your Project to Our Best Team of Professionals</h2>
					<p class="lead mb-4">Have any project on mind? For immidiate support :</p>
					<h3><i class="ti-mobile mr-3 text-color"></i>+23 876 65 455</h3>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!--  Section Cta End-->
<!-- <section class="section blog-wrap bg-gray">
    <div class="container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Kabar DesaKita</span>
					<h2 class="mt-3 content-title ">We have done lots of works, lets check some</h2>
				</div>
			</div>
		</div>
	</div>
        <div class="row">
	<div class="col-lg-12 col-md-12 mb-5">
		<div class="blog-item">
			<img src="<?php echo base_url();?>assets_frontend/images/blog/2.jpg" alt="" class="img-fluid rounded">

			<div class="blog-item-content bg-white p-5">
				<div class="blog-item-meta bg-gray py-1 px-2">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>Creativity</span>
					<span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5 Comments</span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> 28th January</span>
				</div> 

				<h3 class="mt-3 mb-3"><a href="blog-single.html">Improve design with typography?</a></h3>
				<p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!</p>

				<a href="blog-single.html" class="btn btn-small btn-main btn-round-full">Learn More</a>
			</div>
		</div>
	</div>
		</div>
	</div>
</section> -->
<!-- Section Testimonial End -->
<section class="section latest-blog bg-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2 class="mt-3 content-title text-white">Kabar Desa Ulu Wawo</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
		<?php foreach ($artikel as $a): ?>
    <div class="col-lg-4 col-md-6 mb-5">
        <div class="card border-0 bg-transparent">
            <?php if ($a->sampul != ""): ?>
                <div style="position: relative; width: 100%; height: 0; padding-bottom: 75%; overflow: hidden;">
                    <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->sampul ?>" alt="" style="position: absolute; width: 100%; height: 100%; object-fit: cover;">
                </div>
            <?php endif; ?>

            <div class="card-body mt-2">
                <div class="blog-item-meta">
                    <a href="#" class="text-white-50"><?php echo date('d-M-Y', strtotime($a->tanggal));?><span class="ml-2 mr-2">/</span></a>
                    <?php foreach($kategori as $k){
                            if($a->kategori_artikel == $k->id_kategori){?>
                        <a href="#"  class="text-white-50"><?php echo $k->kategori;?><span class="ml-2">/</span></a>
                        <?php }?>
                    <?php } ?>
                </div>

                <h3 class="mt-3 mb-5 lh-36"><a href="<?php echo base_url().$a->slug_artikel ?>" class="text-white"><?php echo $a->judul;?></a></h3>

                <a href="<?php echo base_url().$a->slug_artikel ?>" class="btn btn-small btn-solid-border btn-round-full text-white">Learn More</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>

	</div>
</section>

<section class="mt-70 position-relative">
	<div class="container">
	<div class="cta-block-2 bg-gray p-5 rounded border-1">
		<div class="row justify-content-center align-items-center ">
			<div class="col-lg-7">
				<h2 class="mt-2 mb-4 mb-lg-0">Ada Pertanyaan Terkait Desa Ulu Wawo?</h2>
			</div>
			<div class="col-lg-4">
				<a href="<?php echo base_url('kontak'); ?>" class="btn btn-main btn-round-full float-lg-right ">Kontak Kami</a>
			</div>
		</div>
	</div>
</div>

</section>