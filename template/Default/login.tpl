<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<script type="text/javascript" src="template/Default/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="template/Default/js/login.js"></script>

<link rel="stylesheet" type="text/css" href="template/Default/style/all.css" media="all"/>
<link rel="stylesheet" type="text/css" href="template/Default/style/main.css" />
</head>

<body>
<div class="body-login">
<div class="login">
        <div class="title-login">
            <h2>Login</h2>
        </div>
    <div id="login">	
        <form class="form_login" name="form_login" method="post" enctype="multipart/form-data" onsubmit="return checkLogin();">
            <div class="form-input">
                <i class="fa fa-user fa-input"></i><input type="tel" name="phone" id="login-username" maxlength="10" placeholder="Phone" required>
            </div>
            <div class="form-input">
                <i class="fa fa-lock fa-input"></i>
                <input type="password" class="pwd" name="pwd" id="login-password" maxlength="30" placeholder="Password" required>
                <span class="show-btn" onclick ="return hideShow()"><i class="fas fa-eye"></i></span>
            </div>
            
            <button type="submit" name="btn-login"><i class="fa fa-lock-open"></i> Login</button>
            <span class="msg-error">{error}</span>
        </form>
    </div>
     </div>
</div>
</body>
</html>