
$(function(){        
	navMinimize();			 //Navigation Bar Minimimze
	compareResetPassword();  //Reset Password Message
	checkAll(); 			 //Check all checkboxes on table
	userWizard();			 //Check all checkboxes on table
	addDev();
	transferToTimeBox();

});

/*Custom Functions*/
function navMinimize(){
    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
}
function changeSwitchValue(_this){
	$("#"+_this).change(function(){
		if($(this).is(":checked")){
			$(this).val("1");
		}else{
			$(this).val("0");
		}
	});
} 
function compareResetPassword(){
	var form = $('#reset-password-form');
	var password = $('#txtPassword');
	var confirm  = $('#txtConfirm');
	var trigger  = $('#btnResetPasswordSubmit');
	var flash_container = $(".flash-message");
	var msg = '<div class="alert alert-danger" role="alert">';
				 msg += '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
				 msg += '<strong>Oh snap!</strong> The Password did not match!'
				 msg += '</div>';
	
	trigger.click(function(){
		if(password.val() != confirm.val()){
			flash_container.html(msg);
			console.log('Script : Password did not match!');
			
		}else{
			form.submit();
		}
	});

}
function validationMessage(_type){
	var _ret="";
	if(_type == "text"){
		_ret = "This field is required.";
	}else if(_type == "email"){
		_ret = "Use the proper email format : (sample@sample.com)";
	}else{
		_ret = "This field is required.";
	}
	return _ret;
}
function userWizard(){
	var _next    = $("#userNext");
	var _per     = $("#personal-info");
	var _log     = $("#login-info");
	var _prev    =  $("#userPrev");
	var _step    = $(".step");
	var _submit  = $("#userSubmit");
	var _isValid = "true";
	//Next
	_next.click(function(){
		
		_per.find('input, select').filter('[required]:visible').each(function(){		
			if(!this.validity.valid){
				$(this).focus();
				$(this).next('span').remove();
				$(this).attr({style:'border:1px solid #b64645;'});
				$(this).after('<span style="color:#b64645;">'+validationMessage(this.type)+'</span>');
				_isValid = "false";
				return false;
			}else{
				$(this).next('span').remove();
				_isValid = "true"
			}
		});
		if(_isValid == "true"){
			_per.toggleClass('show hide');
			_log.toggleClass('show hide');
			_step.attr('data-step','1');			
		}

	});
	//Previous
	_prev.click(function(){
		_per.toggleClass('show hide');
		_log.toggleClass('show hide');
		_step.attr('data-step','0');
	});
	//Submit
	_submit.click(function(){
		_isValid = "true";
		_log.find('input, select').filter('[required]:visible').each(function(){		
			if(!this.validity.valid){
				$(this).focus();
				$(this).next('span').remove();
				$(this).attr({style:'border:1px solid #b64645;'});
				$(this).after('<span style="color:#b64645;">'+validationMessage(this.type)+'</span>');
				_isValid = "false";
				return false;
			}else{
				_isValid = "true";
				$(this).next('span').remove();
			}
		});
			
			if(_isValid == "true"){
				if($("#txtConfirm").val() != $("#txtPassword").val()){	
					$("#txtConfirm").attr({style:'border:1px solid #b64645;'});
					$("#txtConfirm").after('<span style="color:#b64645;">Password did not match</span>');
					
					$("#txtPassword").attr({style:'border:1px solid #b64645;'});
					$("#txtPassword").after('<span style="color:#b64645;">Password did not match</span>');						
				}else{
					$("#smart-validate").submit();
				}
		}
	});
	
}
function checkAll(){
	var _trigger = $("#check-all");
	_trigger.click(function(event) {
	  if(this.checked) {
		  $(':checkbox').each(function() {
			  this.checked = true;
		  });
		  //console.log('Script : check all checkboxes');
	  }
	  else {
		$(':checkbox').each(function() {
			  this.checked = false;
		  });
		 // console.log('Script : Uncheck all checkboxes');
	  }
	});
}
function getSubCatViaCatID(_catID){
	var _container = $('#sub-cat-ajax');
	_container.load('../../admin/load/ajax-subcat/'+_catID);
}
function addDev(){
	var _trigger = $("#add-developer");
	var _target =  $("#add-developer-container");
	var ctr = 0;
	_trigger.click(function(){	
		_target.toggleClass('hide');
			if(ctr == 0){
				$(this).html("Hide");
				ctr++;
			}else{
				$(this).html("<i class='fa fa-plus'></i> Add Other Developer");
				ctr--;
			}
	});
}
function filterTask(_role){
	var _trigger = $("#filter");
	var _container = $("#filter-task-container");
	
	_trigger.change(function(){
		if(_role == "admin"){
			_container.load('../../admin/load/ajax-filter/'+_trigger.val());	
			console.log("Script : Admin Filter");
		}else if(_role == "user"){
			_container.load('../../user/load/ajax-filter/'+_trigger.val());
			console.log("Script : User Filter");
		}
	});
}
function transferToTimeBox(){
	var _box     = $(".message-box.standard");
	var _taskID  = $("#txtID");
	var _title   = $(".time-entry-task-title");
	var _percent   = $("#txtPercent");
	var _assignedBy   = $("#hdAssignedBy");
	
	$('.datatable').on('click', '#transferToModal', function() {
		_taskID.val($(this).attr('data-id'));
		_title.html("<strong>"+$(this).attr('data-project')+"</strong>"+" : "+$(this).attr('data-name'));
		_percent.val($(this).attr('data-percent'));
		_assignedBy.val($(this).attr('data-assigned'));
		_box.toggleClass("open");
		 playAudio('alert');
	});
}
function debug(){
	alert("Connected");
}
function loadCss(_css){
	var l = document.createElement('link'); l.rel = 'stylesheet';
	l.href = _css;
	var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
}
