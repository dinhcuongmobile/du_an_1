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
                                        <input type="text" value="<?=$_SESSION['user']['hovaten']?>">
                                        <input type="hidden" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>" >
                                        <p style="color:red;"><?= isset($hovatenErr) ? ($hovatenErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['sodienthoai']?>">
                                        <input type="hidden" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>" >
                                        <p style="color:red;"><?= isset($sodienthoaiErr) ? ($sodienthoaiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['diachi']?>">
                                        <input type="hidden" name="diachi" value="<?=$_SESSION['user']['diachi']?>" >
                                        <p style="color:red;"><?= isset($diachiErr) ? ($diachiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="checkout-account mt-25">
                                    <input class="checkout-toggle" type="checkbox" name="diachikhac" value="diachimoi">
                                    <span>Giao hàng tới một địa chỉ khác?</span>
                                </div>
                                <div class="different-address open-toggle mt-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? ($hovatennhan) : '' ?>">
                                                <p style="color:red;"><?= isset($hovatennhanErr) ? ($hovatennhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="sodienthoainhan" value="<?= isset($sodienthoainhan) ? ($sodienthoainhan) : '' ?>">
                                                <p style="color:red;"><?= isset($sodienthoainhanErr) ? ($sodienthoainhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="diachinhan" value="<?= isset($diachinhan) ? ($diachinhan) : '' ?>">
                                                <p style="color:red;"><?= isset($diachinhanErr) ? ($diachinhanErr) : '' ?></p>
                                            </div>
                                        </div>
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
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                if(strlen($tensp)>23) $tensp=substr($tensp,0,23)."...";
                                                echo ' <li>'.$tensp.' X '.$soluong.' <span>'.number_format($thanhtien, 0, ',', '.').' ₫</span></li>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p><?=$_SESSION['user']['diachi']?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span id="vnp_thanhcong"><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                        <div class="payment-box payment_method_bacs">
                                            <a href="?act=chuyenkhoanvnp" style="text-decoration:underline; color:blue;">Chuyển hướng tới trang thanh toán</a>
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
                                                echo '<tr class="trgiohang">
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <div class="product-quality">
                                                                <input data-id="'.$id.'" type="hidden"  name="id" value="'.$id.'">
                                                                <input data-id="'.$id.'" type="hidden"  name="idsp" value="'.$idsanpham.'">
                                                                <input type="hidden" name="giakm" value="'.$giakm.'">
                                                                <input data-id="'.$id.'" type="hidden" class="thanhtienjs" name="thanhtien" value="'.$thanhtien.'">
                                                                <div  class="dec qtybutton">-</div>
                                                                <input data-id="'.$id.'" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="'.$soluong.'">
                                                                <div  class="inc qtybutton">+</div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total"><span data-id="'.$id.'">'.number_format($thanhtien, 0, ',', '.').' ₫</span></td>
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
                            <h4>Tổng thanh toán <span id="tongthanhtoan"><?=number_format($tongthanhtoan, 0, ',', '.');?> đ</span></h4>
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
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <nav>
                            <ul class="nav-tab">
                                <li class="active"><a href="#tap1">Tất cả</a></li>
                                <li><a href="#tap2">Chờ xác nhận</a></li>
                                <li><a href="#tap3">Chờ giao hàng</a></li>
                                <li><a href="#tap4">Đang giao</a></li>
                                <li><a href="#tap5">Hoàn thành</a></li>
                                <li><a href="#tap6">Đã hủy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php foreach ($tatca as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="Đã hoàn thành";
                                  else if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php foreach ($choxacnhan as $item) : ?>
                            <?php if($item['trangthai']==0) $item['trangthai']="Chờ xác nhận"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php foreach ($chogiaohang as $item) : ?>
                            <?php if($item['trangthai']==2) $item['trangthai']="Chờ giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php foreach ($danggiao as $item) : ?>
                            <?php if($item['trangthai']==3) $item['trangthai']="Đang giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php foreach ($hoanthanh as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="hoàn thành"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap6" class="card-body p-4 bg-light an">
                        <?php foreach ($dahuy as $item) : ?>
                            <?php if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-details-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            extract($sanpham);
                        ?>
                    <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                                <a href="#">
                                    <img src="../uploads/<?=$image?>" alt="">
                                </a>
                            </div>
                            <div class="product-details-small-img-wrap">
                                <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                            <a style="font-size: 25px" href="?act=chitietsp&id=<?=$id?>"><?=$tensp?></a>
                            <div class="product-details-price">
                                <span class="old-price"><?=number_format($giasp, 0, ',', '.')?>đ</span>
                                <span class="new-price"><?=number_format($giakm, 0, ',', '.')?>đ</span>
                            </div>
                        <?php
                            extract($danhmuc);
                        ?>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span class="title">Category:</span>
                                        <ul>
                                            <li><a href="?act=spdanhmuc&id=<?=$id?>"><?=$tendm?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details-action-wrap">
                                <div class="single-product-cart btn-hover">
                                    <?php
                                        extract($sanpham);
                                    ?>
                                    <button onclick="themgiohang(<?= $id; ?>,<?= $giakm; ?>)" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                                <div class="single-product-cart btn-hover">
                                    <?php if(isset($_SESSION['user'])) : ?>
                                        <form action="?act=chitietsp&id=<?= $id?>" method="post">
                                            <button type="submit" name="datngayct" class="product-action-btn-2 theme-color">Mua ngay</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-area pb-85">
            <div class="container">
                <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                    <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
                    <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
                </div>
                <div class="tab-content">
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-content text-center">
                            <p data-aos="fade-up" data-aos-delay="400"><?=$mota?></p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div id="loadbinhluan" class="review-wrapper">
                            <?php extract($dembl);?>
                            <h3><span id="countbl"><?=$countbl?></span> đánh giá</h3>
                            <?php
                                foreach ($listbl as $bl) {
                                    extract($bl);
                                    echo '<div class="single-review">
                                            <div class="review-img">
                                                <img src="../assets/images/userbl.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h5><span>'.$hovaten.'</span> - '.$ngaybinhluan.'</h5>
                                                <p>'.$noidung.'</p>
                                            </div>
                                        </div>';
                                }
                                ?>
                            
                        </div>
                        <?php if(isset($_SESSION['user'])) : ?>
                                <?php extract($sanpham); ?>
                                    <div class="ratting-form-wrapper">
                                        <div class="ratting-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-15">
                                                            <label>Đánh giá của bạn <span>*</span></label>
                                                            <textarea id="noidung"></textarea>
                                                            <p style="color:red;"><?= $noidungErr; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input id="ngaybinhluan" type="hidden" value="<?= date('Y-m-d'); ?>">
                                                            <button class="btn btn-dark" onclick="binhluanjs(<?= $id ?>,'<?= $_SESSION['user']['hovaten'] ?>')">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                
                <div class="related-product-active swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            foreach($splq as $sp){
                                extract($sp);
                                echo '<div class="swiper-slide">
                                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="?act=chitietsp&id='.$id.'">
                                                    <img src="../uploads/'.$image.'" alt="">
                                                </a>
                                                <div class="product-badge badge-top badge-right badge-pink">
                                                    <span>'.$khuyenmai.'%</span>
                                                </div>
                                                <div class="product-action-2-wrap">
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <input type="hidden" name="tensp" value="'.$tensp.'">
                                                    <input type="hidden" name="image" value="'.$image.'">
                                                    <input type="hidden" name="giasp" value="'.$giakm.'">
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
                        ?>
                    </div>
                </div>
            </div>
        </div>

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
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                    foreach ($list_sp_dm as $sp) {
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
                <?php extract($sp);?>
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=spdanhmuc&id=<?=$iddm?>">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=spdanhmuc&id=<?=$iddm?>" method="post">
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
            <?php
                $delay=200;
                foreach ($listtintuchome as $tintuc) {
                    extract($tintuc);
                    if(strlen($tieude)>50) $tieude=substr($tieude,0,50);
                    if(strlen($noidung)>150) $noidung=substr($noidung,0,150)."...";
                    echo '<div class="col-lg-4 col-md-6">
                            <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                <div class="blog-img-date-wrap mb-25">
                                    <div class="blog-img">
                                        <a href="blog-details.html"><img src="../uploads/tintuc/'.$image.'" alt=""></a>
                                    </div>
                                    <div class="blog-date">
                                        <h5>'.$ngaydang.'</h5>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><a href="#">Furniture</a>,</li>
                                            <li>By:<a href="#"> '.$hovaten.'</a></li>
                                        </ul>
                                    </div>
                                    <h3><a href="blog-details.html">'.$tieude.'</a></h3>
                                    <div class="blog-btn">
                                        <a href="blog-details.html">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $delay+=200;
                }
            ?>
        </div>
    </div>
</div>
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
                                        <input type="text" value="<?=$_SESSION['user']['hovaten']?>">
                                        <input type="hidden" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>" >
                                        <p style="color:red;"><?= isset($hovatenErr) ? ($hovatenErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['sodienthoai']?>">
                                        <input type="hidden" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>" >
                                        <p style="color:red;"><?= isset($sodienthoaiErr) ? ($sodienthoaiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['diachi']?>">
                                        <input type="hidden" name="diachi" value="<?=$_SESSION['user']['diachi']?>" >
                                        <p style="color:red;"><?= isset($diachiErr) ? ($diachiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="checkout-account mt-25">
                                    <input class="checkout-toggle" type="checkbox" name="diachikhac" value="diachimoi">
                                    <span>Giao hàng tới một địa chỉ khác?</span>
                                </div>
                                <div class="different-address open-toggle mt-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? ($hovatennhan) : '' ?>">
                                                <p style="color:red;"><?= isset($hovatennhanErr) ? ($hovatennhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="sodienthoainhan" value="<?= isset($sodienthoainhan) ? ($sodienthoainhan) : '' ?>">
                                                <p style="color:red;"><?= isset($sodienthoainhanErr) ? ($sodienthoainhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="diachinhan" value="<?= isset($diachinhan) ? ($diachinhan) : '' ?>">
                                                <p style="color:red;"><?= isset($diachinhanErr) ? ($diachinhanErr) : '' ?></p>
                                            </div>
                                        </div>
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
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                if(strlen($tensp)>23) $tensp=substr($tensp,0,23)."...";
                                                echo ' <li>'.$tensp.' X '.$soluong.' <span>'.number_format($thanhtien, 0, ',', '.').' ₫</span></li>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p><?=$_SESSION['user']['diachi']?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span id="vnp_thanhcong"><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                        <div class="payment-box payment_method_bacs">
                                            <a href="?act=chuyenkhoanvnp" style="text-decoration:underline; color:blue;">Chuyển hướng tới trang thanh toán</a>
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
                                                echo '<tr class="trgiohang">
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <div class="product-quality">
                                                                <input data-id="'.$id.'" type="hidden"  name="id" value="'.$id.'">
                                                                <input data-id="'.$id.'" type="hidden"  name="idsp" value="'.$idsanpham.'">
                                                                <input type="hidden" name="giakm" value="'.$giakm.'">
                                                                <input data-id="'.$id.'" type="hidden" class="thanhtienjs" name="thanhtien" value="'.$thanhtien.'">
                                                                <div  class="dec qtybutton">-</div>
                                                                <input data-id="'.$id.'" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="'.$soluong.'">
                                                                <div  class="inc qtybutton">+</div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total"><span data-id="'.$id.'">'.number_format($thanhtien, 0, ',', '.').' ₫</span></td>
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
                            <h4>Tổng thanh toán <span id="tongthanhtoan"><?=number_format($tongthanhtoan, 0, ',', '.');?> đ</span></h4>
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
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <nav>
                            <ul class="nav-tab">
                                <li class="active"><a href="#tap1">Tất cả</a></li>
                                <li><a href="#tap2">Chờ xác nhận</a></li>
                                <li><a href="#tap3">Chờ giao hàng</a></li>
                                <li><a href="#tap4">Đang giao</a></li>
                                <li><a href="#tap5">Hoàn thành</a></li>
                                <li><a href="#tap6">Đã hủy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php foreach ($tatca as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="Đã hoàn thành";
                                  else if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php foreach ($choxacnhan as $item) : ?>
                            <?php if($item['trangthai']==0) $item['trangthai']="Chờ xác nhận"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php foreach ($chogiaohang as $item) : ?>
                            <?php if($item['trangthai']==2) $item['trangthai']="Chờ giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php foreach ($danggiao as $item) : ?>
                            <?php if($item['trangthai']==3) $item['trangthai']="Đang giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php foreach ($hoanthanh as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="hoàn thành"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap6" class="card-body p-4 bg-light an">
                        <?php foreach ($dahuy as $item) : ?>
                            <?php if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-details-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            extract($sanpham);
                        ?>
                    <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                                <a href="#">
                                    <img src="../uploads/<?=$image?>" alt="">
                                </a>
                            </div>
                            <div class="product-details-small-img-wrap">
                                <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                            <a style="font-size: 25px" href="?act=chitietsp&id=<?=$id?>"><?=$tensp?></a>
                            <div class="product-details-price">
                                <span class="old-price"><?=number_format($giasp, 0, ',', '.')?>đ</span>
                                <span class="new-price"><?=number_format($giakm, 0, ',', '.')?>đ</span>
                            </div>
                        <?php
                            extract($danhmuc);
                        ?>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span class="title">Category:</span>
                                        <ul>
                                            <li><a href="?act=spdanhmuc&id=<?=$id?>"><?=$tendm?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details-action-wrap">
                                <div class="single-product-cart btn-hover">
                                    <?php
                                        extract($sanpham);
                                    ?>
                                    <button onclick="themgiohang(<?= $id; ?>,<?= $giakm; ?>)" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                                <div class="single-product-cart btn-hover">
                                    <?php if(isset($_SESSION['user'])) : ?>
                                        <form action="?act=chitietsp&id=<?= $id?>" method="post">
                                            <button type="submit" name="datngayct" class="product-action-btn-2 theme-color">Mua ngay</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-area pb-85">
            <div class="container">
                <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                    <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
                    <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
                </div>
                <div class="tab-content">
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-content text-center">
                            <p data-aos="fade-up" data-aos-delay="400"><?=$mota?></p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div id="loadbinhluan" class="review-wrapper">
                            <?php extract($dembl);?>
                            <h3><span id="countbl"><?=$countbl?></span> đánh giá</h3>
                            <?php
                                foreach ($listbl as $bl) {
                                    extract($bl);
                                    echo '<div class="single-review">
                                            <div class="review-img">
                                                <img src="../assets/images/userbl.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h5><span>'.$hovaten.'</span> - '.$ngaybinhluan.'</h5>
                                                <p>'.$noidung.'</p>
                                            </div>
                                        </div>';
                                }
                                ?>
                            
                        </div>
                        <?php if(isset($_SESSION['user'])) : ?>
                                <?php extract($sanpham); ?>
                                    <div class="ratting-form-wrapper">
                                        <div class="ratting-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-15">
                                                            <label>Đánh giá của bạn <span>*</span></label>
                                                            <textarea id="noidung"></textarea>
                                                            <p style="color:red;"><?= $noidungErr; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input id="ngaybinhluan" type="hidden" value="<?= date('Y-m-d'); ?>">
                                                            <button class="btn btn-dark" onclick="binhluanjs(<?= $id ?>,'<?= $_SESSION['user']['hovaten'] ?>')">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                
                <div class="related-product-active swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            foreach($splq as $sp){
                                extract($sp);
                                echo '<div class="swiper-slide">
                                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="?act=chitietsp&id='.$id.'">
                                                    <img src="../uploads/'.$image.'" alt="">
                                                </a>
                                                <div class="product-badge badge-top badge-right badge-pink">
                                                    <span>'.$khuyenmai.'%</span>
                                                </div>
                                                <div class="product-action-2-wrap">
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <input type="hidden" name="tensp" value="'.$tensp.'">
                                                    <input type="hidden" name="image" value="'.$image.'">
                                                    <input type="hidden" name="giasp" value="'.$giakm.'">
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
                        ?>
                    </div>
                </div>
            </div>
        </div>

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
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                    foreach ($list_sp_dm as $sp) {
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
                <?php extract($sp);?>
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=spdanhmuc&id=<?=$iddm?>">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=spdanhmuc&id=<?=$iddm?>" method="post">
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
            <?php
                $delay=200;
                foreach ($listtintuchome as $tintuc) {
                    extract($tintuc);
                    if(strlen($tieude)>50) $tieude=substr($tieude,0,50);
                    if(strlen($noidung)>150) $noidung=substr($noidung,0,150)."...";
                    echo '<div class="col-lg-4 col-md-6">
                            <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                <div class="blog-img-date-wrap mb-25">
                                    <div class="blog-img">
                                        <a href="blog-details.html"><img src="../uploads/tintuc/'.$image.'" alt=""></a>
                                    </div>
                                    <div class="blog-date">
                                        <h5>'.$ngaydang.'</h5>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><a href="#">Furniture</a>,</li>
                                            <li>By:<a href="#"> '.$hovaten.'</a></li>
                                        </ul>
                                    </div>
                                    <h3><a href="blog-details.html">'.$tieude.'</a></h3>
                                    <div class="blog-btn">
                                        <a href="blog-details.html">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $delay+=200;
                }
            ?>
        </div>
    </div>
</div>
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
                                        <input type="text" value="<?=$_SESSION['user']['hovaten']?>">
                                        <input type="hidden" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>" >
                                        <p style="color:red;"><?= isset($hovatenErr) ? ($hovatenErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['sodienthoai']?>">
                                        <input type="hidden" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>" >
                                        <p style="color:red;"><?= isset($sodienthoaiErr) ? ($sodienthoaiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['diachi']?>">
                                        <input type="hidden" name="diachi" value="<?=$_SESSION['user']['diachi']?>" >
                                        <p style="color:red;"><?= isset($diachiErr) ? ($diachiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="checkout-account mt-25">
                                    <input class="checkout-toggle" type="checkbox" name="diachikhac" value="diachimoi">
                                    <span>Giao hàng tới một địa chỉ khác?</span>
                                </div>
                                <div class="different-address open-toggle mt-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? ($hovatennhan) : '' ?>">
                                                <p style="color:red;"><?= isset($hovatennhanErr) ? ($hovatennhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="sodienthoainhan" value="<?= isset($sodienthoainhan) ? ($sodienthoainhan) : '' ?>">
                                                <p style="color:red;"><?= isset($sodienthoainhanErr) ? ($sodienthoainhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="diachinhan" value="<?= isset($diachinhan) ? ($diachinhan) : '' ?>">
                                                <p style="color:red;"><?= isset($diachinhanErr) ? ($diachinhanErr) : '' ?></p>
                                            </div>
                                        </div>
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
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                if(strlen($tensp)>23) $tensp=substr($tensp,0,23)."...";
                                                echo ' <li>'.$tensp.' X '.$soluong.' <span>'.number_format($thanhtien, 0, ',', '.').' ₫</span></li>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p><?=$_SESSION['user']['diachi']?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span id="vnp_thanhcong"><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                        <div class="payment-box payment_method_bacs">
                                            <a href="?act=chuyenkhoanvnp" style="text-decoration:underline; color:blue;">Chuyển hướng tới trang thanh toán</a>
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
                                                echo '<tr class="trgiohang">
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <div class="product-quality">
                                                                <input data-id="'.$id.'" type="hidden"  name="id" value="'.$id.'">
                                                                <input data-id="'.$id.'" type="hidden"  name="idsp" value="'.$idsanpham.'">
                                                                <input type="hidden" name="giakm" value="'.$giakm.'">
                                                                <input data-id="'.$id.'" type="hidden" class="thanhtienjs" name="thanhtien" value="'.$thanhtien.'">
                                                                <div  class="dec qtybutton">-</div>
                                                                <input data-id="'.$id.'" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="'.$soluong.'">
                                                                <div  class="inc qtybutton">+</div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total"><span data-id="'.$id.'">'.number_format($thanhtien, 0, ',', '.').' ₫</span></td>
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
                            <h4>Tổng thanh toán <span id="tongthanhtoan"><?=number_format($tongthanhtoan, 0, ',', '.');?> đ</span></h4>
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
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <nav>
                            <ul class="nav-tab">
                                <li class="active"><a href="#tap1">Tất cả</a></li>
                                <li><a href="#tap2">Chờ xác nhận</a></li>
                                <li><a href="#tap3">Chờ giao hàng</a></li>
                                <li><a href="#tap4">Đang giao</a></li>
                                <li><a href="#tap5">Hoàn thành</a></li>
                                <li><a href="#tap6">Đã hủy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php foreach ($tatca as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="Đã hoàn thành";
                                  else if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php foreach ($choxacnhan as $item) : ?>
                            <?php if($item['trangthai']==0) $item['trangthai']="Chờ xác nhận"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php foreach ($chogiaohang as $item) : ?>
                            <?php if($item['trangthai']==2) $item['trangthai']="Chờ giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php foreach ($danggiao as $item) : ?>
                            <?php if($item['trangthai']==3) $item['trangthai']="Đang giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php foreach ($hoanthanh as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="hoàn thành"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap6" class="card-body p-4 bg-light an">
                        <?php foreach ($dahuy as $item) : ?>
                            <?php if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-details-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            extract($sanpham);
                        ?>
                    <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                                <a href="#">
                                    <img src="../uploads/<?=$image?>" alt="">
                                </a>
                            </div>
                            <div class="product-details-small-img-wrap">
                                <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                            <a style="font-size: 25px" href="?act=chitietsp&id=<?=$id?>"><?=$tensp?></a>
                            <div class="product-details-price">
                                <span class="old-price"><?=number_format($giasp, 0, ',', '.')?>đ</span>
                                <span class="new-price"><?=number_format($giakm, 0, ',', '.')?>đ</span>
                            </div>
                        <?php
                            extract($danhmuc);
                        ?>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span class="title">Category:</span>
                                        <ul>
                                            <li><a href="?act=spdanhmuc&id=<?=$id?>"><?=$tendm?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details-action-wrap">
                                <div class="single-product-cart btn-hover">
                                    <?php
                                        extract($sanpham);
                                    ?>
                                    <button onclick="themgiohang(<?= $id; ?>,<?= $giakm; ?>)" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                                <div class="single-product-cart btn-hover">
                                    <?php if(isset($_SESSION['user'])) : ?>
                                        <form action="?act=chitietsp&id=<?= $id?>" method="post">
                                            <button type="submit" name="datngayct" class="product-action-btn-2 theme-color">Mua ngay</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-area pb-85">
            <div class="container">
                <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                    <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
                    <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
                </div>
                <div class="tab-content">
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-content text-center">
                            <p data-aos="fade-up" data-aos-delay="400"><?=$mota?></p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div id="loadbinhluan" class="review-wrapper">
                            <?php extract($dembl);?>
                            <h3><span id="countbl"><?=$countbl?></span> đánh giá</h3>
                            <?php
                                foreach ($listbl as $bl) {
                                    extract($bl);
                                    echo '<div class="single-review">
                                            <div class="review-img">
                                                <img src="../assets/images/userbl.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h5><span>'.$hovaten.'</span> - '.$ngaybinhluan.'</h5>
                                                <p>'.$noidung.'</p>
                                            </div>
                                        </div>';
                                }
                                ?>
                            
                        </div>
                        <?php if(isset($_SESSION['user'])) : ?>
                                <?php extract($sanpham); ?>
                                    <div class="ratting-form-wrapper">
                                        <div class="ratting-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-15">
                                                            <label>Đánh giá của bạn <span>*</span></label>
                                                            <textarea id="noidung"></textarea>
                                                            <p style="color:red;"><?= $noidungErr; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input id="ngaybinhluan" type="hidden" value="<?= date('Y-m-d'); ?>">
                                                            <button class="btn btn-dark" onclick="binhluanjs(<?= $id ?>,'<?= $_SESSION['user']['hovaten'] ?>')">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                
                <div class="related-product-active swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            foreach($splq as $sp){
                                extract($sp);
                                echo '<div class="swiper-slide">
                                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="?act=chitietsp&id='.$id.'">
                                                    <img src="../uploads/'.$image.'" alt="">
                                                </a>
                                                <div class="product-badge badge-top badge-right badge-pink">
                                                    <span>'.$khuyenmai.'%</span>
                                                </div>
                                                <div class="product-action-2-wrap">
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <input type="hidden" name="tensp" value="'.$tensp.'">
                                                    <input type="hidden" name="image" value="'.$image.'">
                                                    <input type="hidden" name="giasp" value="'.$giakm.'">
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
                        ?>
                    </div>
                </div>
            </div>
        </div>

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
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                    foreach ($list_sp_dm as $sp) {
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
                <?php extract($sp);?>
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=spdanhmuc&id=<?=$iddm?>">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=spdanhmuc&id=<?=$iddm?>" method="post">
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
            <?php
                $delay=200;
                foreach ($listtintuchome as $tintuc) {
                    extract($tintuc);
                    if(strlen($tieude)>50) $tieude=substr($tieude,0,50);
                    if(strlen($noidung)>150) $noidung=substr($noidung,0,150)."...";
                    echo '<div class="col-lg-4 col-md-6">
                            <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                <div class="blog-img-date-wrap mb-25">
                                    <div class="blog-img">
                                        <a href="blog-details.html"><img src="../uploads/tintuc/'.$image.'" alt=""></a>
                                    </div>
                                    <div class="blog-date">
                                        <h5>'.$ngaydang.'</h5>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><a href="#">Furniture</a>,</li>
                                            <li>By:<a href="#"> '.$hovaten.'</a></li>
                                        </ul>
                                    </div>
                                    <h3><a href="blog-details.html">'.$tieude.'</a></h3>
                                    <div class="blog-btn">
                                        <a href="blog-details.html">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $delay+=200;
                }
            ?>
        </div>
    </div>
</div>
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
                                        <input type="text" value="<?=$_SESSION['user']['hovaten']?>">
                                        <input type="hidden" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>" >
                                        <p style="color:red;"><?= isset($hovatenErr) ? ($hovatenErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['sodienthoai']?>">
                                        <input type="hidden" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>" >
                                        <p style="color:red;"><?= isset($sodienthoaiErr) ? ($sodienthoaiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['diachi']?>">
                                        <input type="hidden" name="diachi" value="<?=$_SESSION['user']['diachi']?>" >
                                        <p style="color:red;"><?= isset($diachiErr) ? ($diachiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="checkout-account mt-25">
                                    <input class="checkout-toggle" type="checkbox" name="diachikhac" value="diachimoi">
                                    <span>Giao hàng tới một địa chỉ khác?</span>
                                </div>
                                <div class="different-address open-toggle mt-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? ($hovatennhan) : '' ?>">
                                                <p style="color:red;"><?= isset($hovatennhanErr) ? ($hovatennhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="sodienthoainhan" value="<?= isset($sodienthoainhan) ? ($sodienthoainhan) : '' ?>">
                                                <p style="color:red;"><?= isset($sodienthoainhanErr) ? ($sodienthoainhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="diachinhan" value="<?= isset($diachinhan) ? ($diachinhan) : '' ?>">
                                                <p style="color:red;"><?= isset($diachinhanErr) ? ($diachinhanErr) : '' ?></p>
                                            </div>
                                        </div>
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
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                if(strlen($tensp)>23) $tensp=substr($tensp,0,23)."...";
                                                echo ' <li>'.$tensp.' X '.$soluong.' <span>'.number_format($thanhtien, 0, ',', '.').' ₫</span></li>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p><?=$_SESSION['user']['diachi']?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span id="vnp_thanhcong"><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                        <div class="payment-box payment_method_bacs">
                                            <a href="?act=chuyenkhoanvnp" style="text-decoration:underline; color:blue;">Chuyển hướng tới trang thanh toán</a>
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
                                                echo '<tr class="trgiohang">
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <div class="product-quality">
                                                                <input data-id="'.$id.'" type="hidden"  name="id" value="'.$id.'">
                                                                <input data-id="'.$id.'" type="hidden"  name="idsp" value="'.$idsanpham.'">
                                                                <input type="hidden" name="giakm" value="'.$giakm.'">
                                                                <input data-id="'.$id.'" type="hidden" class="thanhtienjs" name="thanhtien" value="'.$thanhtien.'">
                                                                <div  class="dec qtybutton">-</div>
                                                                <input data-id="'.$id.'" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="'.$soluong.'">
                                                                <div  class="inc qtybutton">+</div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total"><span data-id="'.$id.'">'.number_format($thanhtien, 0, ',', '.').' ₫</span></td>
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
                            <h4>Tổng thanh toán <span id="tongthanhtoan"><?=number_format($tongthanhtoan, 0, ',', '.');?> đ</span></h4>
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
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <nav>
                            <ul class="nav-tab">
                                <li class="active"><a href="#tap1">Tất cả</a></li>
                                <li><a href="#tap2">Chờ xác nhận</a></li>
                                <li><a href="#tap3">Chờ giao hàng</a></li>
                                <li><a href="#tap4">Đang giao</a></li>
                                <li><a href="#tap5">Hoàn thành</a></li>
                                <li><a href="#tap6">Đã hủy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php foreach ($tatca as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="Đã hoàn thành";
                                  else if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php foreach ($choxacnhan as $item) : ?>
                            <?php if($item['trangthai']==0) $item['trangthai']="Chờ xác nhận"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php foreach ($chogiaohang as $item) : ?>
                            <?php if($item['trangthai']==2) $item['trangthai']="Chờ giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php foreach ($danggiao as $item) : ?>
                            <?php if($item['trangthai']==3) $item['trangthai']="Đang giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php foreach ($hoanthanh as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="hoàn thành"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap6" class="card-body p-4 bg-light an">
                        <?php foreach ($dahuy as $item) : ?>
                            <?php if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-details-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            extract($sanpham);
                        ?>
                    <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                                <a href="#">
                                    <img src="../uploads/<?=$image?>" alt="">
                                </a>
                            </div>
                            <div class="product-details-small-img-wrap">
                                <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                            <a style="font-size: 25px" href="?act=chitietsp&id=<?=$id?>"><?=$tensp?></a>
                            <div class="product-details-price">
                                <span class="old-price"><?=number_format($giasp, 0, ',', '.')?>đ</span>
                                <span class="new-price"><?=number_format($giakm, 0, ',', '.')?>đ</span>
                            </div>
                        <?php
                            extract($danhmuc);
                        ?>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span class="title">Category:</span>
                                        <ul>
                                            <li><a href="?act=spdanhmuc&id=<?=$id?>"><?=$tendm?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details-action-wrap">
                                <div class="single-product-cart btn-hover">
                                    <?php
                                        extract($sanpham);
                                    ?>
                                    <button onclick="themgiohang(<?= $id; ?>,<?= $giakm; ?>)" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                                <div class="single-product-cart btn-hover">
                                    <?php if(isset($_SESSION['user'])) : ?>
                                        <form action="?act=chitietsp&id=<?= $id?>" method="post">
                                            <button type="submit" name="datngayct" class="product-action-btn-2 theme-color">Mua ngay</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-area pb-85">
            <div class="container">
                <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                    <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
                    <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
                </div>
                <div class="tab-content">
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-content text-center">
                            <p data-aos="fade-up" data-aos-delay="400"><?=$mota?></p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div id="loadbinhluan" class="review-wrapper">
                            <?php extract($dembl);?>
                            <h3><span id="countbl"><?=$countbl?></span> đánh giá</h3>
                            <?php
                                foreach ($listbl as $bl) {
                                    extract($bl);
                                    echo '<div class="single-review">
                                            <div class="review-img">
                                                <img src="../assets/images/userbl.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h5><span>'.$hovaten.'</span> - '.$ngaybinhluan.'</h5>
                                                <p>'.$noidung.'</p>
                                            </div>
                                        </div>';
                                }
                                ?>
                            
                        </div>
                        <?php if(isset($_SESSION['user'])) : ?>
                                <?php extract($sanpham); ?>
                                    <div class="ratting-form-wrapper">
                                        <div class="ratting-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-15">
                                                            <label>Đánh giá của bạn <span>*</span></label>
                                                            <textarea id="noidung"></textarea>
                                                            <p style="color:red;"><?= $noidungErr; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input id="ngaybinhluan" type="hidden" value="<?= date('Y-m-d'); ?>">
                                                            <button class="btn btn-dark" onclick="binhluanjs(<?= $id ?>,'<?= $_SESSION['user']['hovaten'] ?>')">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                
                <div class="related-product-active swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            foreach($splq as $sp){
                                extract($sp);
                                echo '<div class="swiper-slide">
                                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="?act=chitietsp&id='.$id.'">
                                                    <img src="../uploads/'.$image.'" alt="">
                                                </a>
                                                <div class="product-badge badge-top badge-right badge-pink">
                                                    <span>'.$khuyenmai.'%</span>
                                                </div>
                                                <div class="product-action-2-wrap">
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <input type="hidden" name="tensp" value="'.$tensp.'">
                                                    <input type="hidden" name="image" value="'.$image.'">
                                                    <input type="hidden" name="giasp" value="'.$giakm.'">
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
                        ?>
                    </div>
                </div>
            </div>
        </div>

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
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                    foreach ($list_sp_dm as $sp) {
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
                <?php extract($sp);?>
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=spdanhmuc&id=<?=$iddm?>">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=spdanhmuc&id=<?=$iddm?>" method="post">
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
            <?php
                $delay=200;
                foreach ($listtintuchome as $tintuc) {
                    extract($tintuc);
                    if(strlen($tieude)>50) $tieude=substr($tieude,0,50);
                    if(strlen($noidung)>150) $noidung=substr($noidung,0,150)."...";
                    echo '<div class="col-lg-4 col-md-6">
                            <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                <div class="blog-img-date-wrap mb-25">
                                    <div class="blog-img">
                                        <a href="blog-details.html"><img src="../uploads/tintuc/'.$image.'" alt=""></a>
                                    </div>
                                    <div class="blog-date">
                                        <h5>'.$ngaydang.'</h5>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><a href="#">Furniture</a>,</li>
                                            <li>By:<a href="#"> '.$hovaten.'</a></li>
                                        </ul>
                                    </div>
                                    <h3><a href="blog-details.html">'.$tieude.'</a></h3>
                                    <div class="blog-btn">
                                        <a href="blog-details.html">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $delay+=200;
                }
            ?>
        </div>
    </div>
</div>
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
                                        <input type="text" value="<?=$_SESSION['user']['hovaten']?>">
                                        <input type="hidden" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>" >
                                        <p style="color:red;"><?= isset($hovatenErr) ? ($hovatenErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['sodienthoai']?>">
                                        <input type="hidden" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>" >
                                        <p style="color:red;"><?= isset($sodienthoaiErr) ? ($sodienthoaiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['diachi']?>">
                                        <input type="hidden" name="diachi" value="<?=$_SESSION['user']['diachi']?>" >
                                        <p style="color:red;"><?= isset($diachiErr) ? ($diachiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="checkout-account mt-25">
                                    <input class="checkout-toggle" type="checkbox" name="diachikhac" value="diachimoi">
                                    <span>Giao hàng tới một địa chỉ khác?</span>
                                </div>
                                <div class="different-address open-toggle mt-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? ($hovatennhan) : '' ?>">
                                                <p style="color:red;"><?= isset($hovatennhanErr) ? ($hovatennhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="sodienthoainhan" value="<?= isset($sodienthoainhan) ? ($sodienthoainhan) : '' ?>">
                                                <p style="color:red;"><?= isset($sodienthoainhanErr) ? ($sodienthoainhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="diachinhan" value="<?= isset($diachinhan) ? ($diachinhan) : '' ?>">
                                                <p style="color:red;"><?= isset($diachinhanErr) ? ($diachinhanErr) : '' ?></p>
                                            </div>
                                        </div>
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
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                if(strlen($tensp)>23) $tensp=substr($tensp,0,23)."...";
                                                echo ' <li>'.$tensp.' X '.$soluong.' <span>'.number_format($thanhtien, 0, ',', '.').' ₫</span></li>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p><?=$_SESSION['user']['diachi']?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span id="vnp_thanhcong"><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                        <div class="payment-box payment_method_bacs">
                                            <a href="?act=chuyenkhoanvnp" style="text-decoration:underline; color:blue;">Chuyển hướng tới trang thanh toán</a>
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
                                                echo '<tr class="trgiohang">
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <div class="product-quality">
                                                                <input data-id="'.$id.'" type="hidden"  name="id" value="'.$id.'">
                                                                <input data-id="'.$id.'" type="hidden"  name="idsp" value="'.$idsanpham.'">
                                                                <input type="hidden" name="giakm" value="'.$giakm.'">
                                                                <input data-id="'.$id.'" type="hidden" class="thanhtienjs" name="thanhtien" value="'.$thanhtien.'">
                                                                <div  class="dec qtybutton">-</div>
                                                                <input data-id="'.$id.'" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="'.$soluong.'">
                                                                <div  class="inc qtybutton">+</div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total"><span data-id="'.$id.'">'.number_format($thanhtien, 0, ',', '.').' ₫</span></td>
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
                            <h4>Tổng thanh toán <span id="tongthanhtoan"><?=number_format($tongthanhtoan, 0, ',', '.');?> đ</span></h4>
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
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <nav>
                            <ul class="nav-tab">
                                <li class="active"><a href="#tap1">Tất cả</a></li>
                                <li><a href="#tap2">Chờ xác nhận</a></li>
                                <li><a href="#tap3">Chờ giao hàng</a></li>
                                <li><a href="#tap4">Đang giao</a></li>
                                <li><a href="#tap5">Hoàn thành</a></li>
                                <li><a href="#tap6">Đã hủy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php foreach ($tatca as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="Đã hoàn thành";
                                  else if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php foreach ($choxacnhan as $item) : ?>
                            <?php if($item['trangthai']==0) $item['trangthai']="Chờ xác nhận"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php foreach ($chogiaohang as $item) : ?>
                            <?php if($item['trangthai']==2) $item['trangthai']="Chờ giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php foreach ($danggiao as $item) : ?>
                            <?php if($item['trangthai']==3) $item['trangthai']="Đang giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php foreach ($hoanthanh as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="hoàn thành"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap6" class="card-body p-4 bg-light an">
                        <?php foreach ($dahuy as $item) : ?>
                            <?php if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="product-details-area pb-100 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                            extract($sanpham);
                        ?>
                    <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                                <a href="#">
                                    <img src="../uploads/<?=$image?>" alt="">
                                </a>
                            </div>
                            <div class="product-details-small-img-wrap">
                                <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                            <a style="font-size: 25px" href="?act=chitietsp&id=<?=$id?>"><?=$tensp?></a>
                            <div class="product-details-price">
                                <span class="old-price"><?=number_format($giasp, 0, ',', '.')?>đ</span>
                                <span class="new-price"><?=number_format($giakm, 0, ',', '.')?>đ</span>
                            </div>
                        <?php
                            extract($danhmuc);
                        ?>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span class="title">Category:</span>
                                        <ul>
                                            <li><a href="?act=spdanhmuc&id=<?=$id?>"><?=$tendm?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-details-action-wrap">
                                <div class="single-product-cart btn-hover">
                                    <?php
                                        extract($sanpham);
                                    ?>
                                    <button onclick="themgiohang(<?= $id; ?>,<?= $giakm; ?>)" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                                <div class="single-product-cart btn-hover">
                                    <?php if(isset($_SESSION['user'])) : ?>
                                        <form action="?act=chitietsp&id=<?= $id?>" method="post">
                                            <button type="submit" name="datngayct" class="product-action-btn-2 theme-color">Mua ngay</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-area pb-85">
            <div class="container">
                <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                    <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
                    <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
                </div>
                <div class="tab-content">
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-content text-center">
                            <p data-aos="fade-up" data-aos-delay="400"><?=$mota?></p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div id="loadbinhluan" class="review-wrapper">
                            <?php extract($dembl);?>
                            <h3><span id="countbl"><?=$countbl?></span> đánh giá</h3>
                            <?php
                                foreach ($listbl as $bl) {
                                    extract($bl);
                                    echo '<div class="single-review">
                                            <div class="review-img">
                                                <img src="../assets/images/userbl.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h5><span>'.$hovaten.'</span> - '.$ngaybinhluan.'</h5>
                                                <p>'.$noidung.'</p>
                                            </div>
                                        </div>';
                                }
                                ?>
                            
                        </div>
                        <?php if(isset($_SESSION['user'])) : ?>
                                <?php extract($sanpham); ?>
                                    <div class="ratting-form-wrapper">
                                        <div class="ratting-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style mb-15">
                                                            <label>Đánh giá của bạn <span>*</span></label>
                                                            <textarea id="noidung"></textarea>
                                                            <p style="color:red;"><?= $noidungErr; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input id="ngaybinhluan" type="hidden" value="<?= date('Y-m-d'); ?>">
                                                            <button class="btn btn-dark" onclick="binhluanjs(<?= $id ?>,'<?= $_SESSION['user']['hovaten'] ?>')">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product-area pb-95">
            <div class="container">
                <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                
                <div class="related-product-active swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            foreach($splq as $sp){
                                extract($sp);
                                echo '<div class="swiper-slide">
                                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="?act=chitietsp&id='.$id.'">
                                                    <img src="../uploads/'.$image.'" alt="">
                                                </a>
                                                <div class="product-badge badge-top badge-right badge-pink">
                                                    <span>'.$khuyenmai.'%</span>
                                                </div>
                                                <div class="product-action-2-wrap">
                                                    <input type="hidden" name="id" value="'.$id.'">
                                                    <input type="hidden" name="tensp" value="'.$tensp.'">
                                                    <input type="hidden" name="image" value="'.$image.'">
                                                    <input type="hidden" name="giasp" value="'.$giakm.'">
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
                        ?>
                    </div>
                </div>
            </div>
        </div>

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
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                    foreach ($list_sp_dm as $sp) {
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
                <?php extract($sp);?>
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=spdanhmuc&id=<?=$iddm?>">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=spdanhmuc&id=<?=$iddm?>" method="post">
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
            <?php
                $delay=200;
                foreach ($listtintuchome as $tintuc) {
                    extract($tintuc);
                    if(strlen($tieude)>50) $tieude=substr($tieude,0,50);
                    if(strlen($noidung)>150) $noidung=substr($noidung,0,150)."...";
                    echo '<div class="col-lg-4 col-md-6">
                            <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                <div class="blog-img-date-wrap mb-25">
                                    <div class="blog-img">
                                        <a href="blog-details.html"><img src="../uploads/tintuc/'.$image.'" alt=""></a>
                                    </div>
                                    <div class="blog-date">
                                        <h5>'.$ngaydang.'</h5>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><a href="#">Furniture</a>,</li>
                                            <li>By:<a href="#"> '.$hovaten.'</a></li>
                                        </ul>
                                    </div>
                                    <h3><a href="blog-details.html">'.$tieude.'</a></h3>
                                    <div class="blog-btn">
                                        <a href="blog-details.html">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $delay+=200;
                }
            ?>
        </div>
    </div>
</div>
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
                                        <input type="text" value="<?=$_SESSION['user']['hovaten']?>">
                                        <input type="hidden" name="hovaten" value="<?=$_SESSION['user']['hovaten']?>" >
                                        <p style="color:red;"><?= isset($hovatenErr) ? ($hovatenErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['sodienthoai']?>">
                                        <input type="hidden" name="sodienthoai" value="<?=$_SESSION['user']['sodienthoai']?>" >
                                        <p style="color:red;"><?= isset($sodienthoaiErr) ? ($sodienthoaiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?=$_SESSION['user']['diachi']?>">
                                        <input type="hidden" name="diachi" value="<?=$_SESSION['user']['diachi']?>" >
                                        <p style="color:red;"><?= isset($diachiErr) ? ($diachiErr) : '' ?></p>
                                    </div>
                                </div>
                                <div class="checkout-account mt-25">
                                    <input class="checkout-toggle" type="checkbox" name="diachikhac" value="diachimoi">
                                    <span>Giao hàng tới một địa chỉ khác?</span>
                                </div>
                                <div class="different-address open-toggle mt-30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? ($hovatennhan) : '' ?>">
                                                <p style="color:red;"><?= isset($hovatennhanErr) ? ($hovatennhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="sodienthoainhan" value="<?= isset($sodienthoainhan) ? ($sodienthoainhan) : '' ?>">
                                                <p style="color:red;"><?= isset($sodienthoainhanErr) ? ($sodienthoainhanErr) : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="diachinhan" value="<?= isset($diachinhan) ? ($diachinhan) : '' ?>">
                                                <p style="color:red;"><?= isset($diachinhanErr) ? ($diachinhanErr) : '' ?></p>
                                            </div>
                                        </div>
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
                                            foreach ($listgh as $giohang) {
                                                extract($giohang);
                                                if(strlen($tensp)>23) $tensp=substr($tensp,0,23)."...";
                                                echo ' <li>'.$tensp.' X '.$soluong.' <span>'.number_format($thanhtien, 0, ',', '.').' ₫</span></li>';
                                                $tongthanhtoan+=$thanhtien;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Thông tin <p><?=$_SESSION['user']['diachi']?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền <span id="vnp_thanhcong"><?=number_format($tongthanhtoan, 0, ',', '.')?>đ</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="phuongthuctt" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="phuongthuctt">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                        <div class="payment-box payment_method_bacs">
                                            <a href="?act=chuyenkhoanvnp" style="text-decoration:underline; color:blue;">Chuyển hướng tới trang thanh toán</a>
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
                                                echo '<tr class="trgiohang">
                                                        <td class="product-thumbnail">
                                                            <a href="?act=chitietsp&id='.$idsanpham.'"><img src="../uploads/'.$image.'" alt=""></a>
                                                        </td>
                                                        <td class="product-name">
                                                            <h5><a href="?act=chitietsp&id='.$idsanpham.'">'.$tensp.'</a></h5>
                                                        </td>
                                                        <td class="product-cart-price"><span class="amount">'.number_format($giakm, 0, ',', '.').'₫</span></td>
                                                        <td class="cart-quality">
                                                            <div class="product-quality">
                                                                <input data-id="'.$id.'" type="hidden"  name="id" value="'.$id.'">
                                                                <input data-id="'.$id.'" type="hidden"  name="idsp" value="'.$idsanpham.'">
                                                                <input type="hidden" name="giakm" value="'.$giakm.'">
                                                                <input data-id="'.$id.'" type="hidden" class="thanhtienjs" name="thanhtien" value="'.$thanhtien.'">
                                                                <div  class="dec qtybutton">-</div>
                                                                <input data-id="'.$id.'" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="'.$soluong.'">
                                                                <div  class="inc qtybutton">+</div>
                                                            </div>
                                                        </td>
                                                        <td class="product-total"><span data-id="'.$id.'">'.number_format($thanhtien, 0, ',', '.').' ₫</span></td>
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
                            <h4>Tổng thanh toán <span id="tongthanhtoan"><?=number_format($tongthanhtoan, 0, ',', '.');?> đ</span></h4>
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
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <nav>
                            <ul class="nav-tab">
                                <li class="active"><a href="#tap1">Tất cả</a></li>
                                <li><a href="#tap2">Chờ xác nhận</a></li>
                                <li><a href="#tap3">Chờ giao hàng</a></li>
                                <li><a href="#tap4">Đang giao</a></li>
                                <li><a href="#tap5">Hoàn thành</a></li>
                                <li><a href="#tap6">Đã hủy</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php foreach ($tatca as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="Đã hoàn thành";
                                  else if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php foreach ($choxacnhan as $item) : ?>
                            <?php if($item['trangthai']==0) $item['trangthai']="Chờ xác nhận"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php foreach ($chogiaohang as $item) : ?>
                            <?php if($item['trangthai']==2) $item['trangthai']="Chờ giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <a style="float: right;" href="?act=huydonhang&id=<?= $item['id'];?>">Hủy đơn hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php foreach ($danggiao as $item) : ?>
                            <?php if($item['trangthai']==3) $item['trangthai']="Đang giao hàng"; ?>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php foreach ($hoanthanh as $item) : ?>
                            <?php if($item['trangthai']==4) $item['trangthai']="hoàn thành"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                    <div id="tap6" class="card-body p-4 bg-light an">
                        <?php foreach ($dahuy as $item) : ?>
                            <?php if($item['trangthai']==5) $item['trangthai']="Đã hủy"; ?>
                        <form action="?act=lichsumuahang" method="post">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach (load_all_ctdh_lsmh($item['id']) as $ctdh) : ?>
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $ctdh['image'];?>" class="img-fluid" alt="Err">
                                            </div>
                                            <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <a style="font-size:20px" class="text-muted mb-0"><?= $ctdh['tensp'];?></a>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">Số lượng: <?= $ctdh['soluong'];?></p>
                                            </div>
                                            <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: <?= number_format($ctdh['thanhtien'], 0, ',', '.');?>đ</p>
                                            </div>
                                            <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                            <input type="checkbox" name="id[]" value="<?= $ctdh['idsp']; ?>" hidden checked>
                                            <input type="hidden" name="giasp" value="<?= $ctdh['dongia'];?>">
                                        <?php endforeach; ?>

                                        <div style="display: inline-block;" class="row align-items-center">
                                            <div class="col-md-2">
                                                <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;"><?= $item['trangthai'];?></span></p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                            <h3>Mã hóa đơn: DCM-<?= $item['id'];?></h3>
                                        </div>
                                        <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update btn-hover">
                                                <button style="margin-left:500px;" class="btn btn-danger" type="submit" name="mualai">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
