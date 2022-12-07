
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Bảng giá cước theo tuyến</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Bảng giá cước theo tuyến </p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div> 
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>ID</th>
                            <th>Mã tuyến</th>
                            <th>Tên tuyến</th>
                            <th>Số km</th>
                            <th>Số tiền</th>
                            <th>Active</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.ma_tuyen}</td>
                            <td>{detail.ten_tuyen}</td>
                            <td>{detail.km}</td>
                            <td>{detail.so_tien}</td>
                            <td class="active"><a {detail.active}  onclick="return active_user('banggiacuoctuyen','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                                <a class="btn-update {xuly.sua}" onclick="return update_view('banggiacuoctuyen','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} " onclick= "return _delete('banggiacuoctuyen','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                    <!--BASIC detail-->
                    </tbody>
                </table>
                <div class="pagination">
                {divpage}
                </div>
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

<div class="popup-create">
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddloaihang" id="frmAddloaihang" method="post" onsubmit = "return add('banggiacuoctuyen','add','frmAddloaihang',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Mã tuyến</td>
                 <td><input type="text" name="ma_tuyen"  placeholder="Mã tuyến" required></td>
            </tr>
            <tr>
                <td class="td-first">Tên tuyến</td>
                 <td><input type="text" name="ten_tuyen"  placeholder="Tên tuyến" required></td>
            </tr>
            <tr>
                <td class="td-first">Số km</td>
                 <td><input type="text" name="km" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="VD: Nhập 1500 tương đương 1.500km" required></td>
            </tr>
            <tr>
                <td class="td-first">Số tiền</td>
                 <td><input type="text" name="so_tien" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  placeholder="VD: 1500000" required></td>
            </tr>
             
         </tbody>
         </table>
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" class="cancel">Đóng</button>
                </div>
            </form>
        </div>
</div>

<div class="popup-update">    
</div>

