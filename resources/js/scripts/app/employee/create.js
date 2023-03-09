$(document).ready(function(){
    $('#company-form').validate({
        rules:{
            first_name:{
                required:true
            },
            last_name:{
                required:true
            },
            company:{
                required:true
            },

            email:{
              
                email:true
            },
          
        },
        messages:{
            first_name:"first name is required",
            last_name:"last name is required",
           email:{
         
            email:"Email should be valid",
            
           },
           company:"Company is required",
        

        }
    })
})