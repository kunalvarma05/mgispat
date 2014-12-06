function sent(data, statusText, xhr, form) {
	if(!data.error){
		jQuery(form).slideUp(500);
		jQuery('.success').slideDown(500);
		jQuery('.success').delay(2000).slideUp(500);
		jQuery(form).delay(3000).slideDown(500);
	}else{
		jQuery('.error').slideDown(500);
		jQuery('.error').delay(2000).slideUp(500);
	}
}

function validateForm(arr, $form, options) {
	var cancel = false;
	$form.find('[data-required=true]').each(function() {
		if (jQuery(this).val() === "") {
			var field = jQuery(this).attr('data-l-title');
			var error = field + " is required";
			jQuery(this).tooltip({
				placement: "bottom",
				title: error
			}).tooltip("show");
			cancel = true;
			return false;
		}
	});
	if (cancel) {
		return false;
	}
}

var options = {
	success : sent, // post-submit callback
	error: sent,
	resetFomr : true,
	beforeSubmit : validateForm,
	dataType : "json" //Expected data type
};
jQuery(document).ready(function() {
	jQuery('.contact-form').submit(function() {
		jQuery(this).ajaxSubmit(options);
		return false;
	});
});
