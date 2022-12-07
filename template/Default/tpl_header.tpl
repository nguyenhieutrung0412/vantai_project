  <div class="left-header " >
        <div class="logo-header">
            <img src="images/logo-text.png" alt="logo">
        </div>
        <ul>
            <li>
                <div class="user-profile">
                    <div class="profile-img">
                        <img src="images/infomation.jpg" alt="">
                    </div>
                    <a class="drop-profile" style="cursor: pointer;">
                        <div class="profile-text">
                            {master.user_name}
                            <span class="after"></span>
                        </div>
                        <ul class=" profile">
                            <li> <a href="{root_dir}profile"><i class="fa-solid fa-user icon-user"></i> My Profile  </a></li>
                            <li> <a onclick="return logout()" style="cursor: pointer;"><i class="fa-solid fa-arrow-right-from-bracket icon-logout"></i> Logout </a></li>
                        </ul>
                    </a>
                </div>
            </li>
            </ul>
            <h3>Menu</h3>
            <ul class="left_menu">
                <li class="nav-item ">
                    <a class="active" href="{root_dir}"><i class="fa-solid fa-house-chimney"></i> <span>Trang chủ</span></a>
                </li>
                {menu}
                <!--BOX admin-->
                <li class="nav-item ">
                    <a class="active"><i class="fa-solid fa-gear"></i><span> Option</span></a>
                        <span class="drop-menu">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                        <ul class="drop-down-item">
                            <li>  <a class="item" href="{root_dir}cauhinh">Cấu hình</a></li>
                            <li>  <a class="item" href="{root_dir}menuadmin">Menu</a></li>
                        </ul>
                </li>
                <!--BOX admin-->
            </ul>
        </div>