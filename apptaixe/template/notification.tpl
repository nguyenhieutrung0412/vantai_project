
    <div class="page">
    <div class="container">
     <div class="back">
                 <a href="javascript:void(0)" onclick="history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
        <div class="all_notification">
        <h3>TẤT CẢ THÔNG BÁO</h3>
        
            <table>
                <tbody>
                <!--BASIC ds_notification-->
                    <tr>
                        <td>
                            <a href="javascript:void(0)" onclick="return notification_info('notification','info',{ds_notification.id})" class="{ds_notification.chua_doc}">{ds_notification.title}</a>
                        <!--BOX boxadmin-->
                            <span class= "xoa_thongbao" href="javascript:void(0)" onclick= "return _delete('notification','delete','{ds_notification.id_security}')"><i class="fa fa-trash "></i> Xóa<span>
                              <!--BOX boxadmin-->
                        </td>
                    </tr>
                <!--BASIC ds_notification-->
                </tbody>
            </table>
             
        </div>
    </div>
        </div>
