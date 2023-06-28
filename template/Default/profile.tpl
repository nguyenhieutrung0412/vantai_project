


    <div class="container">
        <div class="profile">
            <div class="title-profile">
                <img src="template/Default/images/infomation.jpg" alt="avatar">
                <h4>{detail.name}</h4>
            </div>
            <div class="infomation-profile">
                <form name="frmUpdateNhanSu" id="frmUpdateNhanSu" method="post" onsubmit = "return _edit('profile','update','frmUpdateNhanSu',1)"  enctype="multipart/form-data">
                    <div class="form-input2">
                        <label for="">Họ và tên</label><br>
                        <input type="text" name="name" value="{detail.name}">
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Ngày tháng năm sinh</label><br>
                        <input type="date" name="dateofbirth" value="{detail.dateofbirth}">
                    </div>
                    <div class="form-input2">
                        <label for="">Số điện thoại</label><br>
                        <input type="tel" name="phone" value="{detail.phone}">
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Chức vụ</label><br>
                        <input type="text" name="position" value="{detail.position}" readonly>
                    </div>
                    <div class="form-input2">
                        <label for="">Lương</label><br>
                        <input type="text" name="luong_nhansu" value="{detail.luong_nhansu}" readonly>
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Mật khẩu</label><br>
                        <input type="text" name="pwd2" value="{detail.pwd2}">
                        
                    </div>
                    <input type="hidden" name="id" value="{detail.id_security}">
                    <div class="btn-submit">
                        
                        <button type="submit" class="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <div class="div-beforeSuccess">
    <div class="div-beforeSuccess_popup">
        <img src="images/loading.gif" alt="loading">
        <h4>Đang xử lý!!!</h4>
    </div> 
</div>
<div class="div-Success ">
    <div class="div-Success_popup">
        <img src="images/icon-success.png" alt="success">
        <h4>Thành công!!!</h4>
    </div> 
</div>
<div class="div-fail">
    <div class="div-fail_popup">
        <img src="images/error1.png" alt="error1">
        <h4>Xảy ra lỗi !!!</h4>
    </div> 
</div>

