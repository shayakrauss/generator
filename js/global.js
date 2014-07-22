$('#resSelect').on('click', function(e) {
  e.preventDefault();

  $('#genResult').focus().select();
})

$('#genSelect').on('change', function() {
  var genInput = $('#genInput');
  genInput.show().focus();
  if($(this).val() == 'url_shorten') {
    genInput.attr('type', 'url');
  } else if($(this).val() !== '') {
    genInput.attr('type', 'text');
  } else {
    genInput.hide();
  }
})

$('#genSelect, #genInput').on('change', function() {
  $('#genResult').text('');
  $('#resDiv, #mainErrorMsg').hide();
});

$('#genForm').on('submit', function(e) {
  e.preventDefault();

  var genSelect = $('#genSelect'),
      genInput = $('#genInput'),
      url = 'includes/global.php';

  if(genSelect.val() !== '' && genInput.val() !== '') {
    if(genSelect.val() == 'url_shorten') {
      url = 'includes/shortener.php';
    };

    $.ajax({
      url: url,
      method: 'post',
      data: $(this).serialize()
    }).done(function(retVal) {
      $('#genResult').text(retVal);
      $('#resDiv').show();
    })
  } else {
    $('#mainErrorMsg').text('All fields are required.').show();
  }
});

$("#resSelect").on('click', function() {
  if($('#tmp').length) {
    $('#tmp').remove();
  }
  var clickText = $('#genResult').text();
  $('<textarea id="tmp" />')
        .appendTo($('#genResult'))
        .val(clickText)
        .focus()
        .select();

  return false;
});

$(':not(#resSelect)').on('click', function() {
  $('#tmp').remove();
})