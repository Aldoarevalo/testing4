// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-z A-Z]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
                   var validtot = /^[0-9]+$/;
		 
		 $.validator.addMethod("validtot", function( value, element ) {
		     return this.optional( element ) || validtot.test( value );
		 });
                   var valifac = /^[0-9]+$/;
		 
		 $.validator.addMethod("valifac", function( value, element ) {
		     return this.optional( element ) || valifac.test( value );
		 });
                      var validsi = /^[a-zA-Z]+$/;
		 
		 $.validator.addMethod("validsi", function( value, element ) {
		     return this.optional( element ) || validsi.test( value );
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
                               from: {
					required: true
					
					
				},
				prov: {
					required: true
					
				},
                                to: {
					required: true
					
				},
				comboproveedorp: {
					required: true
//					validprod : true,
//					minlength: 4
					
				},
                                fecha: {
					required: true
//					validped: true,
//					minlength: 4
					
				},
                            
				txtssitios: {
					required: true,
					validsi:true
				},
                              finall: {
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
					required: "Por Favor Ingrese una nota para la orden de compra",
					validname: "la nota debe contar solo con alfabetos  no debe contener simbolos o numeros",
					minlength: "La nota es muy corta debe contener minimo 4 caracteres"
					  },
                                          
                                         from: {
					required: "Por Favor Ingrese la fecha "
					
					
					  },
			prov: {
					  required: "Debe seleccionar al menos un proveedor"
					
					   },
                          to: {
		                  required: "Debe ingresar una fecha de vencimiento para la orden de compra"
					
					   },
				password:{
					required: "Please Enter Password",
					minlength: "Password at least have 8 characters"
					},
                                     comboproveedorp:{
					 required: "Debe Seleccionar un Proveedor"
                                    
					
					}, 
                                  fecha:{
					 required: "Debe ingresar la fecha fecha de entrega"
//                                      validprod: true
					
					},      
				txtssitios:{
					required: "Por favor ingrese un sitio de entrega",
					validsi:"Debe ingresar solo alfabetos para el sitio no debe contener simbolos ni numeros"
					},
                                      finall:{
					required: "Por Favor ingrese al menos un item",
					validtot: "Name must contain only alphabets and space"
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














