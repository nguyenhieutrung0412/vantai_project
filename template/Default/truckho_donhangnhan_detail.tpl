
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Quản lý đơn hàng {detail_v.text}   <span class="color-0"> </span></h3>
                
                
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Chi tiết đơn hàng {detail_v.text}</p>
                    </a>
                </div>
            </div>
             <div class="back_prev">
                <a onclick="return back_prev();"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="table table_scroll">
               
                <div class="first-table">

                 

                  
                        <form class="form-search-table" action="" method="post">
                            
                           
                          
                           
                         
                        </form>
                            

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
                            <th>Số lượng hàng</th>
                            <th>Trọng lượng</th>
                            <th>Tên người lấy hàng</th>
                           
                            <th>Đ/C giao hàng</th>
                            <th>Sdt người nhận</th>
                            <th>Thời gian nhận hàng</th>
                            <th>Thời gian giao hàng dự kiến</th>
                            <th>Phí vận chuyển</th>
      
                            <th>Tình trạng</th>
                            
                        </tr>

                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.stt}</td>
                            
                            <td class="color-1 info" onclick="return info('donhangroi','info',{detail.id_security})" >{detail.id}</td>
                            <td >{detail.name_kh}</td>
                            <td >{detail.sdt_kh}</td>
                            <td >{detail.diachi_nhanhang}</td>
                            <td >{detail.loaihang} </td>
                            <td >{detail.soluong_hanghoa}</td>
                            <td >{detail.trongluong_hanghoa} Kg</td>
                            
                            <td >{detail.ten_nguoinhan}</td>
                            
                            <td >{detail.diachi_giaohang}</td>
                            <td >{detail.phone_nguoinhan}</td>
                            <td >{detail.thoigian_nhanhang}</td>
                            <td >{detail.thoigian_giaohang}</td>
                            <td>{detail.format_luong}</td>
                           
                            
                            <td class="active"><a class="button info {detail.disalbed} {detail.class_info}"    onclick="return {detail.link}"> {detail.tinhtrang_kho} </a></td>
                            
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

