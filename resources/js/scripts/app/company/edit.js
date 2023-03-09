$(document).ready(function(){
    $('#company-form').validate({
        rules:{
            name:{
                required:true
            },
            email:{
                required:true,
                email:true
            },
                
        },
        messages:{
            name:"name is required",
           email:{
            required:"Email is required",
            email:"Email should be valid",
            
           }
        

        }
    })
})