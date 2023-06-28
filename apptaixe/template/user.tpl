<div class="top_callFunc">
	<a href="?mod=user&act=update&do=new" class="btn l">{lang.new}</a>
</div>

<div class="error hide">{msg}</div>
<div class="form">

<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list marginTop5">
  <tr>
    <th width="1%" class="th-name firstColumn">&nbsp;</th>
    <th width="41%" class="th-name">{lang.name}</th>
    <th width="24%" class="th-name">{lang.username}</th>
    <th width="13%" class="th-action">{lang.status}</th>
    <th width="21%" class="th-action lastColumn">{lang.actions}</th>
  </tr>
  <!--BASIC user-->
  <tr>
    <td class="th-name firstColumn">&nbsp;</td>
    <td class="th-name">{user.fullname}</td>
    <td class="th-name">{user.username}</td>
    <td class="th-action lastColumn"><a {user.return} href="?mod=user&amp;act=active&amp;id={user.id}" title="{user.status}"><img src="images/icons_default/status{user.active}.gif"  /></a>	</td>
    <td class="th-action lastColumn"><span class="hide" {user.delete}><a href="?mod=user&act=permission&id={user.id}" title="{lang.permission}"><img src="images/icons_default/permission.png" width="16" height="16" /></a></span> <span class="hide" {user.delete}><a href="?mod=user&act=reset&id={user.id}" title="{lang.reset_password}"><img src="images/icons_default/pswd.png" width="16" height="16" /></a></span>  <span><a href="?mod=user&act=update&id={user.id}" title="{lang.edit}"><img src="images/icons_default/edit.png" width="16" height="16" /></a></span> <span class="hide" {user.delete}><a href="?mod=user&act=delete&id={user.id}" title="{lang.delete}" onClick="deleteConfirm(this); return false;"><img src="images/icons_default/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC user-->
</table>
</div>