
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Nhân sự</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Nhân sự</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
           
                <div class="first-table">

                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>

                  
                          <form class="form-search-table" id="form_search_table"  method="post"  onsubmit="return search_link('nhan-su','search','form_search_table')">
                            <input class="input" type="text" name="name" placeholder="name">
                            <input class="input" type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone" placeholder="Số điện thoại">
                            <select class="input" name="chucvu" id="chucvu">
                                    <option value="">Chọn Chức vụ</option>
                                    <!--BASIC list_chucvu-->    
                                    <option value="{list_chucvu.id}">{list_chucvu.chuc_vu}</option>
                                    <!--BASIC list_chucvu-->   
                                   
                            </select>
                            <button>Refresh</button>
                            <button type="submit">Search</button>


                        </form>
                    
                </div>
                <table>
                    <thead>
                        <tr class="title-table">
                            <th>Họ và tên</th>
                            <th>Ngày tháng năm sinh</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>CMND</th>
                            <th>Chức vụ</th>
                            <th>Ngày vào làm</th>
                            <th>Tiền lương</th>
                            <th>Phụ cấp</th>
                            <th>Tiền đóng bảo hiểm</th>
                            <th>Số tài khoản</th>
                            <th>Tên ngân hàng</th>
                            <!--BOX boxadmin-->
                            <th>Mật khẩu</th>
                            <!--BOX boxadmin-->
                            <th>Active</th>
                            <th>Lựa chọn</th>
                        </tr>

                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.name}</td>
                            <td>{detail.dateofbirth}</td>
                            <td>{detail.phone}</td>
                            <td>{detail.diachi}</td>
                            <td>{detail.cmnd}</td>
                            <td>{detail.position}</td>
                            <td>{detail.dateofcompany}</td>
                            <td>{detail.format_luong}</td>
                            <td>{detail.phu_cap}</td>
                            <td>{detail.tien_baohiem} ({detail.phantram_baohiem}%)</td>
                            <td>{detail.stk}</td>
                            <td>{detail.ngan_hang}</td>
                            <!--BOX boxadmin--><td>{detail.pwd2}</td><!--BOX boxadmin-->
                            <td class="active"><a {detail.active}  onclick="return active_user('nhan-su','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                         
                                <a class="btn-update {xuly.sua}" onclick="return update_view('nhan-su','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class="{xuly.xoa}" onclick= "return _delete('nhan-su','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
            <form autocomplete="off" name="frmAddNhanSu" id="frmAddNhanSu" method="post" onsubmit = "return add('nhan-su','add','frmAddNhanSu',1)"  enctype="multipart/form-data">
                
                
              <table class="table-input">
            <tbody>
                <tr>
                    <td class="td-first">Họ và tên *</td>
                    <td>  <input type="text" name="name"  placeholder="Name"  required></td>
                </tr>
                <tr>
                    <td class="td-first">Ngày tháng năm sinh *</td>
                    <td>   <input type="date" name="dateofbirth"  placeholder="Ngày tháng năm sinh" required> </td>
                </tr>
                 <tr>
                    <td class="td-first">Địa chỉ *</td>
                    <td>   <input type="text" name="diachi"  placeholder="Địa chỉ" required> </td>
                </tr>
                 <tr>
                    <td class="td-first">CMND *</td>
                    <td>   <input type="text" name="cmnd"  placeholder="CMND" required> </td>
                </tr>
                <tr>
                    <td class="td-first">Số điện thoại *</td>
                    <td>   <input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone"  placeholder="Số điện thoại" required></td>
                </tr>
                <tr>
                    <td class="td-first">Chức vụ *</td>
                    <td>
                         <input list="list_chucvu" name="list_chucvu" >
                        <datalist id="list_chucvu">
                        <!--BASIC list_chucvu-->
                            <option value="{list_chucvu.chuc_vu} ">
                        <!--BASIC list_chucvu-->
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td class="td-first">Ngày vào làm *</td>
                    <td>  <input type="date" name="dateofcompany"  placeholder="Ngày vào làm" required></td>
                </tr>
                <tr>
                    <td class="td-first">Tiền lương *</td>
                    <td>  <input type="text" name="luong" onchange="return formatTienTe(this.value)" placeholder="Tiền lương" required></td>
                </tr>
                <tr>
                    <td class="td-first">Phụ cấp *</td>
                    <td>  <input type="text" name="phu_cap"  placeholder="Phụ cấp" required></td>
                </tr>
                <tr>
                    <td class="td-first">Bảo hiểm xã hội *</td>
                    <td>  <input type="text" name="tien_baohiem"  placeholder="Nhập số tiền đóng bảo hiểm" required></td>
                </tr>
                  <tr>
                    <td class="td-first">Số tài khoản </td>
                    <td>  <input type="text" name="stk" placeholder="Số tài khoản" ></td>
                </tr>
                 <tr>
                    <td class="td-first">Tên ngân hàng</td>
                    <td>  <input type="text" name="ngan_hang" placeholder="VD: VCB,MB...." ></td>
                </tr>
                <tr>
                    <td class="td-first">Mật khẩu</td>
                    <td><input type="password" name="password" placeholder="Mật khẩu"></td>
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

