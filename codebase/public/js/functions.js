// Waiting
(function($){
	$.fn.waiting = function( p_delay ){
		var $_this = this.first();
		var _return = $.Deferred();
		var _handle = null;

		if ( $_this.data('waiting') != undefined ) {
			$_this.data('waiting').rejectWith( $_this );
			$_this.removeData('waiting');
		}
		$_this.data('waiting', _return);

		_handle = setTimeout(function(){
			_return.resolveWith( $_this );
		}, p_delay );

		_return.fail(function(){
			clearTimeout(_handle);
		});

		return _return.promise();
	};
})(jQuery);

// Reset jQuery
jQuery.fn.reset = function () {
	$(this).each (function() { this.reset(); });
}

// Scroll Element
function scrollElement( element ){
	var offset = $(element).offset().top;
	$('html, body').animate({scrollTop:offset}, 500);
};

// Escape HTML
function escapeHtml( unsafe ) {
	return unsafe
	.replace(/&/g, "&amp;")
	.replace(/</g, "&lt;")
	.replace(/>/g, "&gt;")
	.replace(/"/g, "&quot;")
	.replace(/'/g, "&#039;");
}

// Load
$(window).bind("load", function () {

	$("#attach_file").val('');
	$('#fileShot').val('');

	$("#uploadFile").val('');
	$("#uploadImage").val('');

	if ($('.imgColor').length) {
		colorChange();
		$( ".colorPalette" ).first().css({"border-bottom-left-radius": "3px", "border-top-left-radius": "3px" });
		$( ".colorPalette" ).last().css({"border-bottom-right-radius": "3px", "border-top-right-radius": "3px" });
	}
});

// Trim
function trim ( string ) {
	return string.replace(/^\s+/g,'').replace(/\s+$/g,'')
}

// Search
$('#buttonSearch, #btnSearch').click(function(e){			
	var search    = $('#btnItems').val();
	if( trim( search ).length < 2  || trim( search ).length == 0 || trim( search ).length > 100 ) {
		return false;
	} else {
		return true;
	}
});//<---

// Search 2
$('#btnSearch_2').click(function(e){			
	var search    = $('#btnItems_2').val();
	if( trim( search ).length < 2  || trim( search ).length == 0 || trim( search ).length > 100 ) {
		return false;
	} else {
		return true;
	}
});


// Doc Ready
$(document).ready(function() {

	jQuery(".timeAgo").timeago();

// Remove focus
$('.btn, li.dropdown a').click(function() {
	$(this).blur();
});

// Dropdown
$('.dropdown-menu').not('.nav-session').on({
	"click":function(e){
		e.stopPropagation();
	}
});

// Avatar
$(document).on('click','#avatar_file',function () {
	var _this = $(this);
	$("#uploadAvatar").trigger('click');
	_this.blur();
});


// Cover
$(document).on('click','#cover_file',function () {
	var _this = $(this);
	$("#uploadCover").trigger('click');
	_this.blur();
});


// Logo
$(document).on('click','#logo_file',function () {
	var _this = $(this);
	$("#uploadLogo").trigger('click');
	_this.blur();
});


// Upload Image
$(document).on('click','#upload_image',function () {
	var _this = $(this);
	$("#uploadImage").trigger('click');
	_this.blur();
});

// Upload File
$(document).on('click','#upload_file',function () {
	var _this = $(this);
	$("#uploadFile").trigger('click');
	_this.blur();
});

// Shot Preview
$(document).on('click','#shotPreview',function () {
	var _this = $(this);
	$("#fileShot").not('.edit_post').trigger('click');
	_this.blur();
});

// Attach File
$(document).on('click','#attachFile',function () {
	var _this = $(this);
	$("#attach_file").trigger('click');
	_this.blur();
});

// Delete
$(document).on('mouseenter','.deletePhoto, .deleteCover, .deleteBg', function(){

	var _this   = $(this);
	$(_this).html('<div class="photo-delete"></div>');
});

// Delete
$(document).on('mouseleave','.deletePhoto, .deleteCover, .deleteBg', function(){

	var _this   = $(this);
	$(_this).html('');
});


// How this works -  http://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded

// Avatar
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#upload-avatar').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

// Avatar
$("#file-avatar").change(function(){
	readURL(this);
});

// Cover
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#upload-cover').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

// Cover
$("#file-cover").change(function(){
	readURL(this);
});


// Logo
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#upload-logo').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

// Logo
$("#file-logo").change(function(){
	readURL(this);
});


// Tooltip
$('.showTooltip').tooltip();

$('.delete-attach-image').click(function(){
	$('.imageContainer').fadeOut(100);
	$('#previewImage').css({ backgroundImage : 'none'});
	$('.file-name').html('');
	$('#uploadImage').val('');

});

$('.delete-attach-file').click(function(){
	$('.fileContainer').fadeOut(100);
	$('#previewFile').css({ backgroundImage : 'none'});
	$('.file-name-file').html('');
	$('#uploadFile').val('');
});

$('.delete-attach-file-2').click(function(){
	$('.fileContainer').fadeOut(100);
	$('.file-name-file').html('');
	$('#attach_file').val('');
});

$("#saveUpdate").on('click',function(){
	$(this).css({'display': 'none'})
});

$("#paypalPay").on('click',function(){
	$(this).css({'display': 'none'})
});


// Toggle Navbar
function toggleNavbarMethod() {
	if ($(window).width() > 768) {
		$('.dropdown').hover(function(){
			$(this).addClass('open');
		}, function(){
			$(this).removeClass('open');
		});
	}
	else {
		$('.navbar .dropdown').off('mouseover').off('mouseout');
	}
}
toggleNavbarMethod();
$(window).resize(toggleNavbarMethod);


// Search Button
$('button[type=submit], input[type=submit]').not('.btn_search').click(function(){
	$('.wrap-loader').show();
});

// Toolti
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})

// Active Tabs
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	e.target 
	e.relatedTarget 
});



