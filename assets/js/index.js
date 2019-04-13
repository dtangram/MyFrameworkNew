$(document).ready(function(){
  $("#desktopToggle").on('click', function(e) {
    e.preventDefault();
    $(".iframe-preview").removeClass("iframe-preview-mobile");
  });
  $("#mobileToggle").on('click', function(e) {
    e.preventDefault();
    $(".iframe-preview").addClass("iframe-preview-mobile");
  });

  //ADD CLASS TO STYLE CURRENT LINK
  $("a").each(function(){
    if ($(this).attr("href") == window.location.pathname){
      $(this).addClass("currentLink");
    }
  });

 //AJAX FORM
 const ajaxSubmit = function(){
   const emailVal = $("#email").val(),
    passwordVal = $("#password").val(),
    typeF = "ajax";

   $.ajax({
     method: "POST",
     url: "/login/receive",
     data: {email: emailVal, password: passwordVal, type: typeF},
     success: function(data){
      // REGULAR EXPRESSION PATTERN TO BE TESTED
      const pattern = /^[a-zA-Z0-9_+.-]+\@([a-zA-Z0-9-]+\.)+[a-zA-Z0-9]{2,7}$/i;
      // /^\w+([-+.']\w+)@\w+([-.]\w+)*\.\w+([-.]\w+)*$/

      // CONSTRUCT REGULAR EXPRESSION METHOD AND PASS THE PATTERN IN THE PARAMETER AND STORE IT IN A VARIABLE
      const reg = new RegExp(pattern);
      // TEST EMAIL INPUT TO THE VARIABLE CREATED FOR PATTERN AND STORE IN A VARIABLE
      let patternChk = reg.test(emailVal);

      if(emailVal.length <= 0 || emailVal == "" || data == "Bad"){
        window.document.location.href="/login?msg='Enter your email address'";
      }

      if(!patternChk && emailVal.length > 0){
        window.document.location.href="/login?msg='Invalid email address'";
      }

      if(passwordVal == "" && patternChk && emailVal.length > 0){
        window.document.location.href="/login?msg='Password input field cannot be blank'";
      }

      if(data == "Good"){
        window.document.location.href="/login?msg='User Good'";
      }

      if(data == "Bad" && emailVal.length > 0 && passwordVal.length > 0){
        window.document.location.href="/login?msg='User Bad'";
      }
     }
   });
 };

 $("#ajaxBTN").click(function(){
   ajaxSubmit();
 });
});
