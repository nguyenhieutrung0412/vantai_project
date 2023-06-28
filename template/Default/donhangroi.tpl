
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Đơn hàng rời</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Kế hoạch vận chuyển hàng rời</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
               
                <div class="first-table">

                    <div class="btn-new">
                        <a class="btn-create {xuly.them} " onclick="return add_view('donhangroi','add-view-donhangtong')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>

                  
                         <form class="form-search-table" autocomplete="off" id="form_search_table"  method="post"  onsubmit="return search_link('donhangroi','search','form_search_table')">
                            <input class="input" type="text" name="madonhang" placeholder="Mã đơn hàng">
                            <input type="text" name="tentaixe_search" class="btn-phi_search" id="data_tensearch1" placeholder="Lọc theo tài xế"  onclick="return load_dulieu2('donhangroi','gettaixesearch-view','1')">
                            <input type="hidden" name="idtaixe_search" id="data_idtaixesearch1" >
                            <input type="text" name="tenxe_search" class="btn-phi_search" id="data_xesearch1" placeholder="Lọc theo biển số xe"  onclick="return load_dulieu2('donhangroi','getxesearch-view','1')">
                            <input type="hidden" name="idxe_search" id="data_idxesearch1" >
                            <input type="text" name ="from_ngay" id ="from_ngay"class="picker" placeholder="Từ ngày">
                            <input type="text" name ="to_ngay" id ="to_ngay" class="picker" placeholder="Đến ngày">
                            
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                            
                         
                        </form>
                            <div class="btn-active-all">
                               <!-- <a class="btn-active_all " href="donhangroi/timeline"><i class="fa-solid fa-timeline"></i> Timeline</a> -->
                            </div>

                </div>
                <table >
                    <thead>
                        <tr  class="title-table">
                           <th>#</th>
                            <th>Mã tuyến</th>
                            <th>Thời gian khởi hành</th>
                            <th>Tuyến đường</th>
                            <th >Đơn hàng</th>
                            <th>Tổng trọng lượng hàng</th>
                            <th>Tổng khối hàng</th>
                            
                           
                            <th>Tổng phí</th>
                            <th>Lương chuyến</th>
                            <th>Biển số xe</th>
                            <th>Tài xế</th>
                        
                            <th>Phụ xe</th>
                            
                            <th>Hoàn thành</th>
                             <th>Sản lượng</th>
                            <th>Lựa chọn</th>
                        </tr>

                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td  rowspan="2">{detail.stt}</td>
                            <td  >{detail.id}</td>
                            <td>{detail.thoigian_giaohang}</td>
                           <td>{detail.tuyenduong_giaohang} </td>
                            <td  class="color-1 select"> <a class="color-1" href="/donhangroi/detail_v/?code={detail.id_security}">
                                    <span>Đã nhận({detail.tong_donhangcon})</span> <br><br> <span class="color-0">Đã giao({detail.tongdon_dagiao}/{detail.tong_donhangcon})</span><i class="fa-solid fa-plus"></i></i></a>
                            </td>
                           <td>{detail.tong_trongluong} Kg<span class="color-0"> (Còn lại {detail.taitrong_conlai} kg)</span></td>
                           <td>{detail.tong_khoi}<span class="color-0"> (Còn lại {detail.sokhoi_conlai})</span></td>
                   
                           
                            <td class="color-0">{detail.tong_phivanchuyen}</td>
                            <td class="color-0">{detail.luong_chuyen}</td>
                                <td class="dieulenh-w">
                                <a class="order_xe {detail.btn_doixe} {detail.btn_remove_order_doixe} {detail.tinhtrangdon_remove}" onclick="return dieulenh('donhangroi','dieulenh-view',{detail.id_security},'{detail.id_doixe}','doixe','popup-dieulenh')" >{detail.text_tinhtrangdoixe}</a>
                                <a class="info color-1 {detail.btn_taixe} {detail.btn_remove_info_doixe}" onclick="return dieulenh('donhangroi','info_phutrachdonhang',{detail.id_security},'{detail.id_doixe}','doixe','popup-info')" >{detail.text_tinhtrangdoixe}</a>
                            </td>
                            <td class="dieulenh-w">
                                <a class="order_xe {detail.btn_taixe} {detail.btn_remove_order_taixe} {detail.tinhtrangdon_remove}" onclick="return dieulenh('donhangroi','dieulenh-view',{detail.id_security},'{detail.id_taixe}','taixe','popup-dieulenh')" >{detail.text_tinhtrangtaixe}</a>
                                <a class="info color-1 {detail.btn_taixe} {detail.btn_remove_info_taixe}" onclick="return dieulenh('donhangroi','info_phutrachdonhang',{detail.id_security},'{detail.id_taixe}','taixe','popup-info')" >{detail.text_tinhtrangtaixe}</a>
                            </td>
                         
                             <td class="dieulenh-w">
                               
                                <a class="order_xe {detail.btn_phuxe} {detail.btn_remove_order_phuxe} {detail.tinhtrangdon_remove}" onclick="return dieulenh('donhangroi','dieulenh-view',{detail.id_security},'{detail.id_nhansu}','phuxe','popup-dieulenh')" >{detail.text_tinhtrangphuxe}</a>
                                <a class="info color-1 {detail.btn_taixe} {detail.btn_remove_info_phuxe}" onclick="return dieulenh('donhangroi','info_phutrachdonhang',{detail.id_security},'{detail.id_nhansu}','phuxe','popup-info')" >{detail.text_tinhtrangphuxe}</a>
                            </td>
                           
                             <td class="active"><a {detail.active} id="update_active"  onclick="return update_view('donhangroi','form_add_active_donhangroi','{detail.id_security}')"> <i class="fa-solid fa-circle-check"></i> </a></td>
                             <td class="active"><a {detail.active_sanluong}  onclick="return active_user('donhangroi','sanluongtaixe_active','{detail.id_security}')"> <i class="fa-solid fa-circle-check"></i> </a></td>
                            <td class="select">
                                <a class ="print" onclick="return Print('donhangroi','print-donhangroi',{detail.id_security})"><i class="fa-solid fa-print"></i></a> 
                                <a class="btn-update {xuly.sua}" onclick="return update_view('donhangroi','update-view',{detail.id_security})" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class="{xuly.xoa}" onclick= "return _delete('donhangroi','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                       <tr>
                        
                            <td colspan="20">
                                <ul>
                                    <li>
                                       <div class="bottom-timeline">
                                           <!--  <div class="line {detail.check-1}">
                                             <a class="btn-timeline"  onclick="return add_view_timeline('donhangroi','timeline-donhangroi-view','{detail.id_security}','1')">
                                                <div class="circle-box {detail.check-1}">
                                                    <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                                        Xuất bến
                                                    </div>
                                                </div>
                                             </a>
                                            </div>
                                            <div class="line {detail.check-2}">
                                            <a class="btn-timeline"  onclick="return add_view_timeline('donhangroi','timeline-donhangroi-view','{detail.id_security}','2')">
                                                <div class="circle-box {detail.check-2}">
                                                    <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                                        Lấy hàng hoàn tất
                                                    </div>
                                                </div>
                                            </a>
                                            </div>
                                            -->
                                            <div class="line line2 {detail.check-3}">
                                            <a class="btn-timeline"  onclick="return add_view_timeline('donhangroi','timeline-donhangroi-view','{detail.id_security}','1')">
                                                <div class="circle-box {detail.check-3}">
                                                    <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                                        Đang giao
                                                    </div>
                                                </div>
                                            </a>
                                            </div>
                                            <div class="line line2 {detail.check-4}">
                                            <a class="btn-timeline"  onclick="return add_view_timeline('donhangroi','timeline-donhangroi-view','{detail.id_security}','2')">
                                                <div class="circle-box {detail.check-4}">
                                                    <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                                        Hoàn thành
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
