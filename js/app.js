$(document).foundation();
  $('#output-type').change(function() {
    var output = $(this).val();
    $('.dinsly-hidden').slideUp( function() {
      if(output == 'nslookup') {
        $('#dns-type-label').delay(500).slideDown();
      } else if(output == 'whois') {
        $('#whois-type-label').delay(500).slideDown();
      }
    });
  });

$("#submit-button").click(function(e) {
  e.preventDefault();
  var query = $("input#query-input").val();
  var displayType = $("select#display-type").val();
  var fastLookup = $("input#fast-lookup").is(':checked');
  var outputType = $('select#output-type').val();
  if (query == "") {
    $("label#query-error").slideDown();
    $("input#query-input").focus();
    return false;
  }
  if(outputType == 'nslookup') {
    var displayType = $("select#dns-type").val();
    var processor = 'nslookup-results.php';
  } else if(outputType == 'whois') {
    var displayType = $("select#display-type").val();
    var processor = 'whois-results.php';
  }
  $("label#query-error").slideUp();
  // alert(name + '\r\n' + type + '\r\n' + fast);
  var dataString = 'query=' + query + '&displayType=' + displayType + '&fastLookup=' + fastLookup;
    $.ajax({
      type: "POST",
      url: processor,
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
