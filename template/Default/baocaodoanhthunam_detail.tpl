
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Chi tiết doanh thu <span class="color-0">{detail.thang}</span > năm <span class="color-0">{detail.nam}</span></h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a>
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Chi tiết doanh thu</p>
                    </a>
                </div>
            </div>

             <div class="back">
                <a onclick="return back_prev();"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="list">
           
            <div class="list_baocao bg_1">
                <h3>Chi phí hoạt động</h3>
               <table class="detail-container " >

                     <thead>
                        <tr  class="title-table">
                            <th style="width: 50%;">Loại chi</th>
                            <th style="width: 10%;">Số lần chi</th>
                            <th>Tổng số tiền</th>
                        </tr>

                    </thead>
                    <tbody>
                           {detail.phieuchi_list}
                          
                    </tbody>
               </table>
                <table class="detail-container ">

                    <tbody>
                           {detail.theodoidau_list}
                        
                    </tbody>
               </table>
                 <table class="detail-container ">

                    <tbody>
                           {detail.theodoisuachua_list}
                        
                    </tbody>
               </table>
            
                   <table class="detail-container ">

                    <tbody>
                           {detail.luongnhansu_list}
                        
                    </tbody>
               </table>
               <table class="detail-container ">

                    <tbody>
                           {detail.luongtaixe_list}
                        
                    </tbody>
               </table>
               <table class="detail-container ">
               
                     <thead>
                        <tr  class="title-table">
                        </tr>
                        </thead>
                    <tbody>
                        <tr>
                          
                            <td colspan ="2" class="color-0" style="text-align:center;">Tổng : {detail.tong_phi_hoat_dong}</td>
                        </tr>
                    </tbody>
               </table>
            </div>
            <div class="list_baocao bg_2">
                <h3>Doanh thu</h3>
               <table class="detail-container ">

                     <thead>
                        <tr  class="title-table">
                            <th>Loại thu</th>
                            <th>Số lần thu</th>
                            <th>Tổng số tiền</th>
                        </tr>

                    </thead>
                    <tbody>
                           {detail.phieuthu_list}
                        <tr>
                            <td></td>
                            <td colspan ="2" class="color-0" >Tổng : {detail.tong_tien_thu_cua_nam}</td>
                        </tr>
                    </tbody>
               </table>
            </div>
            <div class="list_baocao bg_1">
                <h3>Lợi nhuận</h3>
               <table class="detail-container ">

                     <thead>
                        <tr  class="title-table">
                           
                            <th colspan="2">Tổng số tiền</th>
                            
                        </tr>

                    </thead>
                    <tbody>
                        <tr>   
                          <td class="color-0" colspan="2" style="text-align:center;">{detail.loi_nhuan}</td>
                        </tr>
                    </tbody>
               </table>
            </div>
             <div>
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



