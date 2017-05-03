// Readmore
(function(c){function g(b,a){this.element=b;this.options=c.extend({},h,a);c(this.element).data("max-height",this.options.maxHeight);c(this.element).data("height-margin",this.options.heightMargin);delete this.options.maxHeight;if(this.options.embedCSS&&!k){var d=".readmore-js-toggle, .readmore-js-section { "+this.options.sectionCSS+" } .readmore-js-section { overflow: hidden; }",e=document.createElement("style");e.type="text/css";e.styleSheet?e.styleSheet.cssText=d:e.appendChild(document.createTextNode(d));
	document.getElementsByTagName("head")[0].appendChild(e);k=!0}this._defaults=h;this._name=f;this.init()}var f="readmore",h={speed:100,maxHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,sectionCSS:"display: block; width: 100%;",startOpen:!1,expandedClass:"readmore-js-expanded",collapsedClass:"readmore-js-collapsed",beforeToggle:function(){},afterToggle:function(){}},k=!1;g.prototype={init:function(){var b=this;c(this.element).each(function(){var a=
		c(this),d=a.css("max-height").replace(/[^-\d\.]/g,"")>a.data("max-height")?a.css("max-height").replace(/[^-\d\.]/g,""):a.data("max-height"),e=a.data("height-margin");"none"!=a.css("max-height")&&a.css("max-height","none");b.setBoxHeight(a);if(a.outerHeight(!0)<=d+e)return!0;a.addClass("readmore-js-section "+b.options.collapsedClass).data("collapsedHeight",d);a.after(c(b.options.startOpen?b.options.lessLink:b.options.moreLink).on("click",function(c){b.toggleSlider(this,a,c)}).addClass("readmore-js-toggle"));
		b.options.startOpen||a.css({height:d})});c(window).on("resize",function(a){b.resizeBoxes()})},toggleSlider:function(b,a,d){d.preventDefault();var e=this;d=newLink=sectionClass="";var f=!1;d=c(a).data("collapsedHeight");c(a).height()<=d?(d=c(a).data("expandedHeight")+"px",newLink="lessLink",f=!0,sectionClass=e.options.expandedClass):(newLink="moreLink",sectionClass=e.options.collapsedClass);e.options.beforeToggle(b,a,f);c(a).animate({height:d},{duration:e.options.speed,complete:function(){e.options.afterToggle(b,
			a,f);c(b).replaceWith(c(e.options[newLink]).on("click",function(b){e.toggleSlider(this,a,b)}).addClass("readmore-js-toggle"));c(this).removeClass(e.options.collapsedClass+" "+e.options.expandedClass).addClass(sectionClass)}})},setBoxHeight:function(b){var a=b.clone().css({height:"auto",width:b.width(),overflow:"hidden"}).insertAfter(b),c=a.outerHeight(!0);a.remove();b.data("expandedHeight",c)},resizeBoxes:function(){var b=this;c(".readmore-js-section").each(function(){var a=c(this);b.setBoxHeight(a);
			(a.height()>a.data("expandedHeight")||a.hasClass(b.options.expandedClass)&&a.height()<a.data("expandedHeight"))&&a.css("height",a.data("expandedHeight"))})},destroy:function(){var b=this;c(this.element).each(function(){var a=c(this);a.removeClass("readmore-js-section "+b.options.collapsedClass+" "+b.options.expandedClass).css({"max-height":"",height:"auto"}).next(".readmore-js-toggle").remove();a.removeData()})}};c.fn[f]=function(b){var a=arguments;if(void 0===b||"object"===typeof b)return this.each(function(){if(c.data(this,
				"plugin_"+f)){var a=c.data(this,"plugin_"+f);a.destroy.apply(a)}c.data(this,"plugin_"+f,new g(this,b))});if("string"===typeof b&&"_"!==b[0]&&"init"!==b)return this.each(function(){var d=c.data(this,"plugin_"+f);d instanceof g&&"function"===typeof d[b]&&d[b].apply(d,Array.prototype.slice.call(a,1))})}})(jQuery);


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


// Jquery Reset
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

// File upload
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

// Trim string
function trim ( string ) {
	return string.replace(/^\s+/g,'').replace(/\s+$/g,'')
}

// Search opportunities
$('#buttonSearch, #btnSearch').click(function(e){			
	var search    = $('#btnItems').val();
	if( trim( search ).length < 2  || trim( search ).length == 0 || trim( search ).length > 100 ) {
		return false;
	} else {
		return true;
	}
});//<---

$('#btnSearch_2').click(function(e){			
	var search    = $('#btnItems_2').val();
	if( trim( search ).length < 2  || trim( search ).length == 0 || trim( search ).length > 100 ) {
		return false;
	} else {
		return true;
	}
});//<---

$(document).ready(function() {

	jQuery(".timeAgo").timeago();

// Remove focus on click
$('.btn, li.dropdown a').click(function() {
	$(this).blur();
});

// Dropdown click
$('.dropdown-menu').not('.nav-session').on({
	"click":function(e){
		e.stopPropagation();
	}
});

// Input click avatar
$(document).on('click','#avatar_file',function () {
	var _this = $(this);
	$("#uploadAvatar").trigger('click');
	_this.blur();
});

// Input click cover
$(document).on('click','#cover_file',function () {
	var _this = $(this);
	$("#uploadCover").trigger('click');
	_this.blur();
});

// Input click logo
$(document).on('click','#logo_file',function () {
	var _this = $(this);
	$("#uploadLogo").trigger('click');
	_this.blur();
});


// Input click upload image
$(document).on('click','#upload_image',function () {
	var _this = $(this);
	$("#uploadImage").trigger('click');
	_this.blur();
});

// Input click upload file
$(document).on('click','#upload_file',function () {
	var _this = $(this);
	$("#uploadFile").trigger('click');
	_this.blur();
});

// Inout click shot preview
$(document).on('click','#shotPreview',function () {
	var _this = $(this);
	$("#fileShot").not('.edit_post').trigger('click');
	_this.blur();
});

// Input click attach file
$(document).on('click','#attachFile',function () {
	var _this = $(this);
	$("#attach_file").trigger('click');
	_this.blur();
});

// Delete photo / cover /bg
$(document).on('mouseenter','.deletePhoto, .deleteCover, .deleteBg', function(){
	var _this   = $(this);
	$(_this).html('<div class="photo-delete"></div>');
});

// Delete photo / cover /bg
$(document).on('mouseleave','.deletePhoto, .deleteCover, .deleteBg', function(){
	var _this   = $(this);
	$(_this).html('');
});


// HOW THIS WORKS - http://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded

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

// Avatar Change
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

// Cover Change
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

// Logo Change
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


// toggle Navbar
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


// Create Startup (OLD FUNCTION)
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
})


// Invest
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

}

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

// Edit Startup (OLD FUNCTION)
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
