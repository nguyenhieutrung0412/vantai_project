
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Mã đơn hàng  - <span class="color-0"> {detail_v.id}</span></h3>
                
                
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Chi tiết đơn hàng {detail_v.id}</p>
                    </a>
                </div>
            </div>
             <div class="back_prev">
                <a onclick="return back_prev();"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="table table_scroll">
               
                <div class="first-table">

                    <div class="btn-new">
                        <a class="btn-create {xuly.them}" onclick="return add_view('donhangroi','add-view',{detail_v.id})"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                    <div class="btn-new">
                        <a class="btn-phi_search {xuly.them}" onclick="return load_dulieu2('donhangroi','getdanhsachdonhang-view',{detail_v.id})"><i class="fa-solid fa-plus"></i> Thêm đơn từ danh sách</a>
                    </div>

                  
                        <form class="form-search-table" id="form_search_table" action="" method="post" onsubmit="return search_link('donhangroi','search-donhangcon','form_search_table')">
                            
                            <input class="input" type="text" name="madonhang_con" placeholder="Mã đơn hàng">
                            <input class="input" type="text" name="sdt_search" placeholder="SDT người nhận hoặc gửi">
                            <input class="input" type="hidden" name="madonhang" placeholder=""  value="{detail_v.id}">
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                            
                         
                        </form>
                             <div class="btn-active-all">
                                <a class="btn-active_all " onclick="return Print('donhangroi','print-donhangroi',{detail_v.id_security})"><i class="fa-solid fa-print"></i> In đơn hàng</a>
                            </div>

                </div>
                <table >
                    <thead>
                        <tr  class="title-table">
                            <th>#</th>
                           
                            <th>Mã</th>
                            <th>Tên khách hàng</th>
                            <th>Sdt khách hàng</th>
                            <th>Đ/C nhận hàng</th>
                            <th>Mô tả hàng</th>
                           
                            <th>Trọng lượng</th>
                            <th>Tên người lấy hàng</th>
                           
                            <th>Đ/C giao hàng</th>
                            <th>Sdt người nhận</th>
                            <th>Thời gian nhận hàng</th>
                            <th>Thời gian giao hàng dự kiến</th>
                            <th>Phí vận chuyển</th>
                            <th>VAT</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian hoàn thành</th>
                            <th>Hoàn thành</th>
                            <th>Lựa chọn</th>
                        </tr>

                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.stt}</td>
                            
                            <td class="color-1 info" title="Xem thông tin" onclick="return info('donhangroi','info',{detail.id_security})" >{detail.id}</td>
                            <td >{detail.name_kh}</td>
                            <td >{detail.sdt_kh}</td>
                            <td >{detail.diachi_nhanhang}</td>
                            <td >{detail.loaihang} <i class="fa-solid fa-plus add btn-thuongnong {detail.edit_delete}" onclick="return update_view('donhangroi','mathang-view',{detail.id_security})"></i></td>
                          
                            <td >{detail.trongluong_hanghoa} Kg</td>
                            
                            <td >{detail.ten_nguoinhan}</td>
                            
                            <td >{detail.diachi_giaohang}</td>
                            <td >{detail.phone_nguoinhan}</td>
                            <td >{detail.thoigian_nhanhang}</td>
                            <td >{detail.thoigian_giaohang}</td>
                            <td>{detail.format_luong}</td>
                            <td>{detail.vat}% ({detail.phi_vat})</td>
                            <td class="color-0">{detail.tong_tien}</td>
                            <td>{detail.date_hoanthanh}</td>
                            
                            <td class="active"><a {detail.active} id="update_active"  onclick="return update_view('donhangroi','form_add_active','{detail.id_security}')"> <i class="fa-solid fa-circle-check"></i> </a></td>
                            <td class="select">
                                <a class ="print"  title="in" onclick="return Print('donhangroi','print-xacnhan-donhangroi',{detail.id_security})"><i class="fa-solid fa-print"></i></a>
                                 <a class ="" title="sao chép" onclick="return copy('donhangroi','copy-donhangcon',{detail.id_security})"><i class="fa-solid fa-copy"></i></a>
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" title="chỉnh sửa" onclick="return update_view('donhangroi','donhangcon-update-view',{detail.id_security})" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class="{xuly.xoa} {detail.edit_delete}" title="xóa" onclick= "return _delete('donhangroi','delete-donhangcon','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
  <div class="popup-create_add "></div>
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

