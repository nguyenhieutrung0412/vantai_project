
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Menu</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Menu</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xulythem}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                       
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Id</th>
                            <th>Tên menu</th>
                        
                            <th>Active</th>
                            
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.name_menu}</td>
                            <td class="active" ><a {detail.active}  onclick="return active_user('menuadmin','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                                <a class="btn-update {xulysua}" onclick="return update_view('menuadmin','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xulyxoa} " onclick= "return _delete('menuadmin','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                    <!--BASIC detail-->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="title">
                <h3>Sub-Menu</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a href="">
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Sub-Menu</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create2 {xulythem}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                       
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Id</th>
                            <th>Tên sub-menu</th>
                            <th>Menu</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail2-->
                        <tr>
                            <td>{detail2.id}</td>
                            <td>{detail2.name}</td>
                            <td>{detail2.name_menu}</td>
                            <td class="select">
                                <a class="btn-update2 {xulysua}" onclick="return update_view2('menuadmin','update-view-sub',{detail2.id_security})" > <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xulyxoa} " onclick= "return _delete('menuadmin','delete-sub','{detail2.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
                        </tr>
                    <!--BASIC detail2-->
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
            <form autocomplete="off" name="frmAddMenu" id="frmAddMenu" method="post" onsubmit = "return add('menuadmin','add','frmAddMenu',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td>Tên menu</td>
                 <td><input type="text" name="name_menu"  placeholder="Tên Menu" required></td>
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
<div class="popup-create2">
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddMenu-sub" id="frmAddMenu-sub" method="post" onsubmit = "return add('menuadmin','add-sub','frmAddMenu-sub',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên menu-sub</td>
                 <td><input type="text" name="name_menu"  placeholder="Tên Menu-sub" required></td>
            </tr>
            <tr>
                <td class="td-first">Tên menu chính</td>
                 <td>
                    <select name="id_menucha" id="id_menucha">
                 <option value="">Chọn menu chính</option>
                    <!--BASIC detail-->
                        <option value="{detail.id}" >{detail.name_menu}</option>
                    <!--BASIC detail-->
                    </select></td>
            </tr>
         </tbody>
         </table>
                
                
                <div class="btn-submit">
                    
                    <button type="submit" class="submit">Thêm</button>
                    <button type="reset" class="cancel" >Đóng</button>
                </div>
            </form>
        </div>
</div>
<div class="popup-update">    
</div>
<div class="popup-update2">    
</div>
