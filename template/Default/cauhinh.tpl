


    <div class="container">
        <div class="cauhinh">
            <div class="title-cauhinh">
                <img src="template/Default/images/gear-47203_960_720.png" alt="avatar">
               
            </div>
            <div class="infomation-cauhinh">
                <form name="frmUpdatecauhinh" id="frmUpdatecauhinh" method="post" onsubmit = "return _edit('cauhinh','update','frmUpdatecauhinh',1)"  enctype="multipart/form-data">
                    <div class="form-input2">
                        <label for="">Domain</label>
                        <input type="text" name="domain" value="{detail.domain}">
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Phone</label>
                        <input type="tel" name="phone" value="{detail.phone}">
                    </div>
                    <div class="form-input2">
                        <label for="">Tên công ty</label>
                        <input type="text" name="company" value="{detail.company}">
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Mã số thuế</label>
                        <input type="text" name="MaSothue" value="{detail.MaSothue}" >
                    </div>
                    <div class="form-input2">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{detail.email}" >
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" value="{detail.address}">
                        
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Năm hoạt động phần mềm</label>
                        <input type="text" name="nam_hoatdong" value="{detail.nam_hoatdong}">
                        
                    </div>
                    <div class="form-input2 fix">
                        <label for="">Chất lượng hình tải lên trang web</label>
                        <input type="tel" name="chatluong_hinhupload" value="{detail.chatluong_hinhupload}">
                        
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


