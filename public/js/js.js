$(document).ready(function(){
	$('.toast').toast('show');
	$('#staticBackdrop').modal('show');

	// Formulario
	$("#gridRadios2").click(function() {

		var previousValue = $(this).data('storedValue');
		var grid3 = $("#gridRadios3").data('storedValue');
		if (previousValue || grid3) {
			// nothin
		}else{
			$('.total').text( parseFloat( $('.total').text() ) + 1 +"$");	
			$(this).data('storedValue', true);
		}
	});
	$("#gridRadios3").click(function() {

		var previousValue = $(this).data('storedValue');
		var grid2 = $("#gridRadios2").data('storedValue');
		if (previousValue || grid2) {
			// nothin
		}else{
			$('.total').text( parseFloat( $('.total').text() ) + 1 +"$");	
			$(this).data('storedValue', true);
		}
	});

	$("#gridRadios1").click(function() {

		if ($('input:radio[id="gridRadios2"]').data('storedValue')) {
			$('.total').text( parseFloat( $('.total').text() ) - 1 +"$");	
			$('input:radio[id="gridRadios2"]').data('storedValue', false);
		}else{
			
		}
	});

	if ($("#gridRadios2").is(':checked')){
		$('.total').text( parseFloat( $('.total').text() ) + 1 + "$");
		$('input:radio[id="gridRadios2"]').data('storedValue', true);
	}
	if ($("#gridRadios3").is(':checked')){
		$('.total').text( parseFloat( $('.total').text() ) + 1 + "$");
		$('input:radio[id="gridRadios2"]').data('storedValue', true);
	}
	// END FORMULARIO
	
	// CATEGORY
	var width = $(window).width();
    $('#head').html("-");
    if (width > 993){
        $('#index').collapse('show');
    }else{
        $('#head').html("+");
    }

    // resize event
    $(window).resize(function() {
        if (window.matchMedia('(max-width: 992px)').matches) {
            $('#index').collapse('hide');
            $('#head').html("+");
        }
    });
    $('.parent').click(function(){
        var previousValue = $(this).html();
        if (previousValue == "-" ){
            $(this).html("+");
        }else{
            $(this).html("-");
        }

    });
	// END CATEGORY
});