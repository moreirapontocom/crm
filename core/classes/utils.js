// JavaScript Document
function validateEmail(email) {
	if ((email.length == 0) || (email.length < 5) || (email.indexOf("@") < 3))
		return false;
	else
		return true;
}

function validateURL(URL) {
	if ((URL.length == 0) || (URL.length < 5) || (URL.indexOf(".") < 3))
		return false;
	else
		return true;
}

function generateRandom(lenght) {
	var randomValue = '';
	for ( i=0;i<lenght;i++ ) {
		randomValue = randomValue + '' + Math.ceil( Math.random() * lenght );
	}
	return randomValue;
}

function loading(action) { (action == 0) ? $('#loading').fadeOut() : $('#loading').fadeIn(); }

function go(id) {
	$('html, body').animate({
	    scrollTop: $("#" + id).offset().top
	}, 1000);
}

function shake(element,frequency,spread,duration) {
	$('#' + element).shake(frequency,spread,duration);
}

function blockUI() {
	$.blockUI({
		message: null,
		overlayCSS:  { 
			backgroundColor: '#333',
			opacity: 0.6,
		},
    });
    $('.blockOverlay').click( $.unblockUI );
}

function blockUIWithMessage(message) {
	$.blockUI({
		message: '<span class="blockUI">' + message + '</span>',
		centerY: 0,
		css: {
			top: '10px',
			left: '',
			right: '10px',
			backgroundColor: '#333',
			fontColor: '#FFF',
		},
		overlayCSS:  { 
			backgroundColor: '#333',
			opacity: 0.6,
		},
    });
}

function unBlock(miliseconds) {
	if ( miliseconds == '' || !miliseconds ) {
		// unblock now
		$.unblockUI

	} else {
		// unblock at time or on click in .blockoverlay class
		$('.blockOverlay').click( $.unblockUI );
		setTimeout( $.unblockUI, miliseconds );

	}
}

function block(action,message) {
	if (action == 0) {
		unBlock();
	} else {
		if ( message == '' || !message )
			blockUI();
		else
			blockUIWithMessage(message);
	}
}

function getAnchors() {
	var URLAnchor = window.location.hash;
	if ( URLAnchor != null )
		return URLAnchor;
	else
		return false;
}

function popup(URL,width,height,top,left) {
	/*
	var width = 150;
	var height = 250;
	var left = 99;
	var top = 99;
	*/

	///*
	var width = width;
	var height = height;
	var left = left;
	var top = top;
	//*/
	window.open(URL,'janela', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left + ', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
