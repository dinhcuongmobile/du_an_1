<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách bình luận</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
            <form action="" class="float-right">
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
                            <th>Mã tài khoản</th>
                            <th>Họ và Tên</th>
                            <th>Sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><input type="checkbox" name="select" id=""></td>
                            <td class="col-1 align-middle">1</td>
                            <td class="col-2 align-middle">Nguyễn Văn Cường</td>
                            <td class="col-3 align-middle">OPPO Reno10 5G 8GB 256GB</td>
                            <td  class="col-3 align-middle">Nhìn như cứt mà cũng đòi bán dẹp đi</td>
                            <td class="col-1 align-middle">27/07/2004</td>
                            <td class="col-1 align-middle"><a href="?act=xoabl"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><input type="checkbox" name="select" id=""></td>
                            <td class="col-1 align-middle">2</td>
                            <td class="col-2 align-middle">Nguyễn Thiện Giáp</td>
                            <td class="col-3 align-middle">IP15 promax gold 256GB</td>
                            <td  class="col-3 align-middle">Dùng ok lắm shop hứa sẽ quay lại ủng hộ thêm hihi</td>
                            <td class="col-1 align-middle">27/07/2004</td>
                            <td class="col-1 align-middle"><a href="?act=xoabl"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->