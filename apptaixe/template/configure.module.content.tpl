<form name="form1" method="post" action="">
<p>Module: <strong>content</strong> <br />
  Type Id: #<strong>{typeid}</strong></p>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="table-Form1 table_list">
    <tr>
      <td bgcolor="#CCCCCC">General</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
        <tr>
        <td width="21%">Name</td>
        <td width="79%"><input name="name" class="no_width" type="text" id="name" value="{name}" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea name="content" rows="3" class="no_width">{content}</textarea></td>
      </tr>
      <tr>
        <td>Languages</td>
        <td><select name="languages">
          <option value="0">All</option>
		  <option value="1" {selected_languages_1}>Default language</option>
        </select>        </td>
      </tr>    <tr>
    <td>SEO Manage </td>
    <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="meta_data" {meta_data_checked} />
Meta data 
  <input name="act[]" type="checkbox" class="no_width" id="act[]" value="seo_url" {seo_url_checked} />  SEO URL</td>
  </tr>
    <tr>
      <td>Text Editor </td>
      <td><input name="act[]" type="checkbox" id="act[]" value="enable_editor"  {enable_editor_checked} class="no_width" /> 
         Enable TinyMCE </td>
    </tr>
    <tr>
      <td>Search function </td>
      <td><input name="act[]" type="checkbox" id="act[]" value="enable_search"  {enable_search_checked} class="no_width" /> 
      Enable search function </td>
    </tr>
	<tr>
    <td valign="top">Default sort </td>
    <td>by 
      <select name="sort_default" id="sort_default">
      <option value="order_id" {sort_default_order_id}>Order Id</option>
      <option value="name" {sort_default_name}>Name</option>
      <option value="date" {sort_default_date}>Date</option>
      <option value="status" {sort_default_status}>Status</option>
    </select>
      <input name="sort_default_order" type="text" id="sort_default_order" value="{sort_default_order}" /></td>
  </tr>


    <tr>
      <td valign="top">Labels <a href="#" onclick="add_buttons();">[+]</a> </td>
      <td><table width="100%" border="0" cellspacing="1" cellpadding="1" id="add_button" class="hide" >
        <tr>
          <td width="21%">Root</td>
          <td width="79%"><input name="button[root]" type="text" id="button[root]" value="{button.root}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Name </td>
          <td><input name="button[header_name]" type="text" id="button[header_name]" value="{button.header_name}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Date </td>
          <td><input name="button[header_date]" type="text" id="button[header_date]" value="{button.header_date}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Order </td>
          <td><input name="button[header_order]" type="text" id="button[header_order]" value="{button.header_order}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Status </td>
          <td><input name="button[header_status]" type="text" id="button[header_status]" value="{button.header_status}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Actions</td>
          <td><input name="button[header_actions]" type="text" id="button[header_actions]" value="{button.header_actions}" /></td>
        </tr>
        <tr>
          <td>Tools text(with selected) </td>
          <td><input name="button[tools_copy]" type="text" id="button[tools_copy]" value="{button.tools_copy}" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee"><strong>Items</strong></td>
          <td bgcolor="#eeeeee">&nbsp;</td>
        </tr>
        <tr>
          <td width="21%">Add new item</td>
          <td width="79%"><input name="button[new_item]" type="text" id="button[new_item]" value="{button.new_item}" /></td>
        </tr>
        <tr>
          <td>Edit item </td>
          <td><input name="button[edit_item]" type="text" id="button[edit_item]" value="{button.edit_item}" /></td>
        </tr>
        <tr>
          <td>Delete item </td>
          <td><input name="button[delete_item]" type="text" id="button[delete_item]" value="{button.delete_item}" /></td>
        </tr>
        <tr>
          <td>Move item </td>
          <td><input name="button[move_item]" type="text" id="button[move_item]" value="{button.move_item}" /></td>
        </tr>
        <tr>
          <td>Activate item </td>
          <td><input name="button[active_item]" type="text" id="button[active_item]" value="{button.active_item}" /></td>
        </tr>
        <tr>
          <td>inActivate item </td>
          <td><input name="button[inactive_item]" type="text" id="button[inactive_item]" value="{button.inactive_item}" /></td>
        </tr>
        <tr>
          <td>Status  item hover </td>
          <td><input name="button[status_hover_item]" type="text" id="button[status_hover_item]" value="{button.status_hover_item}" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee"><strong>Category</strong></td>
          <td bgcolor="#eeeeee">&nbsp;</td>
        </tr>
        <tr>
          <td>Add new category</td>
          <td><input name="button[new_category]" type="text" id="button[new_category]" value="{button.new_category}" /></td>
        </tr>
        <tr>
          <td>Edit category </td>
          <td><input name="button[edit_category]" type="text" id="button[edit_category]" value="{button.edit_category}" /></td>
        </tr>
        <tr>
          <td>Delete category </td>
          <td><input name="button[delete_category]" type="text" id="button[delete_category]" value="{button.delete_category}" /></td>
        </tr>
        <tr>
          <td>New sub category </td>
          <td><input name="button[new_subcategory]" type="text" id="button[new_subcategory]" value="{button.new_subcategory}" /></td>
        </tr>
        <tr>
          <td>Status category hover </td>
          <td><input name="button[status_hover_cat]" type="text" id="button[status_hover_cat]" value="{button.status_hover_cat}" /></td>
        </tr>
      </table></td>
    </tr>
      <tr>
        <td bgcolor="#CCCCCC">Main content </td>
        <td bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>
        <td>Extra order </td>
        <td><input name="extra_sort" type="text" id="extra_sort" value="{extra_sort}" /></td>
      </tr>
      <tr>
        <td>Enable input date </td>
        <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="enable_date" {enable_date_checked} /></td>
      </tr>
	  
	  <tr>
    <td valign="top">Show main fields </td>
	
    <td>
	<p><a href="?mod=configure&act=addfield&tbl=content" class="divbox">New field</a></p>
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="16%" bgcolor="#eeeeee">Field</td>
        <td width="7%" bgcolor="#eeeeee">Name</td>
        <td width="23%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="10%" bgcolor="#eeeeee">Description</td>
        <td width="27%" bgcolor="#eeeeee">Require message </td>
        <td width="10%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC main_field-->
      <tr>
        <td><input type="checkbox" name="main_fields[{main_field.code}][chose]" {main_field.chose_checked} value="1" />
          {main_field.code}</td>
        <td><input name="main_fields[{main_field.code}][name]" type="text" size="8" value="{main_field.name}"/></td>
        <td>{main_field.type}     
		<p class="info {main_field.cls_status}">
		Default status: {main_field.status_default}<br />
		Allow activate: <input name="main_fields[{main_field.code}][number]" type="text" size="8" value="{main_field.number}" class="number" /></p>		</td>
        <td><input type="checkbox" name="main_fields[{main_field.code}][require]" value="1" {main_field.require_checked} /></td>
        <td><input name="main_fields[{main_field.code}][description]" type="text" size="8" value="{main_field.description}" /></td>
        <td><input name="main_fields[{main_field.code}][require_msg]" type="text" size="10" value="{main_field.require_msg}" /></td>
        <td><input name="main_fields[{main_field.code}][sortorder]" type="text" size="10" value="{main_field.sortorder}" /></td>
      </tr><!--BASIC main_field-->
    </table>	</td>
  </tr>
  <tr>
    <td valign="top">Show language fields </td>
    <td>
	<p><a href="?mod=configure&act=addfield&tbl=content_ln" class="divbox">New field</a></p>
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="13%" bgcolor="#eeeeee">Field</td>
        <td width="7%" bgcolor="#eeeeee">Name</td>
        <td width="13%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="20%" bgcolor="#eeeeee">Description</td>
        <td width="29%" bgcolor="#eeeeee">Require message </td>
        <td width="11%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC ln_field-->
      <tr>
        <td><input type="checkbox" name="ln_fields[{ln_field.code}][chose]" {ln_field.chose_checked} value="1" />
          {ln_field.code}</td>
        <td><input name="ln_fields[{ln_field.code}][name]" type="text" size="8" value="{ln_field.name}"/></td>
        <td>{ln_field.type}</td>
        <td><input type="checkbox" name="ln_fields[{ln_field.code}][require]" value="1" {ln_field.require_checked} /></td>
        <td><input name="ln_fields[{ln_field.code}][description]" type="text" size="8" value="{ln_field.description}" /></td>
        <td><input name="ln_fields[{ln_field.code}][require_msg]" type="text" size="10" value="{ln_field.require_msg}" /></td>
        <td><input name="ln_fields[{ln_field.code}][sortorder]" type="text" size="10" value="{ln_field.sortorder}" /></td>
      </tr><!--BASIC ln_field-->
    </table>
     </td>
  </tr>
      <tr>
        <td>Options</td>
        <td>
		  <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr>
              <td width="20%" bgcolor="#eeeeee">Options</td>
              <td width="32%" bgcolor="#eeeeee">Type</td>
              <td width="48%" bgcolor="#eeeeee">Special save field </td>
            </tr>
			<!--BASIC options-->
            <tr>
              <td><input name="options[]" class="no_width" type="checkbox" id="options[]" value="{options.typeid}" {options.checked} /> {options.name}</td>
              <td><select name="options_type[{options.typeid}]">
            <option value="0" {options.selected_0}>Radio</option>
            <option value="1" {options.selected_1}>Checkbox</option>
            <option value="2" {options.selected_2}>Dropdown</option>
            <option value="3" {options.selected_3}>Dropdown with multi select</option>
          </select></td>
              <td><input type="text" name="options_save_field[{options.typeid}]" value="{options.options_save_field}" /></td>
            </tr>
			<!--BASIC options--> 
          </table>        </td>
      </tr>
      <tr>
        <td>Extra Files </td>
        <td><table width="666" border="0" cellpadding="1" cellspacing="1" id="file_extra">
          <tr>
            <td width="144" bgcolor="#eeeeee">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39" bgcolor="#eeeeee">Code</td>
            <td width="249" bgcolor="#eeeeee">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221" bgcolor="#eeeeee">Note</td>
          </tr>
		  <!--BASIC file_extra-->
          <tr>
            <td><input type="text" name="file_extra[name][]" value="{file_extra.name}" /></td>
            <td><input name="file_extra[code][]" type="text" id="file_extra[code][]" value="{file_extra.code}" size="5" /></td>
            <td><input type="text" name="file_extra[type][]" value="{file_extra.type}" /></td>
            <td><input type="text" name="file_extra[note][]" value="{file_extra.note}" /><a href="#" onclick="delete_row(this);return false;"> x </a></td>
          </tr>
          <!--BASIC file_extra-->
        </table>
		<a href="#" onclick="add_file_extra(); return false;">Add</a>		</td>
      </tr>
	  <tr>
        <td>Extra general fields </td>
        <td><table width="666" border="0" cellpadding="1" cellspacing="1" id="fields_extra">
          <tr>
            <td width="144" bgcolor="#eeeeee">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39" bgcolor="#eeeeee">Code</td>
            <td width="249" bgcolor="#eeeeee">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221" bgcolor="#eeeeee">Note</td>
          </tr>
		  <!--BASIC fields_extra-->
          <tr>
            <td><input type="text" name="fields_extra[name][]" value="{fields_extra.name}" /></td>
            <td><input name="fields_extra[code][]" type="text" id="fields_extra[code][]" value="{fields_extra.code}" size="5" /></td>
            <td>{fields_extra.type}</td>
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
            <td width="144" bgcolor="#eeeeee">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39" bgcolor="#eeeeee">Code</td>
            <td width="249" bgcolor="#eeeeee">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221" bgcolor="#eeeeee">Note</td>
          </tr>
		  <!--BASIC ln_fields_extra-->
          <tr>
            <td><input type="text" name="ln_fields_extra[name][]" value="{ln_fields_extra.name}" /></td>
            <td><input name="ln_fields_extra[code][]" type="text" id="ln_fields_extra[code][]" value="{ln_fields_extra.code}" size="5" /></td>
            <td>{ln_fields_extra.type}</td>
            <td><input type="text" name="ln_fields_extra[note][]" value="{ln_fields_extra.note}" /><a href="#" onclick="delete_row(this);return false;"> x </a></td>
          </tr>
          <!--BASIC ln_fields_extra-->
        </table>
		<a href="#" onclick="add_ln_fields_extra(); return false;">Add</a>		</td>
      </tr>
  </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table-Form1 table_list">
  <tr>
    <td valign="top">View template </td>
    <td><input name="tpl_view" type="text" id="tpl_view" value="{tpl_view}" /></td>
  </tr>
  <tr>
    <td valign="top">Update template </td>
    <td><input name="tpl_update" type="text" id="tpl_update" value="{tpl_update}" /></td>
  </tr>
  <tr>
    <td valign="top">Rows per page </td>
    <td><input name="rows_per_page" type="text" id="rows_per_page" value="{rows_per_page}" /></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="drapdrop_content" {drapdrop_content_checked} />
      Enable drap-n-drop content </td>
  </tr>
  <tr>
    <td valign="top" width="200">Actions</td>
    <td>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="new" {new_checked}>
    New <br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="update" {update_checked}>
    Edit <br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="delete" {delete_checked}>
    Delete <br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="comment" {comment_checked}>
    Manage Comment     
    <input name="comment_name" type="text" id="comment_name" value="{comment_name}" />
    <br />
  
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="move" {move_checked}>
   Move to category	<br />
