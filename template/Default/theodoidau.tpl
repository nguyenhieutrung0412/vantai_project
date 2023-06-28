
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Theo dõi dầu - tháng {thang_nam.thang} năm {thang_nam.nam}</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Theo dõi dầu</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"  onclick="return add_view('theodoidau','add-view')"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                    <form class="form_search_table" autocomplete="off" id="form_search_table" method="post" onsubmit="return search_link('theodoidau','search','form_search_table')">
                            <input type="text" name="tentaixe_search" class="btn-phi_search" id="data_tensearch1" placeholder="Lọc theo tài xế"  onclick="return load_dulieu2('theodoidau','gettaixesearch-view','1',{thang_nam.thang},{thang_nam.nam})">
                            <input type="hidden" name="idtaixe_search" id="data_idtaixesearch1" >
                            <input type="text" name="tenxe_search" class="btn-phi_search" id="data_xesearch1" placeholder="Lọc theo biển số xe"  onclick="return load_dulieu2('theodoidau','getxesearch-view','1',{thang_nam.thang},{thang_nam.nam})">
                            <input type="hidden" name="idxe_search" id="data_idxesearch1" >
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
                            <th>Ngày đổ</th>
                            <th>Số km lúc đổ</th>
                            
                                                 
                            <th>Nguồn dầu</th>                          
                            <th>Mã số dầu trước khi đổ</th>                          
                            <th>Mã số dầu sau khi đổ</th>  
                            <th>Số Lít đổ</th>                             
                            <th>Đơn giá</th>                          
                            <th>Tổng tiền</th>                          
                            <th>Mức tiêu hao</th>                          
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
                            <td class="color-1 info" onclick="return info('theodoidau','info',{detail.id_security})" >{detail.ngay_do}</td>
                            <td>{detail.km_luc_do} km</td>
                          
                            <td>{detail.do_dau_ngoai}</td>
                            <td>{detail.msd_truockhido}</td>
                            <td>{detail.msd_saukhido}</td>
                              <td>{detail.so_lit} Lít</td>
                            <td>{detail.don_gia}</td>
                            <td>{detail.tong_tien}</td>
                            <td>{detail.muc_do_tieu_hao} L/Km</td>
                         
                            <td class="select">
                                <a class="btn-update {xuly.sua}" onclick="return update_view('theodoidau','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} " onclick= "return _delete('theodoidau','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
                            <td class="color-0">Tổng: {thang_nam.tong_so_lit} Lít</td>
                              <td ></td>
                              <td ></td>
                                <td ></td>
                                <td ></td>
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

