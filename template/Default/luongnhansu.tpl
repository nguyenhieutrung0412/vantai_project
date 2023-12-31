
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Bảng lương nhân sự tháng {thang_nam.thang} năm {thang_nam.nam}</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Lương nhân sự</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}" onclick="return add_view('luongnhansu','add-view')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search_link('luongnhansu','search','form_search_table')">
                            <input class="input" type="text" name="ma_bangluong" placeholder="Mã bảng lương">
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
                            <input class="hidden" type="hidden" name="thang" value="{thang_nam.thang}">
                            <input class="input" type="hidden" name="nam" value="{thang_nam.nam}">
                            <button >Refresh</button>
                            <button class="info"  type="submit">Search</button>
                            <div class="btn-active-all">
                                <a class="btn-active_all {xuly.them}" onclick="return active_all('luongnhansu','activeall')"><i class="fa-regular fa-circle-check"></i> Duyệt tất cả</a>
                            </div>
                            <div class="btn-active-all">
                                <a class="btn-active_all {xuly.them}" onclick="return export_Excel('luongnhansu','excel','form_search_table')"><i class="fa-solid fa-file-export"></i> Xuất EXCEL</a>
                            </div>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã bảng lương</th>
                            <th>Tên nhân sự</th>
                            <th>Ngày công</th>
                            <th>Lương thỏa thuận</th>
                            <th>Tiền bảo hiểm</th>
                            <th>Phụ cấp</th>     
                            <th>Thưởng nóng</th>
                            <th>Tăng ca</th>
                            <th>Nghỉ không phép</th>
                            <th>Tổng lương đã ứng</th>
                            <th>Tổng lương</th>
                            <th>Tên kế toán</th> 
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
                            <td ><a class="color-1" href="{root_dir}luongnhansu/v/?code={detail.user_id_security}">{detail.name}</a></td>
                            <td>{detail.ngay_cong}</td>
                            <td>{detail.luong_thoa_thuan}</td>
                            <td>{detail.tien_bao_hiem}</td>
                            <td>{detail.phu_cap}</td>
                            <td>{detail.thuong_nong} <i class="fa-solid fa-plus add btn-thuongnong {detail.edit_delete}" onclick="return update_view('luongnhansu','thuongnong-add-view',{detail.id_security})"></i></td>
                            <td>{detail.tang_ca} <i class="fa-solid fa-plus add btn-tangca {detail.edit_delete}"  onclick="return update_view('luongnhansu','tangca-add-view',{detail.id_security})"></td>
                            <td>{detail.tong_so_ngay_nghi_khong_phep}<i class="fa-solid fa-plus add btn-tangca {detail.edit_delete}"  onclick="return update_view('luongnhansu','ngaynghi-add-view',{detail.id_security})"></td>
                            <td>{detail.tong_ungluong} <i class="fa-solid fa-plus add btn-thuongnong {detail.edit_delete}" onclick="return update_view('luongnhansu','ungluong-add-view',{detail.id_security})"></i></td>
                            <td>{detail.tong_luong}</td>
                            <td>{detail.nguoi_tao}</td>
                            <!--BOX boxadmin-gd-ktt-->
                            <td class="active" ><a {detail.active}  onclick="return active_user('luongnhansu','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <!--BOX boxadmin-gd-ktt-->
                            <td class="select"> 
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" onclick="return update_view('luongnhansu','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('luongnhansu','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                        
                    <!--BASIC detail-->
                        <tr>
                            <td class="tong_luong_thang color-0" colspan="18">Tổng: {tong.tongluong_thang}</td>
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
        
</div>

<div class="popup-update">    
</div>


<div class ="popup-dieulenh  popup-info">

</div>

