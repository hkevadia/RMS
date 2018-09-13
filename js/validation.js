// JavaScript Document
 $(function() {
  
    // Setup form validation on the #register-form element
    $("#registrationform").validate({
    
       rules: {
                    firstName: {
						required: true,
                      
					},
					lastName: {
						required: true,
                        
					},
                  
                    email: {
                        required: true,
                        email: true
                    },
					address: { 
						required:true,
						minlength:20
					},
					city:{
						required:true,
						
					},
					pincode:{
						required:true,
						number:true,
						exactlength: 6
					},
					mobileNumber:{
						required:true,
						number:true,
						exactlength:10
					},
					dateOfBirth:{
						required:true,
					},
					website:{
						required:true,
						url:true
					}
					
				},
				
                messages: {
                    firstName: {
						required :  "Please enter your firstname",
						
					},
					
					lastName: 
					{
						required :  "Please enter your lastName",
					
					},
                  
                    email: {
                        required: "Please provide a email",
                        email: "Please enter a valid email address"
                    },
					address: {
						required: "Please enter your Address",
						minlength: "Enter your full Address"
					},
					city:{
						required:"Please Enter the name of your city"
						
					},
					pincode:{
						required:"Please enter the pincode of your city",
						number:"Only numbers are allowed",
						exactlength:"Enter valid 6 digit pincode"
					},
					mobileNumber:{
						required:"Please enter your Mobile Number",
						number:"Only numbers are allowed",
						exactlength:"Enter valid 10 digit Mobile Number "
					},
					website:{
						required:"Please enter Website name",
						url:"Enter Valid Website url pattern"
					}
                    
                },
				
                submitHandler: function(form) {
                    form.submit();
                }
    });

  });

	
	
	
	