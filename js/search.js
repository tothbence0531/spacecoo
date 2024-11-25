$(document).ready(function () {
  $("#searchbar").keyup(function () {
    var input = $(this).val();

    if (input != "") {
      $("#searchresults").css("display", "block");
      $.ajax({
        url: "includes/include.search.php",
        method: "POST",
        data: { input: input },

        success: function (data) {
          $("#searchresults").html(data);
        },
      });
    } else {
      $("#searchresults").css("display", "none");
    }
  });
});
