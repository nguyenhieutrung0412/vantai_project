
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Bảng công nợ khách hàng tháng {thang_nam.thang} năm {thang_nam.nam}</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Công nợ</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}" onclick="return add_view('congnokhachhang','add-view')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search_link('congnokhachhang','search','form_search_table')">
                            <input class="input" type="text" name="ma_bangluong" placeholder="Mã ">
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
                            <button >Refresh</button>
                            <button class="info"  type="submit">Search</button>
                            
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã công nợ</th>
                            <th>Tên khách hàng</th>
                            <th>CMND/CCCD</th>
                            <th>Số điện thoại khách hàng</th>
                            <th>Địa chỉ khách hàng</th>
                            <th>Tên công ty</th>
                            <th>Mã số thuế</th>
                            <th>Số tiền</th>     
                            <th>Tháng</th>
                            <th>Năm</th>
                            <th>Tình trạng</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td >{detail.name_kh}</td>
                            <td>{detail.cmnd}</td>
                            <td>{detail.phone_kh}</td>
                            <td>{detail.address_kh}</td>
                            <td>{detail.ten_congty}</td>
                            <td>{detail.masothue}</td>
                            
                            <td>{detail.so_tien}</td>
                            <td>{detail.thang}</td>
                            <td>{detail.nam}</td>
                            <td class="active" ><a {detail.active}  onclick="return active_user('congnokhachhang','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select"> 
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" onclick="return update_view('congnokhachhang','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('congnokhachhang','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                        
                    <!--BASIC detail-->
                        <tr>
                            <td class="tong_luong_thang color-0" colspan="18">Tổng: {tong.tongcongno_thang}</td>
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

