<div class="nav-bar">
            <div class="nav-bar-left">
                <ul>
                    <li class="nav-item-left nav-in">
                        <a class="nav-link " id="sm-nav" style=" cursor: pointer;">
                            <span class="fa-solid"></span>
                        </a>
                    </li>
                  
                    <li class="nav-item-left">
                        <a class="nav-link btn-notification" style=" cursor: pointer;" >
                            <i class="fa-solid fa-bell"></i>
                              
                        </a>
                      <div class= "icon-notification {total.delete}">
                            {total.num}
                        </div>
                        <div class="notification">
                            <ul>
                            <!--BASIC notification-->
                                <li>
                                    <a onclick="return notification_info('notification','info',{notification.id})" class ="chua_doc">{notification.title}</a>
                                    <p onclick="return notification_info('notification','info',{notification.id})">{notification.p}...</p>
                                </li>
                            <!--BASIC notification-->
                            </ul>
                            <a class="btn all-notification" href="{root_dir}notification">Xem tất cả các thông báo </a>
                            <!--BOX boxadmin-->
                                <a class="btn send-notification">Gửi thông báo <i class="fa-solid fa-paper-plane"></i></a>
                            <!--BOX boxadmin-->
                        </div>
                    </li>
                </ul>
                <div class="popup-send-notification">
                    <div class="pop-up">
                        <h3>Gửi thông báo</h3>
                        <form name="frmAddNotification" id="frmAddNotification" method="post" onsubmit = "return add('notification','add','frmAddNotification','img_file')"  enctype="multipart/form-data">
                            <div >
                                <table class="table-input">
                                    <tbody>
                                        <tr>
                                            <td class="td-first">Chủ đề </td>
                                            <td>
                                                <input type="text" name="title"  placeholder="Chủ đề"  required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-first">Nội dung </td>
                                            <td>
                                                <textarea name="content" id="" cols="30" rows="10" required></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-first">Đính kèm file(nếu có) </td>
                                            <td>
                                                <input type="file" name="pdf_file[]"  id="img_file" multiple accept=".doc,.docx,.pdf" >
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="btn-submit">
                                <button type="reset" class="cancel">Trở lại</button>
                                <button type="submit" class="submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="nav-bar-right">
               <h4>{master.company}</h4>
            </div>
        </div>