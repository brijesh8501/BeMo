// scroll up functionality
var scrollBtn = $('#scrollup');

$(window).scroll(function() {

  if(($(window).width() >= 992 && $(window).scrollTop() > 10)){
    $(".navbar-custom").css('opacity','0.8')
  }else if(($(window).width() >= 992 && $(window).scrollTop() < 10)){
    $(".navbar-custom").removeAttr('style');
  }

  ($(window).scrollTop() > 300)?
    scrollBtn.addClass('show')
  :
    scrollBtn.removeClass('show');
});

scrollBtn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

// active menu functionality
var url = location.pathname.split("/")[2];
if(url === ""){
  url = "/bemo/";
}
$('.nav-item.active').removeClass('active');
$('.nav-item').removeAttr('id');
$('.nav-item a').removeAttr('id');
$('.nav-item a').addClass('text-dark');
$('.nav-item a[href="' + url  + '"]').parent().addClass('active').attr('id', 'current');
$('.nav-item a[href="' + url  + '"]').attr('id', 'current');
$('.nav-item a[href="' + url  + '"]').removeClass('text-dark');
$(this).parent().addClass('active').siblings().removeClass('active');

// remove message when new form submission initiated
$("input, textarea").keypress(function(){
  ($( "#contact-form .alert-success" ).length !== 0)&& $(".alert-success").remove();
  ($( "#contact-form .alert-danger" ).length !== 0)&& $(".alert-danger").remove();
});

// submit contact details 
$("#contact-submit").on('click', function(event) {

  // contact data store in an object
  var data = {
    name: $('#name').val(),
    email: $('#email').val(),
    message: $('#message').val(),
    captcha: $('#g-recaptcha-response').val(),
    action: "insert"
  }

  // validate form
  const validateResult = validateForm(data);

  // if no errors in form 
  if(validateResult === 0){

    // disable button to prevent dupilcation of data
    $("#contact-submit").attr("disabled", true);

    // change button text to show user to wait
    $("#contact-submit").html("Sending request...");

    // ajax post request to pass data to php file 
    $.post("/request.php", data, function(result){
      console.log(result);
      // reset form
      resetForm();

      // enable button & reset button text
      $("#contact-submit").attr("disabled", false);
      $("#contact-submit").html("SUBMIT");

      // if server responds 0 then eror message will be shown
      // else success message will be shown 
      if(result==="1") {
          
        $("#contact-form").prepend(`<div class="alert alert-success">Sent successfully!</div>`);
        if (window.grecaptcha) grecaptcha.reset();
          
    	}else{

        $("#contact-form").prepend(`<div class="alert alert-danger">Something went wrong!</div>`);
          
  		}
    });

  }

});

// reset form on click button "RESET"
$("#contact-reset").on('click', function(event) {
  resetForm();
});

// reset function for form
function resetForm(){

  ($( "#contact-form .alert-danger" ).length !== 0)&& $(".alert-danger").remove();
  ($( "#contact-form .alert-success" ).length !== 0)&& $(".alert-success").remove();
  $('#name').val("");
  $('#email').val("");
  $('#message').val("");
  
}

// validate form
function validateForm(data){

  var result = [];
  email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
  if(data.name == ""){
      result.push("Name is required");
  }
  if(data.email == ""){
      result.push("Email address is required");
  }else if(!email_regex.test(data.email)){
      result.push("Invalid email address format")
  }
  if(data.message == ""){
    result.push("Message is required");
  }

  ($( "#contact-form .alert-danger" ).length !== 0)&& $(".alert-danger").remove();
  ($( "#contact-form .alert-success" ).length !== 0)&& $(".alert-success").remove();

  // show validation errors 
  (result.length !== 0)&& $("#contact-form").prepend(`<div class="alert alert-danger">${result.map((item, i) => { return i+1+". "+item+"<br/>"; }).join('')}</div>`);
  return result.length
}