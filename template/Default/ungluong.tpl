
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Bảng ứng lương</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Ứng lương</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search_link('ungluong','search','form_search_table')">
                           
                            <select name="thang_search" id="thang_search">
                                <option value="0">---Chọn tháng---</option>
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>
                            </select>
                            <select name="nam_search" id="nam_search">
                                <option value="0">---Chọn năm---</option>
                                {list_select.list_select}
                        
                            </select>
                            <button>Refresh</button>
                            <button class="info"  type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã ứng lương</th>
                            <th>Tên nhân sự</th>
                            <th>Số tiền ứng</th>
                            <th>Ngày giờ yêu cầu ứng</th>     
                            <th>Tên kế toán</th>
                            <th>Xét duyệt</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.name}</td>
                            <td>{detail.so_tien_ung}</td>
                            <td>{detail.thoi_gian_ung}</td>
                            <td>{detail.nguoi_tao_don}</td>
                            <td class="active" ><a {detail.active}  onclick="return active_user('ungluong','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select"> 
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" onclick="return update_view('ungluong','update-view',{detail.id_security})" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('ungluong','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                        
                    <!--BASIC detail-->
                    <tr>
                            <td class="color-0" colspan="7">Tổng: {tong.tong_ung_luong}</td>
                        </tr>
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

<div class="popup-create" >
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddungluong" id="frmAddungluong" method="post" onsubmit = "return add('ungluong','add','frmAddungluong',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên người ứng</td>
                 <td>
                    <select name="nhan_su" id="nhan_su">
                     <option value="">---Chọn tên nhân sự---</option>
                    <!--BASIC list_nhansu-->
                        <option value="{list_nhansu.id}" >{list_nhansu.name}</option>
                    <!--BASIC list_nhansu-->
                    </select>
                </td>
            </tr>
            <tr>
                 <td class="td-first">Số tiền ứng</td>
                <td><input type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="so_tien_ung"  placeholder="Số tiền ứng" required></td>
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


<div class ="popup-dieulenh  popup-info">

</div>
