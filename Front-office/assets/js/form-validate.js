function valid_datas(f){
	
	if( f.name.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Taper votre nom!</span>');
		return notice( f.name );
	}else if( f.email.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Taper un email!</span>');
		return notice( f.email );
	//}else if( f.phone.value == '' ){
		//jQuery('#form_status').html('<span class="wrong">Your phone must not be empty and correct format!</span>');
		//notice( f.phone );
	}else if( f.subject.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Taper un sujet!</span>');
		return notice( f.subject );
	}else if( f.explication.value == '' ){
		jQuery('#form_status').html('<span class="wrong">Taper un message!</span>');
		notice( f.explication );
	}
	return   true;
}

function notice( f ){
	jQuery('#fruitkha-contact').find('input,textarea').css('border','none');
	f.style.border = '1px solid red';
	f.focus();
}