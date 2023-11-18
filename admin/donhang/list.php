 <!-- Begin Page Content -->
 <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
                            <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
                            <button class="btn btn-secondary btn-sm">Hủy các đơn đã chọn</button>
                            <form action="?act=listdh" method="post" class="float-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="search">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listdh as $dh) {
                                            extract($dh);
                                            if($trangthai==0) $trangthai="Đang chờ duyệt !";
                                            else $trangthai="Đã duyệt đơn !";
                                            echo '<tr>
                                                    <td class="text-center align-middle"><input type="checkbox" name="select" id=""></td>
                                                    <td class="col-1 align-middle">DCM-'.$id.'</td>
                                                    <td class="col-3 align-middle">
                                                        '.$tendangnhap.' <br>
                                                        '.$sodienthoai.' <br>
                                                        '.$email.' <br>
                                                        '.$diachi.'
                                                    </td>
                                                    <td class="text-center align-middle">1</td>
                                                    <td  class="col-2 align-middle">'.$tongtien.' VND</td>
                                                    <td  class="col-2 align-middle">'.$trangthai.'</td>
                                                    <td class="col-2 align-middle">'.$ngaydathang.'</td>
                                                    <td class="col-2 align-middle"><a href="?act=suadh&id='.$id.'"><button class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                                        <a href="?act=xoadh&id='.$id.'"><button class="btn btn-secondary btn-sm">Hủy</button></a></td>
                                                </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->