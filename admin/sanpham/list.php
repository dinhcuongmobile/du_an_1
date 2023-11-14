<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách sản phẩm</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
            <a href="?act=addsp"><button class="btn btn-secondary btn-sm">Nhập thêm</button></a>
            <form action="?act=listsp" class="float-right" method="post">
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
                            <th>Mã loại</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Số lượng</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listsp as $sp) {
                            extract($sp);
                            echo '<tr>
                                    <td class="align-middle text-center"><input type="checkbox" name="select" id=""></td>
                                    <td class=" align-middle text-center">'.$id.'</td>
                                    <td class="col-3 align-middle">'.$tensp.'</td>
                                    <td class="col-2 align-middle">'.$giasp.' VND</td>
                                    <td  class="col-1 align-middle"><img src="../view/images/'.$image.'" alt="err" height="60px"></td>
                                    <td  class="col-1 align-middle">'.$soluong.'</td>
                                    <td  class="col-1 align-middle">'.$tendm.'</td>
                                    <td class="col-1 align-middle">'.$trangthai.'</td>
                                    <td class="col-2 align-middle"><a href="?act=updatesp&id='.$id.'"><button class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                        <a href="?act=xoasp&id='.$id.'"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
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