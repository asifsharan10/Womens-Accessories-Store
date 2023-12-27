

$(document).ready(function() {
	$('#btnPlaceOrder').click(function(e) {
		alert("hello");
		//e.preventDefault();
		var errors = new Array();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		var firstName= $("input[name=firstName]").val();
		if (firstName == '') {
		errors.push('Please enter your first name');
		}

		var lastName= $('input[name=lastName]').val();
		if (lastName == '') {
		errors.push('Please enter your last name');
		}

		var email = $('input[name=email]').val();
		if (email == '') {
		errors.push('Please enter your email');
		}
		else if (!emailReg.test($('input[name=email]').val()))
		{
		errors.push('Please enter a valid email address');
		}

		var phone= $('input[name=phone]').val();
		if (phone == '') {
		errors.push('Please enter your phone number');
		}

		var shippingAddress1= $('input[name=shippingAddress1]').val();
		if (shippingAddress1 == '') {
		errors.push('Please enter your shipping address');
		}

		var shippingCity= $('input[name=shippingCity]').val();
		if (shippingCity == '') {
		errors.push('Please enter your shipping city');
		}

		var shippingState= $('select[name=shippingState]').val();
		if (shippingState == '') {
		errors.push('Please enter your shipping state');
		}

		var shippingCountry= $('select[name=shippingCountry]').val();
		if (shippingCountry == '') {
		errors.push('Please enter your Shipping Country');
		}

		var shippingZip= $('input[name=shippingZip]').val();
		if (shippingZip == '') {
		errors.push('Please enter your shipping ZIP');
		}

		if($('#checkbox_type').val()=='yes'){
			if (!$('#iagree').is(':checked')) {
			errors.push('Please agree to the terms and conditions');
			}
		}


		if (errors.length == 0) {
			$("#loading-indicator").show();
			$('#order_form').submit(1000);

		} else {
			error_handler(errors);
			return false;
		}
});
});


$(document).on('click','#place_order',function(e) {

		e.preventDefault();
		var errors = new Array();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		var currentYear = (new Date).getFullYear();
		var currentMonth = (new Date).getMonth() + 1;

		var t_price = $('#final_price').attr('value');
		if (t_price=='0.00'){
		errors.push('Please select a product to continue');
		}

		var firstName= $("input[name=firstName]").val();
		if (firstName == '') {
		errors.push('Please enter your first name');
		}

		var lastName= $('input[name=lastName]').val();
		if (lastName == '') {
		errors.push('Please enter your last name');
		}

		var shippingAddress1= $('input[name=shippingAddress1]').val();
		if (shippingAddress1 == '') {
		errors.push('Please enter your shipping address');
		}

		var shippingCity= $('input[name=shippingCity]').val();
		if (shippingCity == '') {
		errors.push('Please enter your shipping city');
		}

		var shippingState= $('input[name=shippingState]').val();
		if (shippingState == '') {
		errors.push('Please enter your shipping state');
		}

		var shippingCountry= $('input[name=shippingCountry]').val();
		if (shippingCountry == '') {
		errors.push('Please enter your shipping country');
		}

		var shippingZip= $('input[name=shippingZip]').val();
		if (shippingZip == '') {
		errors.push('Please enter your shipping zipcode');
		}

		var phone= $('input[name=phone]').val();
		if (phone == '') {
		errors.push('Please enter your phone number');
		}

		var email = $('input[name=email]').val();
		if (email == '') {
		errors.push('Please enter your email');
		}
		else if (!emailReg.test($('input[name=email]').val()))
		{
		errors.push('Please enter a valid email address');
		}		

		var ccno= $('input[name=cc_no]').val();
		if (ccno == '') {
		errors.push('Please enter your credit card number');
		}
		
		var ccmonth= $('select[name=cc_month]').val();
		var ccyear = $('select[name=cc_year]').val();


		if (ccmonth == '') { errors.push('Please enter credit card month');}
		else if(ccmonth < currentMonth && ccyear <= currentYear ) { errors.push('Invalid Expiry Date.');}
		else if(ccmonth > 12 ) { errors.push('Please enter a valid month');}

		
		if (ccyear == '') {	errors.push('Please enter credit card year'); }
		else if(ccyear < currentYear ) { errors.push('Invalid Expiry Date.');}
		else if (ccyear < 20) {	errors.push('Please enter a valid year'); }


		var cvv= $('input[name=CVV]').val();
			if (cvv == '') {
			errors.push('Please enter CVV');
		}

		if($('#checkbox_type').val()=='yes'){
			if (!$('#iagree').is(':checked')) {
			errors.push('Please agree to the terms and conditions');
			}
		}

		

			$.each($('.prod_v_p'), function(index, value) {
				if (!$(value).is(':checked')){
					var vtext = $(value).attr('p_name')
					errors.push('Please agree to '+ vtext +' terms');	
				}
        	});	

	

		



		if (errors.length == 0) {
			//
			//$("#loading-indicator").show().delay(1000).hide(0);
			order_confirm();

		} else {
			error_handler(errors);
			return false;
		}
});


// $(document).on('click','#canform_submit',function(e) {
	function canform_submit(admin_phone){
		//e.preventDefault();
		//alert(hi);
		var errors = new Array();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		var order_id= $('input[name=orderid]').val();
		if (order_id == '') {
		errors.push('Please enter your Order Id');
		}

		var firstName= $("input[name=firstName]").val();
		if (firstName == '') {
		errors.push('Please enter your Name');
		}
	

		var email = $('input[name=email]').val();
			if (email == '') {
			errors.push('Please enter email');
			}
			else if (!emailReg.test($('input[name=email]').val()))
			{
			errors.push('Please enter a valid email address');
		}

		var phone= $('input[name=phone]').val();
		if (phone == '') {
		errors.push('Please enter your phone');
		}

		var cancel_reason= $("input[name=cancel_reason]").val();
		if (cancel_reason == '') {
		errors.push('Please enter reason for cancellation');
		}

		if (errors.length == 0) {
			//$("#loading-indicator").show();
			//$('#myForm').submit(1000);
			popop_cancel_text(admin_phone)
			//console.log('success');

		} else {
			error_handler(errors);
			return false;
		}


};