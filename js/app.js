$(document).foundation();

$("#submit-button").click(function(e) {
  e.preventDefault();
  var query = $("input#query-input").val();
  var displayType = $("select#display-type").val();
  var fastLookup = $("input#fast-lookup").is(':checked');
  if (query == "") {
    $("label#query-error").slideDown();
    $("input#query-input").focus();
    return false;
  }
  $("label#query-error").slideUp();
  // alert(name + '\r\n' + type + '\r\n' + fast);
  var dataString = 'query=' + query + '&displayType=' + displayType + '&fastLookup=' + fastLookup;
    $.ajax({
      type: "POST",
      url: "whois-results.php",
      async: true,
      data: dataString,
      success: function(res) {
        $('#query-results').html(res)
        .hide()
        .fadeIn(1500, function() {
        });
      }
    });

  return false;

});
