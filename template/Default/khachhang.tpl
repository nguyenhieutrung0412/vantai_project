
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Khách hàng</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Khách hàng</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
               
                <div class="first-table">

                    <div class="btn-new">
                    
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                        
                    </div>

                  
                         <form class="form-search-table" id="form_search_table"  method="post"  onsubmit="return search_link('khachhang','search','form_search_table')" enctype="multipart/form-data">
                
                            <input class="input" type="text" name="name_kh" placeholder="Họ tên khách hàng">
                            <input class="input" type="tel" name="sdt_kh" placeholder="Số điện thoại ">
                            <button>Refresh</button>
                            <button type="submit">Search</button>


                        </form>
                    
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã khách hàng</th>
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                         
                            <th>Tên công ty</th>
                            <th>Mã số thuế</th>
                            <th>Bảng giá hợp đồng</th>
                            <!--BOX boxadmin-->

                            <th>Mật khẩu</th>
                              <!--BOX boxadmin-->
                            <th>Lựa chọn</th>
                        </tr>

                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                          <td>{detail.id}</td>
                            <td>{detail.name_kh}</td>
                            <td>{detail.phone_kh}</td>
                            <td>{detail.address_kh}</td>
                           
                            <td>{detail.ten_congty}</td>
                            <td>{detail.masothue}</td>
                            <td  class="btn-thuongnong" ><a class="color-1"href="javascript:void(0)"  onclick="return update_view('khachhang','banggia-view',{detail.id_security})">{detail.text_hopdong}</a></td>
                             <!--BOX boxadmin--><td>{detail.pwd2}</td> <!--BOX boxadmin-->
                            <td class="select">
                            
                                <a class="btn-update {xuly.sua}" onclick="return update_view('khachhang','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class="{xuly.xoa}" onclick= "return _delete('khachhang','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                           
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
            <form name="frmAddKhachHang" id="frmAddKhachHang" method="post" onsubmit = "return add('khachhang','add','frmAddKhachHang',1)"  enctype="multipart/form-data">
                <div >
                    <table class="table-input">
                        <tbody>
                            <tr>
                                <td class="td-first">Họ và tên *</td>
                                <td>
                                    <input type="text" name="name"  placeholder="Name"  required>
                                </td>
                            </tr>
                             <tr>
                                <td class="td-first">Số điện thoại *</td>
                                <td>
                                    <input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone"  placeholder="Số điện thoại" required>
                                </td>
                            </tr>
                             <tr>
                                <td class="td-first">Địa chỉ</td>
                                <td>
                                    <input type="text" name="address"  placeholder="Địa chỉ">
                                </td>
                            </tr>
                   
                             <tr>
                                <td class="td-first">Tên công ty</td>
                                <td>
                                <input type="text" name="ten_congty"  placeholder="Tên công ty(Nếu có)" >
                                </td>
                            </tr>
                             <tr>
                                <td class="td-first">Mã số thuế</td>
                                <td>
                                <input type="text" name="masothue"  placeholder="Mã số thuế(nếu có)" >
                                </td>
                            </tr>
               
                        
                        </tbody>
                    </table>
                </div>
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" class="cancel">Đóng</button>
                </div>
            </form>
        </div>
</div>

<div class="popup-update">
      
</div>
