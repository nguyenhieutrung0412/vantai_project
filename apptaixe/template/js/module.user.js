// JavaScript Document

function user_update(doc){
	if(doc.fullname.value==''){alert('Please enter Fullname');doc.fullname.focus();return false;}
	if(doc.username.value==''){alert('Please enter Username');doc.username.focus();return false;}
	if(doc.password.value==''){alert('Please enter Password');doc.password.focus();return false;}
	if(doc.confirm_password.value=='' || doc.confirm_password.value != doc.password.value){alert('Confirm password must same with Password');doc.confirm_password.focus();return false;}
	return true;
}

function user_new(doc){
	if(doc.fullname.value==''){alert('Please enter Fullname');doc.fullname.focus();return false;}
	return true;
}