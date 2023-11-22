<div class="shop-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-12">
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        <?php
                                        $delay=200;
                                            foreach ($list_sp_home as $sp) {
                                                extract($sp);
                                                if($soluong>0){
                                                    $giakm=$giasp*((100-$khuyenmai)/100);
                                                echo '<div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                                            <div class="product-img img-zoom mb-25">
                                                                <a href="?act=chitietsp&id='.$id.'">
                                                                    <img src="../uploads/'.$image.'" alt="">
                                                                </a>
                                                                <div class="product-badge badge-top badge-right badge-pink">
                                                                    <span>-'.$khuyenmai.'%</span>
                                                                </div>
                                                                <div class="product-action-2-wrap">
                                                                    <form action="?act=themgiohang" method="post">
                                                                        <input type="hidden" name="id" value="'.$id.'">
                                                                        <input type="hidden" name="giasp" value="'.$giakm.'">
                                                                        <button type="submit" name="themgiohang" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h3><a href="?act=chitietsp&id='.$id.'">'.$tensp.'</a></h3>
                                                                <div class="product-price">
                                                                    <span class="old-price">'.number_format($giakm, 0, ',', '.').'₫</span>
                                                                    <span class="new-price">'.number_format($giasp, 0, ',', '.').'₫</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                    $delay+=200;
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>