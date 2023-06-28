<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form">
<form name="form1" method="post" action="">
<p>Mode: HTML<br>
  Id: #{page_or_id}</p>
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="table-Form1 table_list">
      <tr>
        <td width="21%">Name</td>
        <td width="79%"><input name="name" class="no_width" type="text" id="name" value="{name}" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea name="content" rows="3" class="no_width">{content}</textarea></td>
      </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="act[]2" type="checkbox" class="no_width" id="act[]2" value="seo" {seo_checked} />
Web SEO </td>
  </tr>
    <tr>
      <td><h4>Text Editor </h4></td>
      <td><input name="act[]" type="checkbox" id="act[]" value="enable_editor"  {enable_editor_checked} class="no_width" /> 
         Enable TinyMCE </td>
    </tr>
	  
      <tr>
        <td>Languages</td>
        <td><select name="languages">
          <option value="0">All</option>
		  <option value="1" {selected_languages_1}>Default language</option>
        </select>        </td>
      </tr>
      <tr>
        <td>Extra Files </td>
        <td><table width="666" border="0" cellpadding="1" cellspacing="1" id="file_extra">
          <tr>
            <td width="144">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39">Code</td>
            <td width="249">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221">Note</td>
          </tr>
		  <!--BASIC file_extra-->
          <tr>
            <td><input type="text" name="file_extra[name][]" value="{file_extra.name}" /></td>
            <td><input name="file_extra[code][]" type="text" id="file_extra[code][]" value="{file_extra.code}" size="5" /></td>
            <td><input type="text" name="file_extra[type][]" value="{file_extra.type}" /></td>
            <td><input type="text" name="file_extra[note][]" value="{file_extra.note}" /><a href="#" onclick="delete_file_extra(this);"> x </a></td>
          </tr>
          <!--BASIC file_extra-->
        </table>
		<a href="#" onclick="add_file_extra();">Add</a>		</td>
      </tr>
      <tr>
        <td>Template update </td>
        <td><input name="tpl_update" type="text" id="tpl_update" value="{tpl_update}" /></td>
      </tr>
    </table>
    <h3>Configure HTML </h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table-Form1 table_list">
  <tr>
        <td bgcolor="#CCCCCC">Main content </td>
        <td bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
        <tr>
        <td>Enable input date </td>
        <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="enable_date" {enable_date_checked} /></td>
      </tr>

   <tr>
    <td valign="top">Show main fields </td>
    <td>
	<p><a href="?mod=configure&act=addfield&tbl=html" class="divbox">New field</a></p>
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="17%" bgcolor="#eeeeee">Field</td>
        <td width="6%" bgcolor="#eeeeee">Name</td>
        <td width="14%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="13%" bgcolor="#eeeeee">Description</td>
        <td width="37%" bgcolor="#eeeeee">Require message </td>
        <td width="37%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC main_field-->
      <tr>
        <td><input type="checkbox" name="main_fields[{main_field.code}][chose]" {main_field.chose_checked} value="1" />
          {main_field.code}</td>
        <td><input name="main_fields[{main_field.code}][name]" type="text" size="8" value="{main_field.name}"/></td>
        <td>{main_field.type}      </td>
        <td><input type="checkbox" name="main_fields[{main_field.code}][require]" value="1" {main_field.require_checked} /></td>
        <td><input name="main_fields[{main_field.code}][description]" type="text" size="8" value="{main_field.description}" /></td>
        <td><input name="main_fields[{main_field.code}][require_msg]" type="text" size="10" value="{main_field.require_msg}" /></td>
        <td><input name="main_fields[{main_field.code}][sortorder]" type="text" size="10" value="{main_field.sortorder}" /></td>
      </tr><!--BASIC main_field-->
    </table></td>
  </tr>
  <tr>
    <td valign="top">Show language fields </td>
    <td><p><a href="?mod=configure&act=addfield&tbl=html_ln" class="divbox">New field</a></p>
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="17%" bgcolor="#eeeeee">Field</td>
        <td width="6%" bgcolor="#eeeeee">Name</td>
        <td width="14%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="13%" bgcolor="#eeeeee">Description</td>
        <td width="37%" bgcolor="#eeeeee">Require message </td>
        <td width="37%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC ln_field-->
      <tr>
        <td><input type="checkbox" name="ln_fields[{ln_field.code}][chose]" {ln_field.chose_checked} value="1" />
          {ln_field.code}</td>
        <td><input name="ln_fields[{ln_field.code}][name]" type="text" size="8" value="{ln_field.name}"/></td>
        <td>{ln_field.type}      </td>
        <td><input type="checkbox" name="ln_fields[{ln_field.code}][require]" value="1" {ln_field.require_checked} /></td>
        <td><input name="ln_fields[{ln_field.code}][description]" type="text" size="8" value="{ln_field.description}" /></td>
        <td><input name="ln_fields[{ln_field.code}][require_msg]" type="text" size="10" value="{ln_field.require_msg}" /></td>
        <td><input name="ln_fields[{ln_field.code}][sortorder]" type="text" size="10" value="{ln_field.sortorder}" /></td>
      </tr><!--BASIC ln_field-->
    </table>
     </td>
  </tr>
	  <tr>
        <td>Extra general fields </td>
        <td><table width="666" border="0" cellpadding="1" cellspacing="1" id="fields_extra">
          <tr>
            <td width="144">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39">Code</td>
            <td width="249">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221">Note</td>
          </tr>
		  <!--BASIC fields_extra-->
          <tr>
            <td><input type="text" name="fields_extra[name][]" value="{fields_extra.name}" /></td>
            <td><input name="fields_extra[code][]" type="text" id="fields_extra[code][]" value="{fields_extra.code}" size="5" /></td>
            <td><input type="text" name="fields_extra[type][]" value="{fields_extra.type}" /></td>
            <td><input type="text" name="fields_extra[note][]" value="{fields_extra.note}" /><a href="#" onclick="delete_row(this);return false;"> x </a></td>
          </tr>
          <!--BASIC fields_extra-->
        </table>
		<a href="#" onclick="add_fields_extra(); return false;">Add</a>		</td>
      </tr>
	  <tr>
        <td>Extra language fields </td>
        <td><table width="666" border="0" cellpadding="1" cellspacing="1" id="ln_fields_extra">
          <tr>
            <td width="144">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39">Code</td>
            <td width="249">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221">Note</td>
          </tr>
		  <!--BASIC ln_fields_extra-->
          <tr>
            <td><input type="text" name="ln_fields_extra[name][]" value="{ln_fields_extra.name}" /></td>
            <td><input name="ln_fields_extra[code][]" type="text" id="ln_fields_extra[code][]" value="{ln_fields_extra.code}" size="5" /></td>
            <td><input type="text" name="ln_fields_extra[type][]" value="{ln_fields_extra.type}" /></td>
            <td><input type="text" name="ln_fields_extra[note][]" value="{ln_fields_extra.note}" /><a href="#" onclick="delete_row(this);return false;"> x </a></td>
          </tr>
          <!--BASIC ln_fields_extra-->
        </table>
		<a href="#" onclick="add_ln_fields_extra(); return false;">Add</a>		</td>
      </tr>
  
  <tr>
    <td valign="top"><h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="image" {image_checked}> 
      Main Image</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><input name="main_icon[chose]" type="checkbox" class="no_width" id="main_icon[chose]" value="1" {main_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="main_icon[w]" type="text" class="no_width" id="main_icon[w]" size="2" maxlength="3" value="{main_icon_w}">
      x
      
      <input name="main_icon[h]" type="text" class="no_width" id="main_icon[h]" size="2" maxlength="3" value="{main_icon_h}">
	  Field name <input name="main_icon[name]" type="text" class="no_width" id="main_icon[name]" value="{main_icon_name}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="main_icon[force_resize]" type="radio" value="true" {main_icon_force_resize_true} />
Force resize
  <input name="main_icon[force_resize]" type="radio" value="false" {main_icon_force_resize_false} />
Flexible  </td>
    <td><input name="main_icon[specify]" type="radio" value="none"  {main_icon_specify_none} />
      None
      <input name="main_icon[specify]" type="radio" value="min" {main_icon_specify_min} />
Min 
  <input name="main_icon[specify]" type="radio" value="max"  {main_icon_specify_max} />
Max </td>
    <td><input name="main_icon[orginal]" type="radio" value="0" {main_icon_orginal_0} />
No 
  <input name="main_icon[orginal]" type="radio" value="1" {main_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
	  </div>	  </td>
  </tr>
  <tr>
    <td><input name="main_img[chose]" type="checkbox" class="no_width" id="main_img[chose]" value="1" {main_img_chose}>
      Image</td>
    <td>Resize 
      <input name="main_img[w]" type="text" class="no_width" id="main_img[w]" size="2" maxlength="3" value="{main_img_w}">
      x
      <input name="main_img[h]" type="text" class="no_width" id="main_img[h]" size="2" maxlength="3" value="{main_img_h}"> 
      Field name <input name="main_img[name]" type="text" class="no_width" id="main_img[name]"  value="{main_img_name}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="main_img[force_resize]" type="radio" value="true" {main_img_force_resize_true} />
Force resize
  <input name="main_img[force_resize]" type="radio" value="false" {main_img_force_resize_false} />
Flexible  </td>
    <td><input name="main_img[specify]" type="radio" value="none"  {main_img_specify_none} />
      None
      <input name="main_img[specify]" type="radio" value="min" {main_img_specify_min} />
Min 
  <input name="main_img[specify]" type="radio" value="max"  {main_img_specify_max} />
Max </td>
    <td><input name="main_img[orginal]" type="radio" value="0" {main_img_orginal_0} />
No 
  <input name="main_img[orginal]" type="radio" value="1" {main_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>

</div></td>
  </tr>
  <tr>
    <td><input name="main_thumb[chose]" type="checkbox" class="no_width" id="main_thumb[chose]" value="1" {main_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="main_thumb[w]" type="text" class="no_width" id="main_thumb[w]" size="2" maxlength="3" value="{main_thumb_w}">
      x
      <input name="main_thumb[h]" type="text" class="no_width" id="main_thumb[h]" size="2" maxlength="4" value="{main_thumb_h}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="main_thumb[force_resize]" type="radio" value="true" {main_thumb_force_resize_true} />
Force resize
  <input name="main_thumb[force_resize]" type="radio" value="false" {main_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="main_thumb[specify]" type="radio" value="none"  {main_thumb_specify_none} />
      None
      <input name="main_thumb[specify]" type="radio" value="min" {main_thumb_specify_min} />
Min 
  <input name="main_thumb[specify]" type="radio" value="max"  {main_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
</div></td>
  </tr>
  <tr>
    <td valign="top"><h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="ln_image" {ln_image_checked}> 
      Languages Image</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><input name="ln_main_icon[chose]" type="checkbox" class="no_width" id="ln_main_icon[chose]" value="1" {ln_main_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="ln_main_icon[w]" type="text" class="no_width" id="ln_main_icon[w]" size="2" maxlength="4" value="{ln_main_icon_w}">
      x
      
      <input name="ln_main_icon[h]" type="text" class="no_width" id="ln_main_icon[h]" size="2" maxlength="4" value="{ln_main_icon_h}"> 
      Field name <input name="ln_main_icon[name]" type="text" class="no_width" id="ln_main_icon[name]" value="{ln_main_icon_name}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="ln_main_icon[force_resize]" type="radio" value="true" {ln_main_icon_force_resize_true} />
Force resize
  <input name="ln_main_icon[force_resize]" type="radio" value="false" {ln_main_icon_force_resize_false} />
Flexible  </td>
    <td><input name="ln_main_icon[specify]" type="radio" value="none"  {ln_main_icon_specify_none} />
      None
      <input name="ln_main_icon[specify]" type="radio" value="min" {ln_main_icon_specify_min} />
Min 
  <input name="ln_main_icon[specify]" type="radio" value="max"  {ln_main_icon_specify_max} />
Max </td>
    <td><input name="ln_main_icon[orginal]" type="radio" value="0" {ln_main_icon_orginal_0} />
No 
  <input name="ln_main_icon[orginal]" type="radio" value="1" {ln_main_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div></td>
  </tr>
  <tr>
    <td><input name="ln_main_img[chose]" type="checkbox" class="no_width" id="ln_main_img[chose]" value="1" {ln_main_img_chose}>
      Image</td>
    <td>Resize 
      <input name="ln_main_img[w]" type="text" class="no_width" id="ln_main_img[w]" size="2" maxlength="4" value="{ln_main_img_w}">
      x
      <input name="ln_main_img[h]" type="text" class="no_width" id="ln_main_img[h]" size="2" maxlength="4" value="{ln_main_img_h}">
	  Field name <input name="ln_main_img[name]" type="text" class="no_width" id="ln_main_img[name]"  value="{ln_main_img_name}">	  
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="ln_main_img[force_resize]" type="radio" value="true" {ln_main_img_force_resize_true} />
Force resize
  <input name="ln_main_img[force_resize]" type="radio" value="false" {ln_main_img_force_resize_false} />
Flexible  </td>
    <td><input name="ln_main_img[specify]" type="radio" value="none"  {ln_main_img_specify_none} />
      None
      <input name="ln_main_img[specify]" type="radio" value="min" {ln_main_img_specify_min} />
Min 
  <input name="ln_main_img[specify]" type="radio" value="max"  {ln_main_img_specify_max} />
Max </td>
    <td><input name="ln_main_img[orginal]" type="radio" value="0" {ln_main_img_orginal_0} />
No 
  <input name="ln_main_img[orginal]" type="radio" value="1" {ln_main_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div></td>
  </tr>
  <tr>
    <td><input name="ln_main_thumb[chose]" type="checkbox" class="no_width" id="ln_main_thumb[chose]" value="1" {ln_main_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="ln_main_thumb[w]" type="text" class="no_width" id="ln_main_thumb[w]" size="2" maxlength="4" value="{ln_main_thumb_w}">
      x
      <input name="ln_main_thumb[h]" type="text" class="no_width" id="ln_main_thumb[h]" size="2" maxlength="4" value="{ln_main_thumb_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="ln_main_thumb[force_resize]" type="radio" value="true" {ln_main_thumb_force_resize_true} />
Force resize
  <input name="ln_main_thumb[force_resize]" type="radio" value="false" {ln_main_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="ln_main_thumb[specify]" type="radio" value="none"  {ln_main_thumb_specify_none} />
      None
      <input name="ln_main_thumb[specify]" type="radio" value="min" {ln_main_thumb_specify_min} />
Min 
  <input name="ln_main_thumb[specify]" type="radio" value="max"  {ln_main_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
	</div></td>
  </tr>
  <tr>
    <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="gallery" {gallery_checked}> 
      Gallery Image </h4></td>
    <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="drapdrop_gallery" {drapdrop_gallery_checked} /> Enable drap-n-drop gallery&nbsp;
	  <br />
	  Gallery Order (id desc or asc) <br />
      Gallery name: 
      <input name="gallery_name" type="text" id="gallery_name" value="{gallery_name}" /></td>
  </tr>

  <tr>
    <td>Show fields </td>
    <td><input name="gallery_fields" type="text" id="gallery_fields" value="{gallery_fields}" /></td>
  </tr>
  <tr>
    <td width="200"><input name="gallery_icon[chose]" type="checkbox" class="no_width" id="gallery_icon[chose]" value="1" {gallery_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="gallery_icon[w]" type="text" class="no_width" id="gallery_icon[w]" size="2" maxlength="4" value="{gallery_icon_w}">
      x
      
      <input name="gallery_icon[h]" type="text" class="no_width" id="gallery_icon[h]" size="2" maxlength="4" value="{gallery_icon_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="gallery_icon[force_resize]" type="radio" value="true" {gallery_icon_force_resize_true} />
Force resize
  <input name="gallery_icon[force_resize]" type="radio" value="false" {gallery_icon_force_resize_false} />
Flexible  </td>
    <td><input name="gallery_icon[specify]" type="radio" value="none"  {gallery_icon_specify_none} />
      None
      <input name="gallery_icon[specify]" type="radio" value="min" {gallery_icon_specify_min} />
Min 
  <input name="gallery_icon[specify]" type="radio" value="max"  {gallery_icon_specify_max} />
Max </td>
    <td><input name="gallery_icon[orginal]" type="radio" value="0" {gallery_icon_orginal_0} />
No 
  <input name="gallery_icon[orginal]" type="radio" value="1" {gallery_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
	</div></td>
  </tr>
  <tr>
    <td><input name="gallery_img[chose]" type="checkbox" class="no_width" id="gallery_img[chose]" value="1" checked="checked" style="display: none;">
      Image</td>
    <td>Resize 
      <input name="gallery_img[w]" type="text" class="no_width" id="gallery_img[w]" size="2" maxlength="4" value="{gallery_img_w}">
      x
      <input name="gallery_img[h]" type="text" class="no_width" id="gallery_img[h]" size="2" maxlength="4" value="{gallery_img_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="gallery_img[force_resize]" type="radio" value="true" {gallery_img_force_resize_true} />
Force resize
  <input name="gallery_img[force_resize]" type="radio" value="false" {gallery_img_force_resize_false} />
Flexible  </td>
    <td><input name="gallery_img[specify]" type="radio" value="none"  {gallery_img_specify_none} />
      None
      <input name="gallery_img[specify]" type="radio" value="min" {gallery_img_specify_min} />
Min 
  <input name="gallery_img[specify]" type="radio" value="max"  {gallery_img_specify_max} />
Max </td>
    <td><input name="gallery_img[orginal]" type="radio" value="0" {gallery_img_orginal_0} />
No 
  <input name="gallery_img[orginal]" type="radio" value="1" {gallery_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>
		</div></td>
  </tr>
  <tr>
    <td><input name="gallery_thumb[chose]" type="checkbox" class="no_width" id="gallery_thumb[chose]" value="1" {gallery_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="gallery_thumb[w]" type="text" class="no_width" id="gallery_thumb[w]" size="2" maxlength="4" value="{gallery_thumb_w}">
      x
      <input name="gallery_thumb[h]" type="text" class="no_width" id="gallery_thumb[h]" size="2" maxlength="4" value="{gallery_thumb_h}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="gallery_thumb[force_resize]" type="radio" value="true" {gallery_thumb_force_resize_true} />
Force resize
  <input name="gallery_thumb[force_resize]" type="radio" value="false" {gallery_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="gallery_thumb[specify]" type="radio" value="none"  {gallery_thumb_specify_none} />
      None
      <input name="gallery_thumb[specify]" type="radio" value="min" {gallery_thumb_specify_min} />
Min 
  <input name="gallery_thumb[specify]" type="radio" value="max"  {gallery_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
		</div></td>
  </tr>
    </table>  

    <div class="table_list" align="right">
      <input type="submit" class="btn" name="Submit" value="Save" />
    </div>
</form></div>
<script type="text/javascript">
$('a.divbox').divbox({width: 520, height: 80});
</script>
