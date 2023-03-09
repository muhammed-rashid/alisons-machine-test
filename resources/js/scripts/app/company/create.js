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
            logo:{
                required:true,
            }
        },
        messages:{
            name:"name is required",
           email:{
            required:"Email is required",
            email:"Email should be valid",
            
           },
           logo:"Logo is required"

        }
    })
})