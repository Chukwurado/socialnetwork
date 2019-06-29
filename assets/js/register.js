$(document).ready(function() {
  //On click signup, hide log in an show registration form
  $("#signup").click(function() {
    $("#first").slideUp("slow", function() {
      $("#second").slideDown("slow");
    });
  });

  $("#signin").click(function() {
    $("#second").slideUp("slow", function() {
      $("#first").slideDown("slow");
    });
  });
});
