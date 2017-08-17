
function init_CKEditor(nd_id)
{
	if (CKEDITOR.instances[nd_id])
		CKEDITOR.instances[nd_id].destroy(true);

	CKEDITOR.replace(nd_id, 
	{
		toolbar :
		[
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
	{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
	'/',
	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
	{ name: 'others', items: [ '-' ] },
	{ name: 'about', items: [ 'About' ] }
],
		extraPlugins: 'mybutton,blockquote',
		format_tags: 'h1;h2;h3;p',
		enterMode: CKEDITOR.ENTER_BR,
		contentsCss: ['/css/editor.css'],
		allowedContent: true,
		FillEmptyBlocks: false,
	});
}

function init_CKEditor_options(nd_id, options)
{
	if (CKEDITOR.instances[nd_id])
		CKEDITOR.instances[nd_id].destroy(true);

	CKEDITOR.replace(nd_id, options);
}


$(document).ready(function() {
	$('.js-delete-photo').on('click', function deletePhoto(e) {
		e.preventDefault();
		if (confirm('Вы уверены?'))
		{
			var url = $(this).attr('href');
			$.post(url).success(setTimeout(function () {location.reload()}, 500));
		}
  	});

});