<input name="act[]" type="checkbox" class="no_width" id="act[]" value="featuredon" {featuredon_checked}>
   Featured on    
   <input name="featuredon_name" type="text" id="featuredon_name" value="{featuredon_name}" />
   <br /></td>
  </tr>
  <tr>
    <td valign="top">No delete product Ids </td>
    <td><input name="nodel_ids" type="text" id="nodel_ids" value="{nodel_ids}" /></td>
  </tr>
  <tr>
    <td valign="top">Thumb view </td>
    <td><input name="thumb_field" type="text" id="thumb_field" value="{thumb_field}" /></td>
  </tr>
  <tr>
    <td valign="top">Fields on list </td>
    <td><input name="list_field" type="text" id="list_field" value="{list_field}" />&nbsp;</td>
  </tr>
  
  <tr>
    <td valign="top">And Order </td>
    <td><input name="sort_order" type="text" id="sort_order" value="{sort_order}" /></td>
  </tr>
  <tr>
    <td valign="top"><h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="image" {image_checked}> 
      Main Image</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><input name="main_icon[chose]" type="checkbox" class="no_width" id="main_icon[chose]" value="1" {main_icon_chose}>
      Icon</td>
    <td> 
      
	  Resize <input name="main_icon[w]" type="text" class="no_width" id="main_icon[w]" size="2" maxlength="4" value="{main_icon_w}">
      x
      
      <input name="main_icon[h]" type="text" class="no_width" id="main_icon[h]" size="2" maxlength="4" value="{main_icon_h}">
	  File name 
	  <input name="main_icon[name]" type="text" class="no_width" id="main_icon[name]" value="{main_icon_name}" />
	  
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
</div>	

  </td>
  </tr>
  <tr>
    <td><input name="main_img[chose]" type="checkbox" class="no_width" id="main_img[chose]" value="1" {main_img_chose}>
      Image</td>
    <td>
	
	Resize <input name="main_img[w]" type="text" class="no_width" id="main_img[w]" size="2" maxlength="4" value="{main_img_w}">
      x
      <input name="main_img[h]" type="text" class="no_width" id="main_img[h]" size="2" maxlength="4" value="{main_img_h}"> File name:<input name="main_img[name]" type="text" class="no_width" id="main_img[name]"  value="{main_img_name}">
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

