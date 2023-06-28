<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{include:tpl=master_header}
<script type="text/javascript" src="js/common.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if IE]>
<style type="text/css">
tr.show{ display: block; }
</style>
<![endif]--> 

</head>
<body>
	
<div class="wrapper">
	<div class="container">
		<div class="hd">
			<ul class="hd-r">
			<li class="li"><a  class="hd-profile" href="javascript:void(0)"><i class="fa-solid fa-user"></i></a>
				 		<ul class=" profile">
                            <li> 
								<div class="logo_profile">T</div>
								<div class="info_profile">
									<strong>{login_user.name_taixe}</strong>
									<p>Tài xế xe: {login_user.biensoxe}</p>
								</div>
							</li>
							
                            <li class="br-fix2" style="clear:both"> 
								<div class="logout"><a href="?mod=user&act=logout" style="cursor: pointer;">Đăng xuất</a>
								</div>
								<div class="change_pass"><a href="?mod=user&act=reset" class="hd-resetPass">Đổi mật khẩu?</a></div>
							
							</li>
                        </ul>
				
				</li>
				<li class="li"><a  class="hd-" href="?mod=luongtaixe&act=v&code={login_user.id_security}">Lương</a> </li>
				<li class="li"><a href="?mod=lenhhoanthanh&act=view">Lệnh</a> </li>
				<li class="li"><a  ><i class="fa-solid fa-bell br-white"></i></a> </li>
				
			</ul>
			<a class="hd-logo" href="./"><img src="images/logo1.jpg" alt="logo" ></a>
		</div>
		
		<div class="ct">
			
			
			<div class="main">
				<div class="mainInner">
							
					{include:tpl=body}
				</div>			
			</div>
		</div>
		
		<div class="ft">
			<ul>
				<li><a href="/apptaixe/"><i class="fa-solid fa-house"></i><br>Home</a></li>
				<li><a href="javascript:void(0)" onclick="window.location.reload(true);"><i class="fa-solid fa-arrows-rotate fa-spin"></i><br>Làm mới</a></li>
				<li><a><i class="fa-sharp fa-solid fa-magnifying-glass"></i><br>Tra cứu</a></li>
				<li class="fix"><a  href="?mod=notification&act=view"><i class="fa-solid fa-bell"></i><br>Thông báo</a></li>
			</ul>
		</div>
	</div>
</div>

<table width="5" height="100%" cellpadding="0" cellspacing="0" border="0" class="btn_expandMenu"><tr><td>&nbsp;</td></tr></table>

{include:tpl=master_footer}

</body>
</html>