// Create Startup
$(document).on('click','#buttonFormSubmit',function(s){

	s.preventDefault();
	var element = $(this);
	element.attr({'disabled' : 'true'});

	(function(){
		$("#formUpload").ajaxForm({
			dataType : 'json',	
			success:  function(result){

				if( result.success != false ){
					window.location.href = result.target;
}//<-- e
else {
	var error = '';
	for( $key in result.errors ){
		error += '<li><i class="glyphicon glyphicon-remove myicon-right"></i> ' + result.errors[$key] + '</li>';
	}
	$('#showErrors').html(error);
	$('#dangerAlert').fadeIn(500)
	$('.wrap-loader').hide();
	element.removeAttr('disabled');
}
}
}).submit();
	})(); 
});



// Invest in Startup
$(document).on('click','#buttoninvestment',function(s){

	s.preventDefault();
	var element = $(this);
	element.attr({'disabled' : 'true'});

	(function(){
		$("#forminvestment").ajaxForm({
			dataType : 'json',	
			success:  function(result){

				if( result.success != false && result.formPP ){

					$( result.formPP ).appendTo( "body" );
					$("#form_pp").submit();

}//<-- e

else if( result.success != false && result.stripeTrue == true  ) {

	var handler = StripeCheckout.configure({
		key: result.key,
		locale: 'auto',
		token: function(token) {
// You can access the token ID with `token.id`.
// Get the token ID to your server-side code for use.
var $input = $('<input type=hidden name=stripeToken />').val(token.id);
$('#forminvestment').append($input).submit();
}
});

// Open Checkout with further options:
handler.open({
	email: result.email,
	name: result.name,
	description: result.description,
	currency: result.currency,
	amount: result.amount
});

// Close Checkout on page navigation:
$(window).on('popstate', function() {
	handler.close();
});

$('.wrap-loader').hide();
element.removeAttr('disabled');
}

else if( result.success != false && result.stripeSuccess == true ) {
	window.location.href = result.url;
}

else {
	var error = '';
	for( $key in result.errors ){
		error += '<li><i class="glyphicon glyphicon-remove myicon-right"></i> ' + result.errors[$key] + '</li>';
	}
	$('#showErrorsinvestment').html(error);
	$('#errorinvestment').fadeIn(500)
	$('.wrap-loader').hide();
	element.removeAttr('disabled');
}
}
}).submit();
	})(); 
});


// Edit Startup
$(document).on('click','#buttonFormUpdate',function(s){

	s.preventDefault();
	var element = $(this);
	element.attr({'disabled' : 'true'});

	(function(){
		$("#formUpdate").ajaxForm({
			dataType : 'json',	
			success:  function(result){

				if( result.fatalError == true ) {
					window.location.href = result.target;
					return false;
				}

				if( result.success != false ){

					if( result.finish_startup == true ) {
						window.location.href = result.target;
					} else {
						$('.wrap-loader').hide();
						$('#dangerAlert').fadeOut();
						element.removeAttr('disabled');
						$('#successAlert').fadeIn(500);
					}

				}
				else {
					var error = '';
					for( $key in result.errors ){
						error += '<li><i class="glyphicon glyphicon-remove myicon-right"></i> ' + result.errors[$key] + '</li>';
					}
					$('#showErrors').html(error);
					$('#successAlert').fadeOut();
					$('#dangerAlert').fadeIn(500)
					$('.wrap-loader').hide();
					element.removeAttr('disabled');
				}
			}
		}).submit();
	})();
});

// Update Form
$(document).on('click','#buttonUpdateForm',function(s){

	s.preventDefault();
	var element = $(this);
	element.attr({'disabled' : 'true'});

	(function(){
		$("#formUpdatestartup").ajaxForm({
			dataType : 'json',	
			success:  function(result){

				if( result.success != false ){
					window.location.href = result.target;
				}
				else {
					var error = '';
					for( $key in result.errors ){
						error += '<li><i class="glyphicon glyphicon-remove myicon-right"></i> ' + result.errors[$key] + '</li>';
					}
					$('#showErrors').html(error);
					$('#successAlert').fadeOut();
					$('#dangerAlert').fadeIn(500)
					$('.wrap-loader').hide();
					element.removeAttr('disabled');
				}
			}
		}).submit();
	})(); 
});
}); 

// Text Truncate
function textTruncate( element, text ){
	var descHeight = $(element).outerHeight();

	if( descHeight > 500 ) {
		$(element).addClass('truncate').append('<span class="btn-block text-center color-default font-default readmoreBtn"><strong>'+text+'</strong></span>');
	}

	$(document).on('click','.readmoreBtn', function(){
		$(element).removeClass('truncate');
		$(this).remove();
	});
}
