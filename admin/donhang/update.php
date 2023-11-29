<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="?act=suadh" method="post" class="form">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="mb-3">
                <label for="" class="form-label">Mã đơn hàng</label>
                <input type="text" name="maloai" id="" class="form-control" value="DCM-<?=$id?>" disabled>
            </div>
            <div class="mb-3">
                <label for="sel1">Trạng thái giao hàng</label>
                <select class="form-control" id="sel1" name="trangthai">
                    <option <?= ($trangthai=="2")?'selected':'' ?> value="2">Đơn hàng mới</option>
                    <option <?= ($trangthai=="3")?'selected':'' ?> value="3">Đang giao</option>
                    <option <?= ($trangthai=="4")?'selected':'' ?> value="4">Đã giao</option>
                </select>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="?act=listdh"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->