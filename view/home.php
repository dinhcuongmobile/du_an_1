<!--container-->
<div class="slider-area">
    <div class="slider-active swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1" style="background-image:url(../assets/giao_dien_home/assets/images/slider/slider-bg-1.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="slider-content-1 slider-animated-1">
                                    <h1 class="animated">iPhone <br>15 Promax</h1>
                                    <div class="slider-btn btn-hover">
                                        <a href="?act=sanpham" class="btn animated">
                                            Shop Now <i class=" ti-arrow-right "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="hero-slider-img-1 slider-animated-1">
                                    <img class="animated animated-slider-img-1" src="../assets/giao_dien_home/assets/images/banner/15-pro-max-sliding-new-th11.webp" alt="">
                                    <div class="product-offer animated">
                                        <h5>30% <span>Off</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1" style="background-image:url(../assets/giao_dien_home/assets/images/slider/slider-bg-1.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="slider-content-1 slider-animated-1">
                                    <h1 class="animated">Oppo <br>Find N3 series</h1>
                                    <div class="slider-btn btn-hover">
                                        <a href="?act=sanpham" class="btn animated">
                                            Shop Now <i class=" ti-arrow-right "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="hero-slider-img-1 slider-animated-1">
                                    <img class="animated animated-slider-img-1" src="../assets/giao_dien_home/assets/images/banner/sliding-oppo-find-n3-moban.webp" alt="">
                                    <div class="product-offer animated">
                                        <h5>30% <span>Off</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slider-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="service-area pb-70 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-img">
                        <img src="../assets/giao_dien_home/assets/images/icon-img/car.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Free Shipping</h3>
                        <p>Giao Nhanh Miễn Phí</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-img">
                        <img src="../assets/giao_dien_home/assets/images/icon-img/time.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Support 24/7</h3>
                        <p>Hỗ Trợ Nhiệt Tình</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-img">
                        <img src="../assets/giao_dien_home/assets/images/icon-img/dollar.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Money Return</h3>
                        <p>Chính Sách Đổi Trả </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-img">
                        <img src="../assets/giao_dien_home/assets/images/icon-img/discount.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Order Discount</h3>
                        <p>Giảm Giá Đơn Hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-95">
    <div class="container">
        <div class="section-border section-border-margin-1" data-aos="fade-up" data-aos-delay="200">
            <div class="section-title-timer-wrap bg-white">
                <div class="section-title-1">
                    <h2>Hot Sale Hôm Nay</h2>
                </div>
                
            </div>
        </div>
        <div class="product-slider-active-1 swiper-container">
            <div class="swiper-wrapper">
            <?php
            foreach ($list_sp_home as $sp) {
                extract($sp);
                $delay=200;
                if($soluong>0){
                    echo '<div class="swiper-slide">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="'.$delay.'">
                            <div class="product-img img-zoom mb-25">
                                <a href="?act=chitietsp&id='.$id.'">
                                    <img src="../uploads/'.$image.'" alt="">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>-'.$khuyenmai.'%</span>
                                </div>
                                <div class="product-action-2-wrap">
                                    <button data-id="'.$id.'" onclick="themgiohang('.$id.','.$giakm.')" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="?act=chitietsp&id='.$id.'">'.$tensp.'</a></h3>
                                <div class="product-price">
                                    <span class="new-price">'.number_format($giakm, 0, ',', '.').'₫</span>
                                    <span class="old-price">'.number_format($giasp, 0, ',', '.').'₫</span>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $delay+=200;
                }
            }
            ?>
            </div>
            <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-angle-left"></i></div>
            <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div> 
<div class="product-area pb-60">
    <div class="container">
        <div class="section-title-tab-wrap mb-75">
            <div class="section-title-2" data-aos="fade-up" data-aos-delay="200">
                <h2>Sản Phẩm Nổi Bật</h2>
            </div>
        </div>
        <!--Danh mục-->
        <div id="pro-1" class="tab-pane">
            <div class="row">
                <?php
                    foreach ($list_sp_nb as $sp) {
                        extract($sp);
                        if($soluong>0){
                            echo '<div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                    <div class="product-img img-zoom mb-25">
                                        <a href="?act=chitietsp&id='.$id.'">
                                            <img src="../uploads/'.$image.'" alt="">
                                        </a>
                                        <div class="product-badge badge-top badge-right badge-pink">
                                            <span>-'.$khuyenmai.'%</span>
                                        </div>
                                        <div class="product-action-2-wrap">
                                            <button data-id="'.$id.'" onclick="themgiohang('.$id.','.$giakm.')" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="?act=chitietsp&id='.$id.'">'.$tensp.'</a></h3>
                                        <div class="product-price">
                                            <span class="new-price">'.number_format($giakm, 0, ',', '.').'₫</span>
                                            <span class="old-price">'.number_format($giasp, 0, ',', '.').'₫</span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="blog-area pb-70">
    <div class="container">
        <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
            <h2>Latest News</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-img-date-wrap mb-25">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="../assets/giao_dien_home/assets/images/blog/blog-1.png" alt=""></a>
                        </div>
                        <div class="blog-date">
                            <h5>05 <span>May</span></h5>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#">Furniture</a>,</li>
                                <li>By:<a href="#"> Admin</a></li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">Lorem ipsum dolor consectet adipisicing elit</a></h3>
                        <div class="blog-btn">
                            <a href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                    <div class="blog-img-date-wrap mb-25">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="../assets/giao_dien_home/assets/images/blog/blog-2.png" alt=""></a>
                        </div>
                        <div class="blog-date">
                            <h5>06 <span>May</span></h5>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#">Furniture</a>,</li>
                                <li>By:<a href="#"> Admin</a></li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">Morbi dignissim sit amet velit id vestibulum.</a></h3>
                        <div class="blog-btn">
                            <a href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="600">
                    <div class="blog-img-date-wrap mb-25">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="../assets/giao_dien_home/assets/images/blog/blog-3.png" alt=""></a>
                        </div>
                        <div class="blog-date">
                            <h5>07 <span>May</span></h5>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#">Furniture</a>,</li>
                                <li>By:<a href="#"> Admin</a></li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">Fusce euismod varius tellus, nec molestie turpis.</a></h3>
                        <div class="blog-btn">
                            <a href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>