@php
	$restoreDialogTitle 	= isset($restoreDialogTitle) ? $restoreDialogTitle : trans('dialogs.confirm_restore_title_text');
	$restoreBtnText 		= isset($restoreBtnText) ? $dialogSaveBtnText : trans('dialogs.confirm_modal_button_restore_text');
	$restoreIcon 			= isset($restoreIcon) ? $restoreIcon : 'replay';
	$restoreColor 			= isset($restoreColor) ? $restoreColor : 'mdl-color--green-500 mdl-color-text--white';
@endphp
<dialog id="dialog_restore" class="mdl-dialog padding-0" >
	<i class="material-icons status mdl-color--white mdl-color-text--green-500">{{ $restoreIcon }}</i>
  	<h3 class="mdl-dialog__title {{ $restoreColor }} text-center-only padding-half-1">
		{{ $restoreDialogTitle }}
  	</h3>
	<div class="mdl-dialog__actions block padding-1-half ">
		<div class="mdl-grid ">
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				{!! Form::button(trans('dialogs.confirm_modal_button_cancel_text'), ['class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--grey-400 mdl-color-text--white dialog-restore-close block full-span']) !!}
			</div>
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">

				{!! Form::button('<span class="mdl-spinner-text">'.$restoreBtnText.'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center {{ $restoreColor }} mdl-button--raised full-span','type' => 'submit','id' => 'confirm_restore')) !!}
			</div>
		</div>
  	</div>
</dialog>