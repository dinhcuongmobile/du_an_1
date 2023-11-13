<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-secondary btn-sm">Chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Bỏ chọn tất cả</button>
            <button class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
            <a href="?act=adddm"><button class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                            <th>Mã loại</th>
                            <th>Tên danh mục</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-1 text-center"><input type="checkbox" name="select" id=""></td>
                            <td class="col-2">1</td>
                            <td>Iphone</td>
                            <td class="col-2"><a href="?act=updatedm"><button class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                <a href="?act=xoadm"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
                        </tr>
                        <tr>
                            <td class="col-1 text-center"><input type="checkbox" name="" id=""></td>
                            <td class="col-2">1</td>
                            <td>Iphone</td>
                            <td class="col-2"><a href="?act=updatedm"><button class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                <a href="?act=xoadm"><button class="btn btn-secondary btn-sm">Xóa</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->