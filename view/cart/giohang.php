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
                                        foreach ($_SESSION['giohang'] as $giohang) {
                                            extract($giohang);
                                            echo '<tr>
                                                    <td class="product-thumbnail">
                                                        <a href="?act=chitietsp&id='.$giohang[0].'"><img src="../uploads/'.$giohang[2].'" alt=""></a>
                                                    </td>
                                                    <td class="product-name">
                                                        <h5><a href="?act=chitietsp&id='.$giohang[0].'">'.$giohang[1].'</a></h5>
                                                    </td>
                                                    <td class="product-cart-price"><span class="amount">'.number_format($giohang[3], 0, ',', '.').'₫</span></td>
                                                    <td class="cart-quality">
                                                        <input type="text" name="quality" value="'.$giohang[4].'" style="width:30%; margin-left:5%;" disabled>
                                                    </td>
                                                    <td class="product-total"><span>'.number_format($giohang[5], 0, ',', '.').'₫</span></td>
                                                    <td class="product-remove"><a href="?act=xoagiohang&id='.$giohang[0].'"><i class=" ti-trash "></i></a></td>
                                                </tr>';
                                            $tongthanhtoan+=$giohang[5];
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
                        <!-- <h3>Tổng tiền hàng <span>$180.00</span></h3> -->
                        <!-- <div class="grand-shipping">
                            <span>Phương thức thanh toán</span>
                            <ul>
                                <li><input type="radio" name="phuongthuctt" value="Thanh toán khi nhận hàng" checked><label>Thanh toán khi nhận hàng</label></li>
                                <li><input type="radio" name="phuongthuctt" value="Chuyển khoản"><label><span>Chuyển khoản</span></label></li>
                            </ul>
                        </div>
                        <div class="shipping-country">
                            <p>Shipping to Bangladesh</p>
                        </div> -->
                        <div class="grand-total">
                            <h4>Tổng thanh toán <span><?=number_format($tongthanhtoan, 0, ',', '.');?>đ</span></h4>
                        </div>
                    </div>
                    <div class="grand-total-btn btn-hover">
                        <a class="btn theme-color" href="?act=tieptucdathang">Tiếp tục đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>