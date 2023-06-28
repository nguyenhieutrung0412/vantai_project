
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Đơn hàng trọn gói</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Kế hoạch vận chuyển hàng trọn gói</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
               
                <div class="first-table">

                    <div class="btn-new">
                        <a class="btn-create {xuly.them}" onclick="return add_view('donhang','add-view')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>

                  
                        <form class="form-search-table" id="form_search_table"  method="post"  onsubmit="return search_link('donhang','search','form_search_table')">
                            <input class="input" type="text" name="madonhang" placeholder="Mã đơn hàng">
                            <input class="input" type="text" name="sdt_search" placeholder="SDT người nhận hoặc gửi">
                            
                            
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                            
                         
                        </form>
                            <div class="btn-active-all">
                                <a class="btn-active_all " href="donhang/timeline"><i class="fa-solid fa-timeline"></i> Timeline</a>
                            </div>

                </div>
                <table style="font-size:11px">
                    <thead>
                        <tr  class="title-table">
                            <th>#</th>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>SDT khách hàng</th>
                            <th>Mô tả hàng</th>
                            <th>Số lượng hàng</th>
                            <th>Trọng lượng hàng</th>
                            <th>Đ/C lấy hàng</th>
                           
                           
                           
                            <th>Đ/C giao hàng</th>
                            <th>Thời gian giao hàng</th>
                            <th>SDT người nhận</th>
                            <th>Đơn giá</th>
                           
                            <th>Phí vận chuyển</th>
                            
                            <th>Biển số xe</th>
                            <th>Tài xế</th>
                    
                            <th>Phụ xe</th>
                            <th>Phí phát sinh</th>
                            
                            <th>Hoàn thành</th>
                            <th>Sản lượng</th>
                            <th>Lựa chọn</th>
                        </tr>

                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td rowspan="2">{detail.stt}</td>
                            <td class="color-1 info" onclick="return info('donhang','info',{detail.id_security})" >{detail.id}</td>
                            <td>{detail.name_kh}</td>
                            <td>{detail.sdt_kh}</td>
                            <td>{detail.loaihang} <br> <i class="fa-solid fa-plus add btn-thuongnong {detail.edit_delete}" onclick="return update_view('donhang','mathang-view',{detail.id_security})"></i></td>
                            <td>{detail.soluong_hanghoa}</td>
                            <td>{detail.trongluong_hanghoa} Kg ({detail.trongluong_donhang_tan} Tấn)</td>
                            <td>{detail.diachi_nhanhang}</td>
                            
                 
                          
                            <td>{detail.diachi_giaohang}</td>
                            <td>{detail.thoigian_giaohang}</td>
                            <td>{detail.phone_nguoinhan}</td>
                            <td>{detail.don_gia}</td>
                            <td>{detail.format_luong}</td>
                           
                            
                             <td class="dieulenh-w">
                                <a class="order_xe {detail.btn_doixe} {detail.btn_remove_order_doixe}" onclick="return dieulenh('donhang','dieulenh-view',{detail.id_security},'{detail.id_doixe}','doixe','popup-dieulenh')" >{detail.text_tinhtrangdoixe}</a>
                                <a class="info color-1 {detail.btn_taixe} {detail.btn_remove_info_doixe}" onclick="return dieulenh('donhang','info_phutrachdonhang',{detail.id_security},'{detail.id_doixe}','doixe','popup-info')" >{detail.text_tinhtrangdoixe}</a>
                            </td>
                            <td class="dieulenh-w">
                                <a class="order_xe {detail.btn_taixe} {detail.btn_remove_order_taixe}" onclick="return dieulenh('donhang','dieulenh-view',{detail.id_security},'{detail.id_taixe}','taixe','popup-dieulenh')" >{detail.text_tinhtrangtaixe}</a>
                                <a class="info color-1 {detail.btn_taixe} {detail.btn_remove_info_taixe}" onclick="return dieulenh('donhang','info_phutrachdonhang',{detail.id_security},'{detail.id_taixe}','taixe','popup-info')" >{detail.text_tinhtrangtaixe}</a>
                            </td>
                            
                             <td class="dieulenh-w">
                               
                                <a class="order_xe {detail.btn_phuxe} {detail.btn_remove_order_phuxe}" onclick="return dieulenh('donhang','dieulenh-view',{detail.id_security},'{detail.id_nhansu}','phuxe','popup-dieulenh')" >{detail.text_tinhtrangphuxe}</a>
                                <a class="info color-1 {detail.btn_taixe} {detail.btn_remove_info_phuxe}" onclick="return dieulenh('donhang','info_phutrachdonhang',{detail.id_security},'{detail.id_nhansu}','phuxe','popup-info')" >{detail.text_tinhtrangphuxe}</a>
                            </td>
                             <td>{detail.tien_phiphatsinh}<br> <i class="fa-solid fa-plus add btn-thuongnong {detail.edit_delete}" onclick="return update_view('donhang','phiphatsinh-view',{detail.id_security})"></i></td>
                            <td class="active"><a {detail.active}  id="update_active"  onclick="return update_view('donhang','form_add_active','{detail.id_security}')"> <i class="fa-solid fa-circle-check"></i> </a></td>
                            <td class="active"><a {detail.active_sanluong}  onclick="return active_user('donhang','sanluongtaixe_active','{detail.id_security}')"> <i class="fa-solid fa-circle-check"></i> </a></td>
                            <td class="select">
                                <a class ="print" title="in" onclick="return Print('donhang','print-donhang',{detail.id_security})"><i class="fa-solid fa-print"></i></a>
                                <a class ="" title="sao chép" onclick="return copy('donhang','copy_donhang',{detail.id_security})"><i class="fa-solid fa-copy"></i></a>
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" title="chỉnh sửa" onclick="return update_view('donhang','update-view',{detail.id_security})" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class="{xuly.xoa} {detail.edit_delete}" title="xóa" onclick= "return _delete('donhang','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                          
                        </tr>
                        <tr>
                       
                        <td colspan="20">
                    <ul>
                        <li>
                            <div class="bottom-timeline">
                                <div class="line {detail.check-1}">
                                <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','xuatben')">
                                    <div  class="circle-box {detail.check-1}">
                                        <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                            Xuất bến
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <div class="line {detail.check-2}">
                                <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','danggiao')">
                                    <div class="circle-box {detail.check-2}">
                                        <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                           Đã lấy hàng
                                        </div>
                                    </div>
                                     </a>
                                </div>
                                <div class="line {detail.check-3}">
                                <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','giaohangtoidiachi')">
                                    <div class="circle-box {detail.check-3}">
                                        <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                            Đã giao
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <div class="line {detail.check-4}">
                                <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','hoanthanh')">
                                    <div class="circle-box {detail.check-4}">
                                        <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                            Hoàn thành/Về bãi
                                        </div>
                                    </div>
                                     </a>
                                </div>

                            </div>
                        </li>
                    </ul>
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
        
</div>
<div class="popup-create_add"></div>
<div class="popup-timeline">
        
</div>

<div class="popup-update">
      
</div>

<div class="popup-dieulenh  ">
   
</div>
<div class="popup-info   ">
   
</div>
<div class="popup-thongtintaixe ">
   
</div>
<div class="popup-upload-img">
   
</div>

