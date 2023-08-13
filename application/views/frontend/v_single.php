<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <!-- <span class="text-white">News details</span> -->
          <h1 class="text-capitalize mb-4 text-lg">Artikel</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo base_url(); ?>" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="<?php echo base_url('blog'); ?>" class="text-white">Blog</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item breadcrumb-item active">Artikel</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

            <?php if(count($artikel) == 0){ ?>
                <center>
                <h3 class="mt-5">Artikel Tidak Ditemukan.</h3>
                </center>
            <?php } ?>

            <?php foreach($artikel as $a){ ?>
                <div class="row">
	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
        <?php if($a->sampul != ""){ ?>
			<img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->sampul ?>" alt="" class="img-fluid rounded">
            <?php }?>

			<div class="blog-item-content bg-white p-5">
				<div class="blog-item-meta bg-gray py-1 px-2">
                    <?php foreach($kategori as $k){
                        if($a->kategori_artikel == $k->id_kategori){?>
                        <span class="text-muted text-capitalize mr-3"><?php echo $k->kategori;?></i></span>
                        <?php }?>
                        <?php } ?>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i><?php echo date('d-M-Y', strtotime($a->tanggal));?></span>
				</div> 

				<h2 class="mt-3 mb-4"><a href="blog-single.html"><?php echo $a->judul ?></a></h2>
				<p class="lead mb-4"><?php echo $a->konten ?></p>

				<!-- <div class="tag-option mt-5 clearfix">
				    <ul class="float-left list-inline"> 
				    	<li>Tags:</li> 
				    	<li class="list-inline-item"><a href="#" rel="tag">Advancher</a></li>
				    	<li class="list-inline-item"><a href="#" rel="tag">Landscape</a></li>
				    	<li class="list-inline-item"><a href="#" rel="tag">Travel</a></li>
				   	</ul>        

				    <ul class="float-right list-inline">
				        <li class="list-inline-item"> Share: </li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
				        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
				    </ul>
			    </div> -->
                <?php }?>
			</div>
		</div>
	</div>


	

	<div class="col-lg-12">
		<form class="contact-form bg-white rounded p-5" id="comment-form">
			<h4 class="mb-4">Write a comment</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="name" id="name" placeholder="Name:">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="mail" id="mail" placeholder="Email:">
					</div>
				</div>
			</div>


			<textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>

			<input class="btn btn-main btn-round-full" type="submit" name="submit-contact" id="submit_contact" value="Submit Message">
		</form>
	</div>
</div>
            </div>
            <div class="col-lg-4">
            <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>   
        </div>
    </div>
</section>