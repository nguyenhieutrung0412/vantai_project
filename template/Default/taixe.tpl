
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Tài xế</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Tài xế</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xulythem}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form-search-table" action="" method="post">
                            <input class="input" type="text" name="name_taixe" placeholder="Họ và tên">
                            <input class="input" type="tel" name="sdt_taixe" placeholder="Số điện thoại">
                            <input class="input" type="text" name="hangbanglai" placeholder="Hạng bằng lái xe">
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                        
                            <th>Hạng bằng lái xe</th>
                            <th>Tiền lương</th>
                            <th>Tỉ lệ hoa hồng</th>
                            <th>Phụ cấp</th>
                            <th>Tiền bảo hiểm</th>
                            <th>Số tài khoản</th>
                            <th>Ngân hàng</th>
                             <!--BOX boxadmin-->
                             <th>Mật khẩu</th>
                              <!--BOX boxadmin-->
                           
                            <th>Active</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.name_taixe}</td>
                            <td>{detail.phone_taixe}</td>
                            <td>{detail.address_taixe}</td>
                            <td>{detail.hangbanglai}</td>
                            <td>{detail.format_luong}</td>
                            <td>{detail.tile_hoahong}</td>
                            <td>{detail.phu_cap}</td>
                            <td>{detail.tien_baohiem}</td>
                            <td>{detail.stk}</td>
                            <td>{detail.ngan_hang}</td>
                            <!--BOX boxadmin-->
                            <td>{detail.pwd2}</td>
                             <!--BOX boxadmin-->
                        
                            <td class="active" ><a {detail.active}  onclick="return active_user('tai-xe','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                                <a class="btn-update {xulysua}" onclick="return update_view('tai-xe','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xulyxoa} " onclick= "return _delete('tai-xe','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddTaixe" id="frmAddTaixe" method="post" onsubmit = "return add('tai-xe','add','frmAddTaixe',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Họ và tên</td>
                 <td><input type="text" name="name"  placeholder="Họ và tên" required></td>
            </tr>
             <tr>
                 <td class="td-first">Số điện thoại</td>
                  <td><input type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" name="phone"  placeholder="Số điện thoại" required></td>
             </tr>
             <tr>
                <td class="td-first">Địa chỉ</td>
                 <td><input type="text" name="address"  placeholder="Địa chỉ" required></td>
            </tr>
            <tr>
                <td class="td-first">Hạng bằng lái</td>
              <td><input type="text" name="hangbanglai"  placeholder="Hạng bằng lái" required></td>
            </tr>
            <tr>
                <td class="td-first">Lương tài xế</td>
                <td><input autocomplete="off" type="text" name="luong_taixe" multiple   required></td>
            </tr>
             <tr>
                <td class="td-first">Phụ cấp</td>
                <td><input autocomplete="off" type="text" name="phu_cap" multiple   required></td>
            </tr>
             <tr>
                <td class="td-first">Tiền bảo hiểm</td>
                <td><input autocomplete="off" type="text" name="tien_baohiem" multiple   required></td>
            </tr>
            <tr>
                <td class="td-first">Tỉ lệ hoa hồng</td>
                <td><input autocomplete="off" type="text" name="tile_hoahong" multiple value="0"  ></td>
            </tr>
             <tr>
                <td class="td-first">Số tài khoản </td>
                <td><input autocomplete="off" type="text" name="stk" multiple   required></td>
            </tr>
             <tr>
                <td class="td-first">Tên ngân hàng</td>
                <td><input autocomplete="off" type="text" name="ten_nganhang" multiple   required></td>
            </tr>
             <tr>
                <td class="td-first">Mật khẩu</td>
                <td><input autocomplete="off" type="password" name="password" placeholder="Mật khẩu" required></td>
            </tr>
         </tbody>
         </table>
                
                
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" class="cancel">Đóng</button>
                </div>
            </form>
        </div>
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
