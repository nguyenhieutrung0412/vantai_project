
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Phòng ban</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Phòng ban</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">           
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã phòng ban</th>
                            <th>Tên phòng ban</th>
                            <!--BOX boxadmin-phanquyen-->
                            <th>Phân quyền</th>
                             <!--BOX boxadmin-phanquyen-->
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.chuc_vu}</td>
                            <!--BOX boxadmin-phanquyen-->
                            <td class="phanquyen">
                                <a class="btn-phanquyen" onclick="return phanquyenview('phongban',{detail.id_security})" > <i class="fa-solid fa-shield-halved icon-phanquyen"></i></a>
                            </td>
                            <!--BOX boxadmin-phanquyen-->
                            <td class="select">
                                <a class=" {detail.remove} btn-update {xuly.sua}" onclick="return update_view('phongban','update-view',{detail.id_security})" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class="{detail.remove} {xuly.xoa}" onclick= "return _delete('phongban','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
        <span class="close_pop">×</span>
            <h3>Thêm mới</h3>
            <form name="frmAddphongban" id="frmAddphongban" method="post" onsubmit = "return add('phongban','add','frmAddphongban',1)"  enctype="multipart/form-data">
               
                 <table class="table-input">
                    <tbody>
                        <tr>
                            <td class="td-first">Họ và tên *</td>
                            <td>  <input type="text" name="name"  placeholder="Name"  required></td>
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
<div class="popup-phanquyen">
    
</div>