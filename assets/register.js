// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-z A-Z]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
                 
                   var nameregexprecio = /^[0-9]+$/;
		 
		 $.validator.addMethod("validcant", function( value, element ) {
		     return this.optional( element ) || nameregexprecio.test( value );
		 });
		   var nameregex1 = /^[a-z A-Z]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex1.test( value );
		 }); 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		
		 $("#getactionordencompra").validate({
					
		  rules:
		  {
			guardar: {
					required: true,
					validname: true,
					minlength: 4
				},
				fecha: {
					required: true
					
				},
                                vencimient: {
					required: true
					
				},
				order_item_price: {
					required: true
					
				},
                            
				cpassword: {
					required: true,
					equalTo: '#password'
				},
                                txtprecio: {
                                    required: true
					
					
					
				},
                                  txtnombremarca: {
                                   required: true,
					validname: true,
					minlength: 4
					
					
					
				}
		   },
		   messages:
		   {
			guardar: {
					required: "Por Favor Ingrese una nota para el pedido",
					validname: "Name must contain only alphabets and space",
					minlength: "La nota es muy corta debe contener minimo 4 caracteres"
					  },
			fecha: {
					  required: "Debe ingresar una fecha para el pedido"
					
					   },
                          vencimient: {
		                  required: "Debe ingresar una fecha de vencimiento para el pedido"
					
					   },
				password:{
					required: "Please Enter Password",
					minlength: "Password at least have 8 characters"
					},
                                       order_item_price:{
					 required: "Please Enter Password",
                                      validcant: true
					
					}, 
                                   
				cpassword:{
					required: "Please Retype your Password",
					equalTo: "Password Did not Match !"
					},
                                       txtprecio:{
//					required: "Please Retype your Password",
//					equalTo: "Password Did not Match !"
					},
                                          txtnombremarca:{
					required: "Por Favor Ingrese un Nombre Para el Producto",
					validname: "Name must contain only alphabets and space",
					minlength: "Your Name is Too Short"
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