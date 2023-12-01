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
                            </ul>
                        </nav>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <?php
                            foreach ($tatca as $tatcaitem) {
                                extract($tatcaitem);
                                if($trangthai==4) $trangthai="Đã hoàn thành";
                                else if($trangthai==5) $trangthai="Đã hủy";
                                echo '<div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="../uploads/'.$image.'" class="img-fluid" alt="Err">
                                                </div>
                                                <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <a style="font-size:20px" class="text-muted mb-0">'.$tensp.'</a>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Số lượng: '.$soluong.'</p>
                                                </div>
                                                <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                    <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: '.number_format($thanhtien, 0, ',', '.').'đ</p>
                                                </div>
                                                <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                                <div style="display: inline-block;" class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;">'.$trangthai.'</span></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                                    <h3>Mã hóa đơn: DCM-'.$iddh.'</h3>
                                                </div>
                                                <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                                    <div class="cart-shiping-update btn-hover">
                                                        <a style="float: right;" href="?act=chitietsp&id='.$idsp.'">Mua lại</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div id="tap2" class="card-body p-4 bg-light an">
                        <?php
                            foreach ($choxacnhan as $choxacnhanitem) {
                                extract($choxacnhanitem);
                                echo '<div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="../uploads/'.$image.'" class="img-fluid" alt="Phone">
                                                </div>
                                                <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <a style="font-size:20px" class="text-muted mb-0">'.$tensp.'</a>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Số lượng: '.$soluong.'</p>
                                                </div>
                                                <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                    <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: '.number_format($thanhtien, 0, ',', '.').'đ</p>
                                                </div>
                                                <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                                <div style="display: inline-block;" class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;">Chờ xác nhận</span></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                                    <h3>Mã hóa đơn: DCM-'.$iddh.'</h3>
                                                </div>
                                                <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                                    <div class="cart-shiping-update btn-hover">
                                                        <form style="float: right;" action="?act=huydonhang" method="post">
                                                            <input type="hidden" name="iddh" value="'.$iddh.'">
                                                            <input type="hidden" name="idct" value="'.$id.'">
                                                            <button type="submit" name="huydonhang" class="btn btn-secondary">Hủy đơn hàng</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div id="tap3" class="card-body p-4 bg-light an">
                        <?php
                            foreach ($chogiaohang as $chogiaohangitem) {
                                extract($chogiaohangitem);
                                echo '<div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="../uploads/'.$image.'" class="img-fluid" alt="Phone">
                                                </div>
                                                <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <a style="font-size:20px" class="text-muted mb-0">'.$tensp.'</a>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Số lượng: '.$soluong.'</p>
                                                </div>
                                                <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                    <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: '.number_format($thanhtien, 0, ',', '.').'đ</p>
                                                </div>
                                                <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                                <div style="display: inline-block;" class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;">Chờ lấy hàng</span></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                                    <h3>Mã hóa đơn: DCM-'.$iddh.'</h3>
                                                </div>
                                                <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                                    <div class="cart-shiping-update btn-hover">
                                                        <form style="float: right;" action="?act=huydonhang" method="post">
                                                            <input type="hidden" name="iddh" value="'.$iddh.'">
                                                            <input type="hidden" name="idct" value="'.$id.'">
                                                            <button type="submit" name="huydonhang" class="btn btn-secondary">Hủy đơn hàng</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div id="tap4" class="card-body p-4 bg-light an">
                        <?php
                            foreach ($danggiao as $danggiaoitem) {
                                extract($danggiaoitem);
                                echo '<div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="../uploads/'.$image.'" class="img-fluid" alt="Phone">
                                                </div>
                                                <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <a style="font-size:20px" class="text-muted mb-0">'.$tensp.'</a>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Số lượng: '.$soluong.'</p>
                                                </div>
                                                <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                    <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: '.number_format($thanhtien, 0, ',', '.').'đ</p>
                                                </div>
                                                <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                                <div style="display: inline-block;" class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;">Đang giao hàng</span></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                                    <h3>Mã hóa đơn: DCM-'.$iddh.'</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div id="tap5" class="card-body p-4 bg-light an">
                        <?php
                            foreach ($hoanthanh as $hoanthanhitem) {
                                extract($hoanthanhitem);
                                echo '<div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="../uploads/'.$image.'" class="img-fluid" alt="Phone">
                                                </div>
                                                <div style="width: 40.666667%;" class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <a style="font-size:20px" class="text-muted mb-0">'.$tensp.'</a>
                                                </div>
                                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                    <p class="text-muted mb-0 small">Số lượng: '.$soluong.'</p>
                                                </div>
                                                <div style="width: 22%; display: flex;" class="col-md-2 text-center justify-content-center align-items-center">
                                                    <p style="font-size: 18px;" class="text-muted mb-0">Tổng tiền: '.number_format($thanhtien, 0, ',', '.').'đ</p>
                                                </div>
                                                <hr class="mb-4 mt-2" style="background-color: #e0e0e0; opacity: 1;">
                                                <div style="display: inline-block;" class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <p style="width: 500px;" class="text-muted mb-0 small">Trạng thái: <span style="color:#2ecc71;">Đã giao</span></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px; width: 40%;" class="mb-1">
                                                    <h3>Mã hóa đơn: DCM-'.$iddh.'</h3>
                                                </div>
                                                <div style="display: inline-block; padding: 0px; width: 56.5%;" class="cart-shiping-update-wrapper">
                                                    <div class="cart-shiping-update btn-hover">
                                                        <a style="float: right;" href="?act=chitietsp&id='.$idsp.'">Mua lại</a>
                                                    </div>
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
    </div>
</section>