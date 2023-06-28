
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Phiếu thu</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Phiếu thu</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search('phieuthu','search','form_search_table')">
                          <input class="input" type="text" name="ma_phieuthu" placeholder="Mã phiếu thu">
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
                            <button type="reset">Refresh</button>
                            <button class="info" type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã phiếu thu</th>
                            <th>Tên loại thu</th>
                            <th>Tên người thu</th>
                            <th>Địa chỉ người thu</th>
                            <th>Số điện thoại người thu</th>
                            <th>Ngày giờ tạo phiếu</th>
                            <th>Số tiền thu</th>
                            <th>Nội dung để thu</th>
                            <th>Tên người tạo</th>
                            <th>Ngày giờ được xét duyệt</th>
                            <!--BOX boxadmin-gd-ktt-->                 
                            <th>Xét duyệt</th>
                            <!--BOX boxadmin-gd-ktt-->
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.loai_thu_name}</td>
                            <td  class="color-1 info" onclick="return info('phieuthu','info',{detail.id_security})">{detail.name_nguoithu}</td>
                            <td>{detail.diachi_nguoithu}</td>
                            <td>{detail.phone_nguoithu}</td>
                            <td>{detail.ngaytao_phieuthu}</td>
                            <td>{detail.sotien_thu}</td>
                            <td>{detail.noidung_thu}</td>
                            <td>{detail.tennguoitao_thu}</td>                         
                            <td class="{detail.color-red}">{detail.ngaygio_xetduyet}</td>
                            <!--BOX boxadmin-gd-ktt-->
                            
                            <td class="active" ><a {detail.active}  onclick="return active_user('phieuthu','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <!--BOX boxadmin-gd-ktt-->
                            <td class="select">
                                <a class ="print" onclick="return Print('phieuthu','print-phieuthu',{detail.id_security})"><i class="fa-solid fa-print"></i></a>
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" onclick="return update_view('phieuthu','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('phieuthu','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
            <form autocomplete="off" name="frmAddphieuthu" id="frmAddphieuthu" method="post" onsubmit = "return add('phieuthu','add','frmAddphieuthu','img_file')"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên loại thu *</td>
                 <td>
                    <select name="loai_thu" id="loai_thu">
                     <option value="">Chọn loại thu</option>
                    <!--BASIC list_loaithu-->
                        <option value="{list_loaithu.id}" >{list_loaithu.loaithu}</option>
                    <!--BASIC list_loaithu-->
                    </select>
                </td>
            </tr>
             <tr>
                 <td class="td-first">Họ tên người thu *</td>
                <td><input type="text"  name="name_nguoithu"  placeholder="Họ tên người thu" required></td>
             </tr>
              <tr>
                 <td class="td-first">Địa chỉ người thu *</td>
                <td><input type="text"  name="diachi_nguoithu"  placeholder="Địa chỉ người thu" required></td>
             </tr>
              <tr>
                 <td class="td-first">Số điện thoại người thu *</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="phone_nguoithu"  placeholder="Số điện thoại người thu" required></td>
             </tr>
             <tr>
                 <td class="td-first">Số tiền thu *</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="sotien_thu"  placeholder="Số tiền thu" required></td>
             </tr>
              <tr>
                 <td class="td-first">Số tiền bằng chữ *</td>
                <td><input type="text"   name="sotien_bangchu"  placeholder="Số tiền bằng chữ" required></td>
             </tr>
             <tr>
                 <td class="td-first">Nội dung thu *</td>
                <td><input type="text"  name="noidung_thu"  placeholder="Nội dung thu" required></td>
             </tr>
              <tr>
                 <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
                <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
             </tr>
             <tr>
                 <td class="td-first">Hình file đính kèm(nếu có)</td>
                <td><input type="file"  name="pdf_file[]" id="pdf_file" multiple accept= ".pdf, .docx, .doc"></td>
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
