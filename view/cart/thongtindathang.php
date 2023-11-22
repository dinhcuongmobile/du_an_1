<?php
if(!$_SESSION['user']){
    header('location: ?act=dangnhap');
}
?>

<div class="checkout-main-area pb-100 pt-100">
    <div class="container">
        <div class="checkout-wrap pt-30">
            <form action="?act=tieptucdathang" method="post">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Chi tiết thanh toán</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="diachi" value="<?=$_SESSION['user']['diachi']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Email<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="email" value="<?=$_SESSION['user']['email']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Sản phẩm <span>Tổng cộng</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            <?php
                                            $tongthanhtoan=0;
                                            foreach ($_SESSION['giohang'] as $giohang) {
                                                extract($giohang);
                                                echo ' <li>'.$giohang[1].'<span>'.number_format($giohang[5], 0, ',', '.').'₫</span></li>';
                                                $tongthanhtoan+=$giohang[5];
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p>Enter your full address </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" checked="checked" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN TRỰC TIẾP</label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi.
                                             Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt">
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi.
                                                Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order btn-hover">
                                <button type="submit" name="dathang" class="btn btn-danger" style="width:100%;">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>