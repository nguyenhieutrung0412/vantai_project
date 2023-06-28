
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Đội xe</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Quản lý đội xe</p>
                    </a>
                </div>
            </div>
            <div class="table table_scroll">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                         <form class="form-search-table" id="form_search_table"  method="post"  onsubmit="return search_link('doixe','search','form_search_table')" enctype ="multipart/form-data">
                            <input class="input" type="text" name="name_xe" placeholder="Loại xe">
                             <input class="input" type="text" name="biensoxe" placeholder="Biển số xe">
                      
                         
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Loại xe</th>
                            <th>Tải trọng</th>
                            <th>Số khối</th>

                            <th>Biển số xe</th>
                            <th>Tài xế phụ trách</th>
                            <th>Hạn đăng kiểm</th>
                          
                            <th>Active</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                         
                            <td class="color-1 info" onclick="return info('doixe','info',{detail.id_security})">{detail.loaixe}</td>
                            <td>{detail.tai_trong}</td>
                            <td>{detail.so_khoi}</td>
                          
                            <td>{detail.biensoxe}</td>
                           <td>{detail.name_taixe}</td>
                           <td>{detail.han_dang_kiem} <span {detail.class_hdk}>({detail.hdk_con_lai} ngày)<span></td>
                         
                            <td class="active"><a {detail.active}  onclick="return active_user('doixe','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                                <a class="btn-update {xuly.sua}" onclick="return update_view('doixe','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class ="{xuly.xoa}" onclick= "return _delete('doixe','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
        <span class="close_pop">×</span>
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddDoiXe" id="frmAddDoiXe" method="post" onsubmit = "return add('doixe','add','frmAddDoiXe',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Loại xe *</td>
                 <td><input type="text" name="loaixe"  placeholder="Loại xe"  required></td>
             </tr>
             <tr>
                <td class="td-first">Biển số xe *</td>
                <td>  <input type="text" name="biensoxe"  placeholder="Biển số xe" required></td>
            </tr>
             <tr>
                <td class="td-first">Tải trọng *</td>
                <td>  <input type="text" name="tai_trong"  placeholder="Tải trọng" required></td>
            </tr>
             <tr>
                <td class="td-first">Số khối *</td>
                <td>  <input type="text" name="so_khoi"  placeholder="Số khối" required></td>
            </tr>
             <tr>
                <td class="td-first">Hạn đăng kiểm *</td>
                <td>  <input type="text" class="picker" name="han_dang_kiem"  placeholder="Hạn đăng kiểm" required></td>
            </tr>
            <tr>
                <td class="td-first">Tài xế phụ trách *</td>
                <td><input list="list_tx" name="list_tx" >
                        <datalist id="list_tx">
                        <!--BASIC list_tx-->
                            <option value="{list_tx.name_taixe} {list_tx.phone_taixe}"></option>
                        <!--BASIC list_tx-->
                        </datalist></td>
            </tr>
              <tr>
                 <td class="td-first">Hình ảnh đính kèm(nếu có)</td>
                <td><input type="file"  name="img_file[]" id="img_file" multiple accept= "image/*"></td>
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

<div class ="popup-dieulenh  popup-info">
</div>
