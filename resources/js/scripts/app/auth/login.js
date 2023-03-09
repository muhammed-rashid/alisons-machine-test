$(function () {
  'use strict';

  var pageLoginForm = $('.auth-login-form');
  var pageForgotForm = $('.auth-forgot-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageLoginForm.length) {
    pageLoginForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'email': {
          required: true,
          email:true
        
        },
        'password': {
          required: true,
          minlength:8
        }
      },
      messages:{
        email:{
          required:"Email Address is Required",
          email:"Email Shoulb be valid"

        },
        password:{
          required:"Password is Required",
          minlength:"Password should contain atlease 8 charecters"
        }
      }
    });
  }

  if (pageForgotForm.length) {
    pageForgotForm.validate({
   
      rules: {
        'email': {
          required: true,
          email: true
        }
      }
    });
  }
});
