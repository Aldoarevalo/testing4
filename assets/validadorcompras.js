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
                   var validfac = /^[0-9]+$/;
		 
		 $.validator.addMethod("validfac", function( value, element ) {
		     return this.optional( element ) || validfac.test( value );
		 });
                      var validped = /^[0-9]+$/;
		 
		 $.validator.addMethod("validped", function( value, element ) {
		     return this.optional( element ) || validped.test( value );
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
		
		 $("#getaction").validate({
					
		  rules:
		  {
			notascompra: {
					required: true,
					validname: true,
					minlength: 4
				},
                               txtfecha: {
					required: true
					
					
				},
			provee: {
					required: true
					
				},
                              tetfecgadepagos: {
					required: true
					
				},
				txtfechaetrega: {
					required: true
//					validprod : true,
//					minlength: 4
					
				},
                              texvencimiento: {
					required: true
//					validped: true,
//					minlength: 4
					
				},
                            
				txttimbrado: {
					required: true,
					 validped: true	
				},
                        nrfac: {
                                    required: true,
				 validfac: true,	
				maxlength: 11
					
				},
                                  txtnombremarca: {
                                   required: true,
					validname: true,
					minlength: 4
					
					
					
				}
		   },
		   messages:
		   {
			notascompra: {
					required: "Por Favor Ingrese una nota para la  compra",
					validname: "la nota debe contar solo con alfabetos  no debe contener simbolos o numeros",
					minlength: "La nota es muy corta debe contener minimo 4 caracteres"
					  },
                                          
                                        txtfecha: {
					required: "Por Favor Ingrese la fecha "
					
					
					  },
			provee: {
					  required: "Debe seleccionar al menos un proveedor"
					
					   },
                         tetfecgadepagos: {
		                  required: "Debe ingresar una fecha de pago"
					
					   },
				txttimbrado:{
					required: "Por favor ingrese un numero de timbrado",
					validped: "Por Favor ingrese un numero de timbado valido"
					},
                                     txtfechaetrega:{
					 required: "Debe igresar la fecha de entrega de productos"
                                    
					
					}, 
                                 texvencimiento:{
					 required: "Debe ingresar la fecha de vencimiento de timbrado"
//                                      validprod: true
					
					},      
				nrfac:{
					required: "Por favor ingrese un numero de factura",
					validfac: "Debe Ingresar un numero de factura valido ",
                                        maxlength: "el numero de factura debe contener solo hasta once caracteres"
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