</div>	  	  </td>
  </tr>
  <tr>
    <td><input name="main_thumb[chose]" type="checkbox" class="no_width" id="main_thumb[chose]" value="1" {main_thumb_chose}>
      Image Thumb </td>
    <td>
Resize <input name="main_thumb[w]" type="text" class="no_width" id="main_thumb[w]" size="2" maxlength="4" value="{main_thumb_w}">
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
</div>	  </td>
  </tr>
  <tr>
    <td valign="top"><h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="ln_image" {ln_image_checked}> 
      Languages Image</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><input name="ln_main_icon[chose]" type="checkbox" class="no_width" id="ln_main_icon[chose]" value="1" {ln_main_icon_chose}>
      Icon</td>
    <td>
Resize <input name="ln_main_icon[w]" type="text" class="no_width" id="ln_main_icon[w]" size="2" maxlength="4" value="{ln_main_icon_w}">
      x
      
      <input name="ln_main_icon[h]" type="text" class="no_width" id="ln_main_icon[h]" size="2" maxlength="4" value="{ln_main_icon_h}"> File name: 	<input name="ln_main_icon[name]" type="text" class="no_width" id="ln_main_icon[name]"  value="{ln_main_icon_name}">
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
</div>	 </td>
  </tr>
  <tr>
    <td><input name="ln_main_img[chose]" type="checkbox" class="no_width" id="ln_main_img[chose]" value="1" {ln_main_img_chose}>
      Image</td>
    <td>
	Resize <input name="ln_main_img[w]" type="text" class="no_width" id="ln_main_img[w]" size="2" maxlength="4" value="{ln_main_img_w}">
      x
      <input name="ln_main_img[h]" type="text" class="no_width" id="ln_main_img[h]" size="2" maxlength="4" value="{ln_main_img_h}"> File name: <input name="ln_main_img[name]" type="text" class="no_width" id="ln_main_img[name]"  value="{ln_main_img_name}">
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
</div>	</td>
  </tr>
  <tr>
    <td><input name="ln_main_thumb[chose]" type="checkbox" class="no_width" id="ln_main_thumb[chose]" value="1" {ln_main_thumb_chose}>
      Image Thumb </td>
    <td>
	Resize <input name="ln_main_thumb[w]" type="text" class="no_width" id="ln_main_thumb[w]" size="2" maxlength="4" value="{ln_main_thumb_w}">
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
	</div>	</td>
  </tr>

  <tr>
    <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="gallery" {gallery_checked}> 
      Gallery Image </h4></td>
    <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="drapdrop_gallery" {drapdrop_gallery_checked} /> Enable drap-n-drop gallery&nbsp;<br />
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="multiselect_file_gallery" {multiselect_file_gallery_checked} /> Multi select file (only Firefox, also only enable this option when gallery is not include title or icon)<br />
      Gallery name: 
      <input name="gallery_name" type="text" id="gallery_name" value="{gallery_name}" /></td>
  </tr>
  <tr>
    <td>Order by </td>
    <td>order_id AND      
      <select name="gallery_sort" id="gallery_sort">
        <option value="id ASC">Id ASC</option>
        <option value="id DESC">Id DESC</option>
      </select></td>
  </tr>
  <tr>
    <td>Show fields </td>
    <td><input name="gallery_fields" type="text" id="gallery_fields" value="{gallery_fields}" /></td>
  </tr>
  <tr>
    <td width="200"><input name="gallery_icon[chose]" type="checkbox" class="no_width" id="gallery_icon[chose]" value="1" {gallery_icon_chose}>
      Icon</td>
    <td>
	Resize <input name="gallery_icon[w]" type="text" class="no_width" id="gallery_icon[w]" size="2" maxlength="4" value="{gallery_icon_w}" />
