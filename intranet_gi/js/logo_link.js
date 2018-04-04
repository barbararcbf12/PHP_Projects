// JavaScript Document

$('#logo').each(function() {
  var link = $(this).html();
  $(this).contents().wrap('<a href="http://10.200.11.39/gi/index.html"></a>');
});