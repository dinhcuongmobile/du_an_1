<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.net/urdan/urdan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:10:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Urdan - Minimal eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Urdan - Minimal eCommerce HTML Template" />
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html" />
    <meta property="og:site_name" content="Urdan - Minimal eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store." />
    <!-- Add site Favicon -->
    <link rel="icon" href="../assets/giao_dien_home/assets/images/favicon/cropped-favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="../assets/giao_dien_home/assets/images/favicon/cropped-favicon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="../assets/giao_dien_home/assets/images/favicon/cropped-favicon-180x180.png" />
    <meta name="msapplication-TileImage" content="../assets/giao_dien_home/assets/images/favicon/cropped-favicon-270x270.png" />

    <!-- All CSS is here
	============================================ -->
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/vendor/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/vendor/themify-icons.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/vendor/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/magnific-popup.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/swiper.min.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/jquery-ui.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/easyzoom.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/plugins/slinky.css" />
    <link rel="stylesheet" href="../assets/giao_dien_home/assets/css/style.css" />
    <link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>




<body>
    <div class="main-wrapper main-wrapper-2">
        <header class="header-area header-responsive-padding">
            <div class="header-bottom sticky-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="logo">
                                <a href="?act=trangchu"><img src="../assets/giao_dien_home/assets/images/logo/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="?act=trangchu">Trang Chủ</a></li>
                                        <li><a href="../assets/giao_dien_home/gioithieu.html">Giới Thiệu</a></li>
                                        <li><a href="?act=sanpham">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a> 
                                            <ul class="sub-menu-style">
                                                <?php
                                                    foreach ($listdm as $dm) {
                                                        extract($dm);
                                                        echo '<li><a href="?act=sanpham&id='.$id.'">'.$tendm.'</a></li>';
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="../assets/giao_dien_home/blog.html">Tin Tức</a></li>
                                        <li><a href="../assets/giao_dien_home/about-us.html">Liên Hệ </a></li>  
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="header-action-wrap">
                                <div class="header-action-style header-search-1">
                                    <a class="search-toggle" href="#">
                                        <i class="pe-7s-search s-open"></i>
                                        <i class="pe-7s-close s-close"></i>
                                    </a>
                                    <div class="search-wrap-1">
                                        <form action="#">
                                            <input placeholder="Tìm kiếm" type="text">
                                            <button class="button-search"><i class="pe-7s-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-action-style main-menu">
                                    <nav>
                                        <ul>
                                            <?php
                                                if(isset($_SESSION['user'])&&$_SESSION['user']!=""){
                                                    extract($_SESSION['user']);
                                            ?>
                                                <li><a title="Tài khoản" href="?act=thongtintk"><i class="pe-7s-user"></i></a>
                                                    <ul class="sub-menu-style">
                                                        <li><a href="?act=thongtintk" style="font-size:13px;">Thông tin tài khoản</a></li>
                                                        <li><a href="?act=donmua" style="font-size:13px;">Đơn mua</a></li>
                                                        <?php if($role==1):?>
                                                            <li><a href="../admin/index.php" style="font-size:13px;">Quản trị viên</a></li>
                                                        <?php endif;?>
                                                        <li><a href="?act=dangxuat" style="font-size:13px;">Đăng xuất</a></li>
                                                    </ul>
                                                </li>
                                            <?php }else{ ?>
                                                <li><a title="Đăng nhập" href="?act=dangnhap"><i class="pe-7s-user"></i></a>
                                                    <ul class="sub-menu-style">
                                                        <li><a href="?act=dangnhap" style="font-size:13px;">Đăng nhập</a></li>
                                                        <li><a href="?act=dangky" style="font-size:13px;">Đăng ký</a></li>   
                                                    </ul>
                                                </li>
                                            <?php }?>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- <div class="header-action-style">
                                    <a title="Đăng nhập" href="?act=dangnhap"><i class="pe-7s-user"></i></a>
                                </div> -->
                                <div class="header-action-style header-action-cart">
                                    <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                        <span class="product-count bg-black">01</span>
                                    </a>
                                </div>
                                <div class="header-action-style d-block d-lg-none">
                                    <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li>
                            <div class="cart-img">
                                <a href="#"><img src="../assets/giao_dien_home/assets/images/cart/cart-1.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Stylish Swing Chair</a></h4>
                                <span> 1 × $49.00	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li>
                            <div class="cart-img">
                                <a href="#"><img src="../assets/giao_dien_home/assets/images/cart/cart-2.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Modern Chairs</a></h4>
                                <span> 1 × $49.00	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$170.00</span></h4>
                    </div>
                    <div class="cart-btn btn-hover">
                        <a class="theme-color" href="?act=giohang">view cart</a>
                    </div>
                    <div class="checkout-btn btn-hover">
                        <a class="theme-color" href="../assets/giao_dien_home/checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>