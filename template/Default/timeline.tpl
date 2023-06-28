
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Timeline- Đơn hàng trọn gói</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p>Đơn hàng</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
                
                <div class="first-table">


                  
                        <form class="form-search-table" action="" method="post">
                            <input class="input" type="text" name="madonhang" placeholder="Mã đơn hàng">
                            
                          
                           
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                            
                         
                        </form>
                           

                </div>
                 
                <div class="timeline">
                    <ul>
                        <!--BASIC detail-->
                        <li>
                            <div class="top-timeline">
                                <span class="color-0">Mã đơn :{detail.id}</span>    
                                <span>Tên khách hàng :{detail.name_kh}</span>    
                                <span>Tài xế :{detail.name_taixe}</span>    
                                <span>Biển số xe :{detail.biensoxe}</span>    
                                <span>Phụ xe :{detail.name_phuxe}</span>    
                            </div>    
                            <div class="bottom-timeline">
                                <div class="line {detail.check-1}">
                                <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','xuatben')">
                                    <div class="circle-box {detail.check-1}">
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
                                           Đang giao
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <div class="line {detail.check-3}">
                                 <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','giaohangtoidiachi')">
                                    <div class="circle-box {detail.check-3}">
                                        <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                            Giao hàng tới địa chỉ
                                        </div>
                                    </div>
                                </a>
                                </div>
                                <div class="line {detail.check-4}">
                                <a class="btn-timeline"  onclick="return add_view_timeline('donhang','timeline-donhangtrongoi-view','{detail.id_security}','hoanthanh')">
                                    <div class="circle-box {detail.check-4}">
                                        <div class="caption" data-caption="CHÚ THÍCH TRÊN CỦA BẠN">
                                            Hoàn thành
                                        </div>
                                    </div>
                                    </a>
                                </div>

                            </div>
                            
                        </li>
                       <!--BASIC detail-->
                    </ul>

                <div>
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

<div class="popup-dieulenh ">
   
</div>
<div class="popup-thongtintaixe ">
   
</div>

