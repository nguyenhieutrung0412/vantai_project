
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Phiếu chi</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Phiếu chi</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search('phieuchi','search','form_search_table')">
                            <input class="input" type="text" name="ma_phieuchi" placeholder="Mã phiếu chi">
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
                            <button class="info"  type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã phiếu chi</th>
                            <th>Tên loại chi</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ người nhận</th>     
                            <th>Số điện thoại người nhận</th>
                            <th>Ngày giờ tạo phiếu</th>
                            <th>Số tiền được chi</th>
                            <th>Nội dung để chi</th>
                            <th>Tên người tạo</th>
                            <th>Ngày giờ được xét duyệt</th>                 
                            <th>Xét duyệt</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.loai_chi_name}</td>
                            <td class="color-1 info" onclick="return info('phieuchi','info',{detail.id_security})" >{detail.name_nguoinhan}</td>
                            <td>{detail.diachi_nguoinhan}</td>
                            <td>{detail.phone_nguoinhan}</td>
                            <td>{detail.ngaytao_phieuchi}</td>
                            <td>{detail.sotien_chi}</td>
                            <td>{detail.noidung_chi}</td>
                            <td>{detail.tennguoitao_chi}</td>
                            <td class="{detail.color-red}">{detail.ngaygio_xetduyet}</td>
                            <td class="active" ><a {detail.active}  onclick="return active_user('phieuchi','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select"> 
                                <a class ="print" onclick="return Print('phieuchi','print-phieuchi',{detail.id_security})"><i class="fa-solid fa-print"></i></a>
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" onclick="return update_view('phieuchi','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('phieuchi','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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

<div class="popup-create" >
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddphieuchi" id="frmAddphieuchi" method="post" onsubmit = "return add('phieuchi','add','frmAddphieuchi','img_file')"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên loại chi</td>
                 <td>
                    <select name="loai_chi" id="loai_chi">
                     <option value="">Chọn loại chi</option>
                    <!--BASIC list_loaichi-->
                        <option value="{list_loaichi.id}" >{list_loaichi.loai_chi}</option>
                    <!--BASIC list_loaichi-->
                    </select>
                </td>
            </tr>
            <tr>
                 <td class="td-first">Họ và tên người nhận</td>
                <td><input type="text"  name="name_nguoinhan"  placeholder="Họ và tên người nhận" required></td>
             </tr>
             <tr>
                 <td class="td-first">Địa chỉ người nhận</td>
                <td><input type="text"  name="diachi_nguoinhan"  placeholder="Địa chỉ người nhận" required></td>
             </tr>
             <tr>
                 <td class="td-first">Số điện thoại người nhận</td>
                <td><input type="tel"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="phone_nguoinhan"  placeholder="Số điện thoại người nhận" required></td>
             </tr>

             <tr>
                 <td class="td-first">Số tiền chi</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="sotien_chi"  placeholder="Số tiền chi" required></td>
             </tr>
             <tr>
                 <td class="td-first">Số tiền chi(Bằng chữ)</td>
                <td><input type="text"  name="sotien_bangchu"  placeholder="Số tiền chi(Bằng chữ)" required></td>
             </tr>
             <tr>
                 <td class="td-first">Nội dung chi</td>
                <td><input type="text"  name="noidung_chi"  placeholder="Nội dung chi" required></td>
             </tr>
             <tr>
                 <td class="td-first">Kèm theo</td>
                <td><input type="text"  name="kemtheo"  placeholder="kèm theo" required></td>
             </tr>
              <tr>
                 <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
                <td><input type="file"  name="img_file[]" id="img_file" multiple accept="image/*"></td>
             </tr>
             <tr>
                 <td class="td-first">Tệp file đính kèm(nếu có)</td>
                <td><input type="file"  name="pdf_file[]" id="pdf_file" multiple accept=".pdf, .docx, .doc"></td>
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
