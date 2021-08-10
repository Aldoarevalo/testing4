// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		   var nameregex1 = /^[1-9-0]+$/;
		 
		 $.validator.addMethod("valideprecio", function( value, element ) {
		     return this.optional( element ) || nameregex1.test( value );
		 });
		 // valid email pattern
//		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//		 
//		 $.validator.addMethod("validemail", function( value, element ) {
//		     return this.optional( element ) || eregex.test( value );
//		 });
		 
		 $("#getmoneda").validate({
					
		  rules:
		  {
				txtnombre: {
					required: true,
					validname: true,
					minlength: 4
				},
				txtprecio: {
					required: true,
					valideprecio: true
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				}
		   },
		   messages:
		   {
				txtnombre: {
					required: "Por favor ingrese un nombre para el producto",
					validname: "El nombre debe contar solo con letras",
					minlength: "El nombre es muy corto debe contener minimo 4 caracteres"
					  },
			    txtprecio: {
					  required: "Por favor ingrese un precio",
					  valideprecio: "Ingrese un precio valido"
					   },
				password:{
					required: "Please Enter Password",
					minlength: "Password at least have 8 characters"
					},
				cpassword:{
					required: "Please Retype your Password",
					equalTo: "Password Did not Match !"
					}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		     
		   		submitHandler: function(form){
					
					alert('submitted');
					form.submit();
					//var url = $('#register-form').attr('action');
					//location.href=url;
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   
		   /*function submitForm(){
			 
			   
			   /*$('#message').slideDown(200, function(){
				   
				   $('#message').delay(3000).slideUp(100);
				   $("#register-form")[0].reset();
				   $(element).closest('.form-group').find("error").removeClass("has-success");
				    
			   });
			   
			   alert('form submitted...');
			   $("#register-form").resetForm();
			      
		   }*/
});