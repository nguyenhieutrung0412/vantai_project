
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Bảng công nợ hàng rời tháng {thang_nam.thang} năm {thang_nam.nam}</h3>
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
            <div class="table table_scroll">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}" onclick="return add_view('congnohangroi','add-view')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search_link('congnohangroi','search','form_search_table')">
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
                               <div class="btn-active-all">
                                <a class="btn-active_all {xuly.them}" onclick="return export_Excel('congnohangroi','excel','form_search_table')"><i class="fa-solid fa-file-export"></i> Xuất EXCEL</a>
                            </div>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã công nợ</th>
                            <th>Tên khách hàng</th>
                            
                            <th>Số điện thoại khách hàng</th>
                            <th>Địa chỉ khách hàng</th>
                            <th>Tên công ty</th>
                       
                            <th>Tiền vận chuyển</th>
                           
                            <th>Phí VAT(%)</th>
                             <th>Tổng tiền</th>     
                             <th>Tổng công nợ tháng</th>     
                           
                            <th>Chốt</th>
                            <th>Hạn thu</th>
                            <th>Thanh toán</th>
                            <th>Nợ tồn</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td >{detail.name_kh}</td>
                            
                            <td>{detail.phone_kh}</td>
                            <td>{detail.address_kh}</td>
                            <td><a class="color-1" href="/congnohangroi/donhangroi/?code={detail.id_khachhang_security}&thang={detail.thang}&nam={detail.nam}">{detail.ten_congty}</a></td>
                          
                            
                            <td>{detail.so_tien}</td>
                           
                            <td>{detail.phivat}({detail.vat}%)</td>
                            <td>{detail.tong_tien}</td>
                            <td>{detail.tong_thanhtoan}</td>
                            <td class="active" ><a  class="btn-update {detail.active}"  onclick="return update_view('congnohangroi','chot_congno-view',{detail.id_security})"> <i class="fa-solid fa-circle "></i> </a>
                            {detail.ngay_chot}</td>
                            <td>{detail.ngay_thu}</td>
                            <td>{detail.so_lan_thanh_toan}<br> 
                            {detail.sotien_thanhtoan} 
                            <i class="fa-solid fa-plus add btn-update {detail.edit_delete}" onclick="return update_view('congnohangroi','taophieuthu-view',{detail.id_security})"></i></td>
                            <td class="color-0">{detail.no_ton}</td>
                            <td class="select"> 
                             <form class="form_search_table_2" id="form_search_table_2" method="post" >
                                <input class="input" type="hidden" name="id_security" value="{detail.id_security}" placeholder="Mã ">

                               
                            </form>
                             <a class="color-1" onclick="return export_Excel('congnohangroi','excel','form_search_table_2')"><i class="fa-sharp fa-solid fa-file-excel"></i></a> 
                                <a class="btn-update {xuly.sua} remove {detail.edit_delete}" onclick="return update_view('congnohangroi','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('congnohangroi','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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

