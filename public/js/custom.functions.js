function attachValidator(fieldArray){
	var rules = {};
	$.each(fieldArray, function(i, j){
		var rulesObject = {required:true};
		rules[j] = rulesObject;
	});
	
	jQuery('form').validate({
        rules: rules,
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
}

$(function(){
	$('button#service_save, button#type_save, button#service_update').click(function(){
		var btnId = $(this).attr('id');
		var url = "";
		switch(btnId){
			case 'service_save':
				var url = "/services/add";
			break;
			case 'type_save':
				var url = "/types/add";
			break;
			case 'service_update':
				var url = "/services/edit";
			break;
		}
		
		var options = $('#multiselect option:selected');
        var selectedOptions = [];
        $(options).each(function(index, _case){
        	selectedOptions.push($(this).val());
        });
        $('#multiselectOptions').val(selectedOptions.join(','));
        
		if($('form').valid() == false){
			return false;
		}
		var btn = $(this);
		btn.button('loading');
	    $.post(url, $('form').serialize(),function(data){
	    	var data = JSON.parse(data);
			if(data.success == true){
				$('#modal').find('div.modal-body').html('<span class="label label-success" style="font-size:13px;">Successfully Saved!!!</span>'); $("#modal").modal('show');	
			}else{
				$('#modal').find('div.modal-body').html('<span class="label label-danger" style="font-size:13px;">Error Occured. Try again.</span>'); $("#modal").modal('show');
			}
			btn.button('reset');
		}).fail(function( data ) {
			$('#modal').find('div.modal-body').html('<span class="label label-danger" style="font-size:13px;">Error Occured. Try again.</span>'); $("#modal").modal('show');
			btn.button('reset'); 
		});
	})
});