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