
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Lịch xe vận chuyển</h3>
                <div class="title-link">
                    <a >
                        <p class="active">Lịch xe từ ngày <span class="color-0">{ngay.ngayhientai}</span> đến ngày <span class="color-0">{ngay.ngaycongbay}</span></p>
                    </a>

                  
                </div>
            </div>
            <div class="table table_scroll">
                <br>
                <br>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Mã VĐ</th>
                            <th>Loại VĐ</th>
                            <th>Tên tài xế</th>
                            <th>Biển số xe</th>
                        
                            <th>Ngày vận chuyển</th>
                           
                
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                     <!--BASIC detail-->
                        <tr>
                            <td>{detail.stt}</td>
                            <td>{detail.id}</td>
                            <td>{detail.loai_don}</td>
                            <td>{detail.name_taixe}</td>
                            <td>{detail.biensoxe}</td>
                            <td class="color-0">{detail.thoigian_giaohang}</td>
                           
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
<div class="popup-update">    
</div>
<div class="popup-images">
    <div class="pop-up">
         <div class="upload">
          <a class="cancel-img"><i class="fa-regular fa-circle-xmark"></i></a>
            <form name="frmAddTaixe" id="frmAddTaixe" method="post" onsubmit = "return add('tai-xe','add','frmAddTaixe',1)"  enctype="multipart/form-data">
                    <div class="input_upload">
                        <label for="">Upload hình ảnh cho tài xế </label> <br>
                        <input type="file" name="img_file" multiple required>
                    </div>
                    <div class="btn-submit">
                        <button type="submit" class="submit">Upload</button>
                    </div>
            </form>         
        </div>
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="images/CMND.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                    <a href="">
                        <img class="img-responsive" src="images/CMND.jpg">
                    </a>
                     <a class="delete-img"><i class="fa-regular fa-circle-xmark"></i></a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3 fix" data-responsive="img/2-375.jpg 375, img/2-480.jpg 480, img/2.jpg 800" data-src="images/CMND.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="images/CMND.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/13-375.jpg 375, img/13-480.jpg 480, img/13.jpg 800" data-src="images/CMND.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="images/CMND.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3 fix" data-responsive="img/4-375.jpg 375, img/4-480.jpg 480, img/4.jpg 800" data-src="images/CMND.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="images/CMND.jpg">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
