<div class="table_list toolbar"><a href="{http_referer}">&lt; {lang.back}</a></div>
<div class="form"><form action="" method="post" enctype="multipart/form-data" name="form1" id="fpermission">
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list table-Form1" id="table-list">
<!--     <tr>
      <td colspan="2"><h2>Data permission </h2></td>
      </tr>
    
     <tr>
      <td><input name="all_content" type="radio" id="permission_data[]" value="0" {all_content.0_checked} /></td>
      <td>Just content of this user </td>
    </tr>
     <tr>
       <td><input name="all_content" type="radio" id="radio" value="1" {all_content.1_checked} /></td>
       <td>All content </td>
     </tr>
-->   <tr>
      <td colspan="2"><h2>{lang.permission_action}</h2></td>
      </tr>
    <tr>
      <td><input name="action[new]" type="checkbox" id="action[]" {action.new} value="checked" /></td>
      <td>{lang.new}</td>
    </tr>
    <tr>
      <td><input name="action[edit]" type="checkbox" id="action[]" {action.edit} value="checked" /></td>
      <td>{lang.edit}</td>
    </tr>
    <tr>
      <td><input name="action[delete]" type="checkbox" id="action[]" {action.delete} value="checked" /></td>
      <td>{lang.delete}</td>
    </tr>
    <tr>
      <td><input name="checkbox" type="checkbox" disabled="disabled" value="checkbox" checked="checked" /></td>
      <td>{lang.view}</td>
    </tr>
    <tr>
      <td colspan="2"><h2>{lang.permission_module}</h2></td>
      </tr>
  <!--BASIC permission-->
    <tr>
      <td width="2%"><input type="checkbox" {permission.checked} name="act[{permission.index}][check]" value="true" onclick="checkAll('#table-list',this,'act[{permission.index}]');"></td>
      <td width="98%">&nbsp;{permission.section}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>{permission.actions}</td>
    </tr>
  <!--BASIC permission-->	
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="{lang.save}"> 
    <input type="button" class="btn btn_cancel" value="{lang.cancel}" onclick="location.href='{http_referer}';">
  </div>
</form></div>

<script type="text/javascript">
var opt = {
		required: [],
		lang: 'vn'
	};
	$('form#fpermission').validate(opt);
</script>
