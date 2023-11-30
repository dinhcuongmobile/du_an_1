 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Duyệt đơn hàng</h1>
    <form action="?act=dagiao" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
                <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                <div class="float-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Số lượng</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listdh as $dh) {
                                extract($dh);
                                if($trangthai==4) $trangthai="Đã giao !";
                                echo '<tr>
                                        <td class="text-center align-middle"><input type="checkbox" name="select[]" id="" value="'.$iddh.'"></td>
                                        <td class="col-1 align-middle">DCM-'.$iddh.'</td>
                                        <td class="col-3 align-middle">
                                            '.$hovatennhan.' <br>
                                            '.$sodienthoainhan.' <br>
                                            '.$email.' <br>
                                            '.$diachinhan.'
                                        </td>
                                        <td class="text-center align-middle">'.$soluongct.'</td>
                                        <td  class="col-2 align-middle">'.number_format($thanhtien, 0, ',', '.').'₫</td>
                                        <td  class="col-2 align-middle">'.$trangthai.'</td>
                                        <td class="col-2 align-middle">'.$ngaydathang.'</td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->