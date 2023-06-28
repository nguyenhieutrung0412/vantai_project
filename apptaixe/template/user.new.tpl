<div class="top_callFunc">
	<a href="?mod=user" class="btn r">&lt; {lang.back}</a>
</div>

<form action="" method="post" enctype="multipart/form-data" name="form1" onsubmit="return user_new(this);" id="fuser">
  <span class="red">{error}</span>
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
    <tr>
      <td class="textLabel">{lang.name} <span class="red">*</span></td>
      <td><input name="fullname" type="text" id="title" value="{fullname}" title="Please enter Fullname">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">{lang.username} <span class="red">*</span></td>
      <td><input name="username" type="text" class="tinymce" id="username" value="{username}" title="Please enter Username"></td>
    </tr>
    <tr>
      <td class="textLabel">{lang.password} <span class="red">*</span></td>
      <td><input name="password" type="password" class="tinymce" id="password" title="Please enter password" value="{password}" /></td>
    </tr>
    <tr>
      <td class="textLabel">{lang.confirm_password} <span class="red">*</span></td>
      <td><input name="confirm_password" type="password" class="tinymce" id="confirm_password" title="Confirm password must same with Password" value="{confirm_password}" /></td>
    </tr>
    <tr>
      <td class="textLabel">{lang.skin}</td>
      <td><select name="skin" id="skin">
	  <!--BASIC skin-->
        <option value="{skin.value}" {skin.selected}>{skin.name}</option><!--BASIC skin-->
      </select>      </td>
    </tr>
	<tr>
	  <td class="textLabel">{lang.icon}</td>
	  <td><select name="icon" id="icon">
        <!--BASIC icon-->
        <option value="{icon.value}" {icon.selected}>{icon.name}</option>
        <!--BASIC icon-->
      </select></td>
    </tr>
	<tr>
      <td class="textLabel">&nbsp;</td>
      <td align="right"><br />
	  	<input type="submit" class="btn" name="Submit" value="{lang.save}">
	  <input type="button" class="btn btn_cancel" value="{lang.cancel}" onclick="location.href='{http_referer}';">      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var opt = {
		required: ['fullname','username','password','confirm_password'],
		lang: 'vn'
	};
	$('form#fuser').validate(opt);
</script>