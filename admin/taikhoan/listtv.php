 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
            <a href="?act=addtk"><button class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                            <th>STT</th>
                            <th>Họ và Tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center"><input type="checkbox" name="select" id=""></td>
                            <td class="align-middle text-center">1</td>
                            <td class="col-2 align-middle">Nguyễn Văn Cường</td>
                            <td class="col-1 align-middle">adepzai123</td>
                            <td  class="col-1 align-middle">adepzai123</td>
                            <td  class="col-1 align-middle">adepzai272004@gmail.com</td>
                            <td class="col-1 align-middle">0123456789</td>
                            <td class="col-2 align-middle">Phú Nghĩa, Chương Mỹ, Hà Nội</td>
                            <td>Khách hàng</td>
                            <td class="col-2 align-middle text-center"><a href="?act=updatetk"><button class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                <a href="?act=xoatk"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center"><input type="checkbox" name="select" id=""></td>
                            <td class="align-middle text-center">1</td>
                            <td class="col-2 align-middle">Nguyễn Văn Cường</td>
                            <td class="col-1 align-middle">adepzai123</td>
                            <td  class="col-1 align-middle">adepzai123</td>
                            <td  class="col-1 align-middle">adepzai272004@gmail.com</td>
                            <td class="col-1 align-middle">0123456789</td>
                            <td class="col-2 align-middle">Phú Nghĩa, Chương Mỹ, Hà Nội</td>
                            <td>Khách hàng</td>
                            <td class="col-2 align-middle text-center"><a href="?act=updatetk"><button class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                <a href="?act=xoatk"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->