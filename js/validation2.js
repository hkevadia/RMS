// JavaScript Document
 $(function() {
  
    // Setup form validation on the #register-form element
    $("#securityform").validate({
    
       rules: {
                    securityQuestion: {
						required: true,
                      
					},
					securityAnswer: {
						required: true,
                        
					}
                  
                },
				
                messages: {
                    securityQuestion: {
						required :  "Please select the security question",
						
					},
					
					securityAnswer: 
					{
						required :  "Please give the security answer",
					
					}
                    
                },
				
                submitHandler: function(form) {
                    form.submit();
                }
    });
	
	// validations for the forgetpassword form;
    $("#forgotPasswordForm").validate({
    
       rules: {
		   		email:{
					required:true,
					 email: true
				},
                    securityQuestion: {
						required: true,
                      
					},
					securityAnswer: {
						required: true,
                        
					}
                  
                },
				
                messages: {
					email:{
						required: "Please enter your email",
						email: "Please enter the appropriate email address"
					},
					
                    securityQuestion: {
						required :  "Please select the security question",
						
					},
					
					securityAnswer: 
					{
						required :  "Please give the security answer",
					
					}
                    
                },
				
                submitHandler: function(form) {
                    form.submit();
                }
    });
	
	

  });

	
	
	
	