$(document).ready(function () {
    $('#navbarSupportedContent a').each(function() {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if(location === link) {
            $(this).addClass('active');
        }
    });
	
	// Init CKEDITOR
	const editor = CKEDITOR.replaceAll()
    CKFINDER.setupCKEditor( editor )

});
