<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới sản phẩm</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="" class="form">
            <div class="mb-3">
                <label for="hovaten" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="hovaten" name="name" placeholder="Nhập tên sản phẩm...">
            </div>
            <div class="mb-3">
                <label for="gia" class="form-label">Giá</label>
                <input type="text" class="form-control" id="gia" name="price" placeholder="Nhập giá...">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Tải ảnh lên:</label>
                <input type="file" name="image" id="image" class="form-control-file border">
            </div>
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="soluong" name="soluong" placeholder="Nhập số lượng...">
            </div>
            <div class="mb-3">
                <label for="sel1">Danh mục</label>
                <select class="form-control" id="sel1" name="danhmuc">
                    <option value="">Iphone</option>     
                    <option value="">Samsung</option>
                </select>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->