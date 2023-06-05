$(document).ready(function() {
  $(".article-wrapper").hover(
      function() {
          $(this).find(".project-hover").fadeIn();
      },
      function() {
          $(this).find(".project-hover").fadeOut();
      }
  );
});