x
<input name="gallery_icon[h]" type="text" class="no_width" id="gallery_icon[h]" size="2" maxlength="4" value="{gallery_icon_h}" /> File name: <input name="gallery_icon[name]" type="text" class="no_width" id="gallery_icon[name]" value="{gallery_icon_name}" />
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
	</div>	</td>
  </tr>
  <tr>
    <td><input name="gallery_img[chose]" type="checkbox" class="no_width" id="gallery_img[chose]" value="1" checked="checked" style="display: none;">
      Image</td>
    <td>
	
	Resize <input name="gallery_img[w]" type="text" class="no_width" id="gallery_img[w]" size="2" maxlength="4" value="{gallery_img_w}">
      x
      <input name="gallery_img[h]" type="text" class="no_width" id="gallery_img[h]" size="2" maxlength="4" value="{gallery_img_h}"> File name: <input name="gallery_img[name]" type="text" class="no_width" id="gallery_img[name]" value="{gallery_img_name}" />
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
		</div>	</td>
  </tr>
  <tr>
    <td><input name="gallery_thumb[chose]" type="checkbox" class="no_width" id="gallery_thumb[chose]" value="1" {gallery_thumb_chose}>
      Image Thumb </td>
    <td>
	Resize: <input name="gallery_thumb[w]" type="text" class="no_width" id="gallery_thumb[w]" size="2" maxlength="4" value="{gallery_thumb_w}">
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
		</div>	</td>
  </tr>
   <tr>
     <td bgcolor="#CCCCCC">Sub content </td>
     <td bgcolor="#CCCCCC">&nbsp;</td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input type="checkbox" name="act[]" value="subcontent" {subcontent_checked} /> 
       Enable sub content 
       <input name="sub_name" type="text" id="sub_name" value="{sub_name}" /></td>
   </tr>
   <tr>
     <td width="200">Show fields</td>
     <td width="78%"><input name="sub_show_fields" type="text" id="sub_show_fields" value="{sub_show_fields}" /></td>
   </tr>
 

   <tr>
     <td valign="top" bgcolor="#CCCCCC">Category</td>
     <td bgcolor="#CCCCCC">&nbsp;</td>
   </tr>
   <tr>
    <td width="200" valign="top">Actions</td>
    <td width="78%">	
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="newcat" {newcat_checked}>
    New<br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="updatecat" {updatecat_checked}>
    Edit<br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="deletecat" {deletecat_checked}>
    Delete<br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="viewcat" {viewcat_checked}>
   View product in category<br />
   <input name="act[]" type="checkbox" class="no_width" id="act[]" value="drapdrop_cat" {drapdrop_cat_checked} /> Enable drap-n-drop category</td>
  </tr>
   <tr>
     <td valign="top">Template update </td>
     <td><input name="cattpl_update" type="text" id="cattpl_update" value="{cattpl_update}" /></td>
   </tr>
   <tr>
    <td valign="top">Languages</td>
    <td><select name="cat_languages">
          <option value="0">All</option>
		  <option value="1" {selected_cat_languages_1}>Default language</option>
        </select></td>
  </tr>
  <tr>
    <td valign="top">Max Level </td>
    <td> <input name="nlevel" type="text" class="no_width"  value="{nlevel}" size="3"></td>
  </tr>
  <tr>
    <td valign="top">No new    product in level </td>
    <td><input name="noproduct_level" type="text" id="noproduct_level" value="{noproduct_level}" /></td>
  </tr>
  <tr>
    <td valign="top">No new product in categorys </td>
    <td><input name="noproduct_cat" type="text" id="noproduct_cat" value="{noproduct_cat}" /></td>
  </tr>
  <tr>
    <td>No new category in levels</td>
    <td><input name="nosubcat_level" type="text" id="nosubcat_level" value="{nosubcat_level}" />
      <br />
      <input type="checkbox" class="no_width" name="nodelcat_level" value="1" {nodelcat_level_checked} /> 
      Don't delete current subcategory </td>
  </tr>
  <tr>
    <td>No  new  category in categorys</td>
    <td><input name="nosubcat_cat" type="text" id="nosubcat_cat" value="{nosubcat_cat}" />
      <br />
      <input type="checkbox" name="nodelcat_cat" class="no_width" value="1" {nodelcat_cat_checked} /> 
      Don't delete current subcategory </td>
  </tr>
  <tr>
    <td>No  delete category Ids </td>
    <td><input name="nodelcat_ids" type="text" id="nodelcat_ids" value="{nodelcat_ids}" /></td>
  </tr>
  <tr>
    <td>Required fields </td>
    <td><input name="category_required" type="text" id="category_required" value="{category_required}" /></td>
  </tr>
  <tr>
    <td>Category fields on list </td>
    <td><input name="list_catfield" type="text" id="gallery_fields" value="{list_catfield}" /></td>
  </tr>
        <tr>
        <td>Enable input date </td>
        <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="enable_catdate" {enable_catdate_checked} /></td>
      </tr>

