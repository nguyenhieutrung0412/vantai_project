
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Theo dõi thay nhớt - tháng {thang_nam.thang} năm {thang_nam.nam}</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Theo dõi thay nhớt</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"  onclick="return add_view('thaynhot','add-view')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                    <form class="form_search_table" autocomplete="off" id="form_search_table" method="post" onsubmit="return search_link('thaynhot','search','form_search_table')">
                             <input type="text" name="tentaixe_search" class="btn-phi_search" id="data_tensearch1" placeholder="Lọc theo tài xế"  onclick="return load_dulieu2('thaynhot','gettaixesearch-view','1',{thang_nam.thang},{thang_nam.nam})">
                            <input type="hidden" name="idtaixe_search" id="data_idtaixesearch1" >
                            <input type="text" name="tenxe_search" class="btn-phi_search" id="data_xesearch1" placeholder="Lọc theo biển số xe"  onclick="return load_dulieu2('thaynhot','getxesearch-view','1',{thang_nam.thang},{thang_nam.nam})">
                            <input type="hidden" name="idxe_search" id="data_idxesearch1" >
                            <input type="text" name="tendonvi_search" class="btn-phi_search" id="data_donvisearch1" placeholder="Lọc theo đơn vị sửa chữa"  onclick="return load_dulieu2('thaynhot','getdonvisearch-view','1',{thang_nam.thang},{thang_nam.nam})">
                            <input type="hidden" name="iddonvi_search" id="data_iddonvisearch1">
                            <input type="text" name ="from_ngay" id ="from_ngay"class="picker" placeholder="Từ ngày">
                            <input type="text" name ="to_ngay" id ="to_ngay" class="picker" placeholder="Đến ngày">
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
                            <th>STT</th>
                            <th>Mã</th>
                            <th>Tên tài xế</th>
                            <th>Biển số xe</th>
                            <th>Đơn vị thay nhớt</th>
                            <th>Ngày thay nhớt</th>
                            <th>Số km lúc thay nhớt</th>
                            <th>Nội dung</th>                          
                            <th>Tổng tiền</th>   
                            <!--BOX boxadmin-gd-ktt-->                       
                            <th>Xét duyệt</th>                          
                            <th>Reset km</th> 
                            <!--BOX boxadmin-gd-ktt-->                         
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.stt}</td>
                            <td>{detail.id}</td>
                            <td>{detail.name_taixe}</td>
                            <td>{detail.biensoxe}</td>
                            <td class="green info" onclick="return info('thaynhot','info_donvi',{detail.id_security})" title="xem thông tin">{detail.ten_donvi}</td>
                            <td class="color-1 info" onclick="return info('thaynhot','info',{detail.id_security})" title="xem thông tin sửa chữa">{detail.ngay_thaynhot}</td>
                            <td>{detail.km_luc_thaynhot} km</td>
                            <td>{detail.noidung}</td>
                            <td>{detail.tong_tien}</td>
                            <!--BOX boxadmin-gd-ktt-->
                            <td class="active" ><a {detail.active}  onclick="return active_user('thaynhot','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="active" ><a {detail.reset}  onclick="return active_user('thaynhot','reset-km','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <!--BOX boxadmin-gd-ktt-->
                            <td class="select">
                                <a class="btn-update {xuly.sua} {detail.edit_delete}" onclick="return update_view('thaynhot','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} {detail.edit_delete}" onclick= "return _delete('thaynhot','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                      
                    <!--BASIC detail-->
                      <tr>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td></td>
                            <td class="color-0">Tổng: {thang_nam.tong_tien_thang}</td>
                            <td></td>
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

<div class="popup-create">
        
</div>

<div class="popup-update">    
</div>
<div class="popup-upload-img">
   
</div>
<div class ="popup-dieulenh  popup-info">

</div>

