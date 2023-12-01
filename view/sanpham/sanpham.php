<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                    foreach ($list_sp_home as $sp) {
                                        extract($sp);
                                        if($soluong>0){
                                        echo '<div class="col-lg-4 col-sm-5">
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
                                                            <span class="old-price">'.number_format($giasp, 0, ',', '.').'₫</span>
                                                            <span class="new-price">'.number_format($giakm, 0, ',', '.').'₫</span>
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
            </div>
            <div class="col-lg-3">
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=sanpham">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=sanpham" method="post">
                        <div class="sidebar-widget  mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar-widget-title mb-30">
                                <h3>Lọc giá</h3>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Giá:</label>
                                        <input type="text" id="amount" placeholder="Tìm theo giá" />
                                        <input type="hidden" name="giaspdau" class="giaspdau">
                                        <input type="hidden" name="giaspcuoi" class="giaspcuoi">
                                    </div>
                                    <button type="submit" name="submitlocgia">Lọc</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="sidebar-widget mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Danh mục sản phẩm <span><a style="padding-left:35px;" href="?act=sanpham">Tất cả</a></span></h3>
                        </div>
                        <div class="sidebar-list-style">
                            <ul>
                                <?php
                                    foreach ($listdm as $dm) {
                                        extract($dm);
                                        $demsp=dem_sp_dm($id);
                                        echo '<li><a href="?act=spdanhmuc&id='.$id.'">'.$tendm.' <span>'.$demsp['countsp'].'</span></a></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>