<tr>
    <td valign="top">Show main fields </td>
    <td>
	<p><a href="?mod=configure&act=addfield&tbl=category" class="divbox">New field</a></p>
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="17%" bgcolor="#eeeeee">Field</td>
        <td width="6%" bgcolor="#eeeeee">Name</td>
        <td width="14%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="6%" bgcolor="#eeeeee">Status</td>
        <td width="13%" bgcolor="#eeeeee">Description</td>
        <td width="37%" bgcolor="#eeeeee">Require message </td>
        <td width="37%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC cat_field-->
      <tr>
        <td><input type="checkbox" name="cat_fields[{cat_field.code}][chose]" {cat_field.chose_checked} value="1" />
          {cat_field.code}</td>
        <td><input name="cat_fields[{cat_field.code}][name]" type="text" size="8" value="{cat_field.name}"/></td>
        <td>{cat_field.type}
        <p class="info {cat_field.cls_status}">
        Default status: {cat_field.status_default}<br />
        Allow activate: <input name="main_fields[{cat_field.code}][number]" type="text" size="8" value="{cat_field.number}" class="number" />
        </p></td>
        <td><input type="checkbox" name="cat_fields[{cat_field.code}][require]" value="1" {cat_field.require_checked} /></td>
        <td><input type="checkbox" name="cat_fields[{cat_field.code}][status]" value="1" {cat_field.status_checked} /></td>
        <td><input name="cat_fields[{cat_field.code}][description]" type="text" size="8" value="{cat_field.description}" /></td>
        <td><input name="cat_fields[{cat_field.code}][require_msg]" type="text" size="10" value="{cat_field.require_msg}" /></td>
        <td><input name="cat_fields[{cat_field.code}][sortorder]" type="text" size="10" value="{cat_field.sortorder}" /></td>
      </tr><!--BASIC cat_field-->
    </table></td>
  </tr>
  <tr>
    <td valign="top">Show language fields </td>
    <td>
	<p><a href="?mod=configure&act=addfield&tbl=category_ln" class="divbox">New field</a></p>
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
	  <!--BASIC ln_catfield-->
      <tr>
        <td><input type="checkbox" name="ln_catfields[{ln_catfield.code}][chose]" {ln_catfield.chose_checked} value="1" />
          {ln_catfield.code}</td>
        <td><input name="ln_catfields[{ln_catfield.code}][name]" type="text" size="8" value="{ln_catfield.name}"/></td>
        <td>{ln_catfield.type}      </td>
        <td><input type="checkbox" name="ln_catfields[{ln_catfield.code}][require]" value="1" {ln_catfield.require_checked} /></td>
        <td><input name="ln_catfields[{ln_catfield.code}][description]" type="text" size="8" value="{ln_catfield.description}" /></td>
        <td><input name="ln_catfields[{ln_catfield.code}][require_msg]" type="text" size="10" value="{ln_catfield.require_msg}" /></td>
        <td><input name="ln_catfields[{ln_catfield.code}][sortorder]" type="text" size="10" value="{ln_catfield.sortorder}" /></td>
      </tr><!--BASIC ln_catfield-->
    </table>     	</td>
  </tr>
    <tr>
    <td valign="top">Cat Sort Order </td>
    <td><input name="catsort_order" type="text" id="catsort_order" value="{catsort_order}" /></td>
    </tr>
   <tr>
     <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="catimg" {catimg_checked}> 
      Image </h4></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td width="200"><input name="catimg_icon[chose]" type="checkbox" class="no_width" id="catimg_icon[chose]" value="1" {catimg_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="catimg_icon[w]" type="text" class="no_width" id="catimg_icon[w]" size="2" maxlength="4" value="{catimg_icon_w}">
      x
      
      <input name="catimg_icon[h]" type="text" class="no_width" id="catimg_icon[h]" size="2" maxlength="4" value="{catimg_icon_h}"> File name: <input name="catimg_icon[name]" type="text" class="no_width" id="catimg_icon[name]" value="{catimg_icon_name}" />
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="catimg_icon[force_resize]" type="radio" value="true" {catimg_icon_force_resize_true} />
Force resize
  <input name="catimg_icon[force_resize]" type="radio" value="false" {catimg_icon_force_resize_false} />
Flexible  </td>
    <td><input name="catimg_icon[specify]" type="radio" value="none"  {catimg_icon_specify_none} />
      None
      <input name="catimg_icon[specify]" type="radio" value="min" {catimg_icon_specify_min} />
Min 
  <input name="catimg_icon[specify]" type="radio" value="max"  {catimg_icon_specify_max} />
Max </td>
    <td><input name="catimg_icon[orginal]" type="radio" value="0" {catimg_icon_orginal_0} />
No 
  <input name="catimg_icon[orginal]" type="radio" value="1" {catimg_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div></td>
  </tr>
   <tr>
    <td><input name="catimg_img[chose]" type="checkbox" class="no_width" id="catimg_img[chose]" value="1" {catimg_img_chose}>
      Image</td>
    <td>Resize 
      <input name="catimg_img[w]" type="text" class="no_width" id="catimg_img[w]" size="2" maxlength="4" value="{catimg_img_w}">
      x
      <input name="catimg_img[h]" type="text" class="no_width" id="catimg_img[h]" size="2" maxlength="4" value="{catimg_img_h}">
	    File name: <input name="catimg_img[name]" type="text" class="no_width" id="catimg_img[name]" value="{catimg_img_name}" />
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="catimg_img[force_resize]" type="radio" value="true" {catimg_img_force_resize_true} />
Force resize
  <input name="catimg_img[force_resize]" type="radio" value="false" {catimg_img_force_resize_false} />
Flexible  </td>
    <td><input name="catimg_img[specify]" type="radio" value="none"  {catimg_img_specify_none} />
      None
      <input name="catimg_img[specify]" type="radio" value="min" {catimg_img_specify_min} />
Min 
  <input name="catimg_img[specify]" type="radio" value="max"  {catimg_img_specify_max} />
Max </td>
    <td><input name="catimg_img[orginal]" type="radio" value="0" {catimg_img_orginal_0} />
No 
  <input name="catimg_img[orginal]" type="radio" value="1" {catimg_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div></td>
  </tr>
  <tr>
    <td><input name="catimg_thumb[chose]" type="checkbox" class="no_width" id="catimg_thumb[chose]" value="1" {catimg_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="catimg_thumb[w]" type="text" class="no_width" id="catimg_thumb[w]" size="2" maxlength="4" value="{catimg_thumb_w}">
      x
      <input name="catimg_thumb[h]" type="text" class="no_width" id="catimg_thumb[h]" size="2" maxlength="4" value="{catimg_thumb_h}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="catimg_thumb[force_resize]" type="radio" value="true" {catimg_thumb_force_resize_true} />
Force resize
  <input name="catimg_thumb[force_resize]" type="radio" value="false" {catimg_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="catimg_thumb[specify]" type="radio" value="none"  {catimg_thumb_specify_none} />
      None
      <input name="catimg_thumb[specify]" type="radio" value="min" {catimg_thumb_specify_min} />
Min 
  <input name="catimg_thumb[specify]" type="radio" value="max"  {catimg_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
		</div>
	  </td>
  </tr>
   <tr>
     <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="ln_catimg" {ln_catimg_checked}> 
      Languages image </h4></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td width="200"><input name="ln_catimg_icon[chose]" type="checkbox" class="no_width" id="ln_catimg_icon[chose]" value="1" {ln_catimg_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="ln_catimg_icon[w]" type="text" class="no_width" id="ln_catimg_icon[w]" size="2" maxlength="4" value="{ln_catimg_icon_w}">
      x
      
      <input name="ln_catimg_icon[h]" type="text" class="no_width" id="ln_catimg_icon[h]" size="2" maxlength="4" value="{ln_catimg_icon_h}">
	  File name: <input name="ln_catimg_icon[name]" type="text" class="no_width" id="ln_catimg_icon[name]" value="{ln_catimg_icon_name}" />
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="ln_catimg_icon[force_resize]" type="radio" value="true" {ln_catimg_icon_force_resize_true} />
Force resize
  <input name="ln_catimg_icon[force_resize]" type="radio" value="false" {ln_catimg_icon_force_resize_false} />
Flexible  </td>
    <td><input name="ln_catimg_icon[specify]" type="radio" value="none"  {ln_catimg_icon_specify_none} />
      None
      <input name="ln_catimg_icon[specify]" type="radio" value="min" {ln_catimg_icon_specify_min} />
Min 
  <input name="ln_catimg_icon[specify]" type="radio" value="max"  {ln_catimg_icon_specify_max} />
Max </td>
    <td><input name="ln_catimg_icon[orginal]" type="radio" value="0" {ln_catimg_icon_orginal_0} />
No 
  <input name="ln_catimg_icon[orginal]" type="radio" value="1" {ln_catimg_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div></td>
  </tr>
   <tr>
    <td><input name="ln_catimg_img[chose]" type="checkbox" class="no_width" id="ln_catimg_img[chose]" value="1" {ln_catimg_img_chose}>
      Image</td>
    <td>Resize 
      <input name="ln_catimg_img[w]" type="text" class="no_width" id="ln_catimg_img[w]" size="2" maxlength="4" value="{ln_catimg_img_w}">
      x
      <input name="ln_catimg_img[h]" type="text" class="no_width" id="ln_catimg_img[h]" size="2" maxlength="4" value="{ln_catimg_img_h}">
	  
	  File name: <input name="ln_catimg_img[name]" type="text" class="no_width" id="ln_catimg_img[name]" value="{ln_catimg_img_name}" />
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="ln_catimg_img[force_resize]" type="radio" value="true" {ln_catimg_img_force_resize_true} />
Force resize
  <input name="ln_catimg_img[force_resize]" type="radio" value="false" {ln_catimg_img_force_resize_false} />
Flexible  </td>
    <td><input name="ln_catimg_img[specify]" type="radio" value="none"  {ln_catimg_img_specify_none} />
      None
      <input name="ln_catimg_img[specify]" type="radio" value="min" {ln_catimg_img_specify_min} />
Min 
  <input name="ln_catimg_img[specify]" type="radio" value="max"  {ln_catimg_img_specify_max} />
Max </td>
    <td><input name="ln_catimg_img[orginal]" type="radio" value="0" {ln_catimg_img_orginal_0} />
No 
  <input name="ln_catimg_img[orginal]" type="radio" value="1" {ln_catimg_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div></td>
  </tr>
  <tr>
    <td><input name="ln_catimg_thumb[chose]" type="checkbox" class="no_width" id="ln_catimg_thumb[chose]" value="1" {ln_catimg_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="ln_catimg_thumb[w]" type="text" class="no_width" id="ln_catimg_thumb[w]" size="2" maxlength="4" value="{ln_catimg_thumb_w}">
      x
      <input name="ln_catimg_thumb[h]" type="text" class="no_width" id="ln_catimg_thumb[h]" size="2" maxlength="4" value="{ln_catimg_thumb_h}">
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="ln_catimg_thumb[force_resize]" type="radio" value="true" {ln_catimg_thumb_force_resize_true} />
Force resize
  <input name="ln_catimg_thumb[force_resize]" type="radio" value="false" {ln_catimg_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="ln_catimg_thumb[specify]" type="radio" value="none"  {ln_catimg_thumb_specify_none} />
      None
      <input name="ln_catimg_thumb[specify]" type="radio" value="min" {ln_catimg_thumb_specify_min} />
Min 
  <input name="ln_catimg_thumb[specify]" type="radio" value="max"  {ln_catimg_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
		</div>
	  </td>
  </tr>
</table>
<div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="Save">
</div>
</form>
<script type="text/javascript">
$('a.divbox').divbox({width: 520, height: 80});
</script>
