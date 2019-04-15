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
    if($(this).attr("href") == window.location.pathname){
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
       if(data == "Good"){
         window.document.location.href="/login?msg='User Good'";
       }

       else{
         window.document.location.href="/login?msg='User Bad'";
       }
     }
   });
 };

 $("#ajaxBTN").click(function(){
   ajaxSubmit();
 });
});
