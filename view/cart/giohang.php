<div class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="width-thumbnail"></th>
                                        <th class="width-name">Sản phẩm</th>
                                        <th class="width-price">Đơn giá</th>
                                        <th class="width-quantity">Số lượng</th>
                                        <th class="width-subtotal">Số tiền</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tongthanhtoan=0;
                                        if(isset($listgh)){
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                echo '<tr>
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <input type="text" name="quality" value="'.$soluong.'" style="width:30%; margin-left:5%;" disabled>
                                                        </td>
                                                        <td class="product-total"><span>'.number_format($thanhtien, 0, ',', '.').'₫</span></td>
                                                        <td class="product-remove"><a href="?act=xoagiohang&id='.$idsanpham.'"><i class=" ti-trash "></i></a></td>
                                                    </tr>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update btn-hover">
                                    <a href="?act=trangchu">Tiếp tục mua sắm</a>
                                </div>
                                <div class="cart-clear btn-hover">
                                    <a href="?act=xoagiohang">Dọn dẹp giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12" style="width:100%;">
                <div class="grand-total-wrap">
                    <div class="grand-total-content">
                        <div class="grand-total">
                            <h4>Tổng thanh toán <span><?=number_format($tongthanhtoan, 0, ',', '.');?>đ</span></h4>
                        </div>
                    </div>
                    <div class="grand-total-btn btn-hover">
                        <?php
                            if(isset($_SESSION['user'])){
                                if(isset($countgh)){
                                    if($countgh['COUNT(*)']==0) $tieptucdathang="#";
                                    else $tieptucdathang="?act=tieptucdathang";
                                }
                            }else{
                                $tieptucdathang="?act=dangnhap";
                            }
                        ?>
                        <a class="btn theme-color" href="<?=$tieptucdathang?>">Tiếp tục đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>