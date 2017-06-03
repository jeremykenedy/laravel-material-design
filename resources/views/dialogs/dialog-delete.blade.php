@php
	$deleteDialogTitle 	= isset($dialogTitle) ? $dialogTitle : trans('dialogs.confirm_delete_title_text');
	$deleteBtnText 		= isset($dialogSaveBtnText) ? $dialogSaveBtnText : trans('dialogs.confirm_modal_button_delete_text')
@endphp
<dialog id="dialog_delete" class="mdl-dialog padding-0" >
	<i class="material-icons status mdl-color--white mdl-color-text--red-700">warning</i>
  	<h3 class="mdl-dialog__title mdl-color--red-700 mdl-color-text--white text-center-only padding-half-1">
		{{ $deleteDialogTitle }}
  	</h3>
	<div class="mdl-dialog__actions block padding-1-half ">
		<div class="mdl-grid ">
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				{!! Form::button(trans('dialogs.confirm_modal_button_cancel_text'), array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--grey-400 mdl-color-text--white dialog-close dialog-delete-close block full-span')) !!}
			</div>
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">

				{!! Form::button('<span class="mdl-spinner-text">'.$deleteBtnText.'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--red-700 mdl-color-text--white mdl-button--raised full-span','type' => 'submit','id' => 'confirm')) !!}
			</div>
		</div>
  	</div>
</dialog>