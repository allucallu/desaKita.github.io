<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our blog</span>
          <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
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
                <?php foreach($artikel as $a){ ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-5">
                            <div class="blog-item">
                            <?php if($a->sampul != ""){ ?>
                                <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->sampul ?>" alt="" class="img-fluid rounded">
                                <?php }?>

                                <div class="blog-item-content bg-white p-4">
                                    <div class="blog-item-meta  py-1 px-2">
                                        <span class="text-muted text-capitalize mr-3"></i>
                                        <?php foreach($kategori as $k){
                        if($a->kategori_artikel == $k->id_kategori){?>
                        <span class="text-muted text-capitalize mr-3"><?php echo $k->kategori;?></i></span>
                        <?php }?>
                        <?php } ?>
                                    </span>
                                    </div> 

                                    <h3 class="mt-3 mb-3"><a href="<?php echo base_url().$a->slug_artikel ?>"><?php echo $a->judul;?></a></h3>
                                    <p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!</p>

                                    <a href="<?php echo base_url().$a->slug_artikel ?>" class="btn btn-small btn-main btn-round-full">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="col-lg-4">
            <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>   
                        </div>

                        <!-- <div class="row mt-5">
                            <div class="col-lg-8">
                                <nav class="navigation pagination py-2 d-inline-block">
                                    <div class="nav-links">
                                        <a class="prev page-numbers" href="#">Prev</a>
                                        <span aria-current="page" class="page-numbers current">1</span>
                                        <a class="page-numbers" href="#">2</a>
                                        <a class="next page-numbers" href="#">Next</a>
                                    </div>
                                </nav>
                            </div>
                        </div> -->
                    </div>
                </section>

                <!-- footer Start -->
                <!-- <footer class="footer section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="widget">
                                    <h4 class="text-capitalize mb-4">Company</h4>

                                    <ul class="list-unstyled footer-menu lh-35">
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="widget">
                                    <h4 class="text-capitalize mb-4">Quick Links</h4>

                                    <ul class="list-unstyled footer-menu lh-35">
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Team</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="widget">
                                    <h4 class="text-capitalize mb-4">Subscribe Us</h4>
                                    <p>Subscribe to get latest news article and resources  </p>

                                    <form action="#" class="sub-form">
                                        <input type="text" class="form-control mb-3" placeholder="Subscribe Now ...">
                                        <a href="#" class="btn btn-main btn-small">subscribe</a>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-3 ml-auto col-sm-6">
                                <div class="widget">
                                    <div class="logo mb-4">
                                        <h3>Mega<span>kit.</span></h3>
                                    </div>
                                    <h6><a href="tel:+23-345-67890" >Support@megakit.com</a></h6>
                                    <a href="mailto:support@gmail.com"><span class="text-color h4">+23-456-6588</span></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="footer-btm pt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="copyright">
                                        &copy; Copyright Reserved to <span class="text-color">Megakit.</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="copyright">
                                    Distributed by  <a href="https://themewagon.com/" target="_blank">Themewagon</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 text-left text-lg-left">
                                    <ul class="list-inline footer-socials">
                                        <li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="ti-facebook mr-2"></i>Facebook</a></li>
                                        <li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="ti-twitter mr-2"></i>Twitter</a></li>
                                        <li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="ti-linkedin mr-2 "></i>Linkedin</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
</footer> -->
   
    </div>