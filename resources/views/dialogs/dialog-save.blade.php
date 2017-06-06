<dialog id="dialog" class="mdl-dialog padding-0 @if(isset($isAjax) && $isAjax === true) ajax-dialog @endif">
	<i class="material-icons status mdl-color--white mdl-color-text--green">check</i>
  	<h3 class="mdl-dialog__title mdl-color--green mdl-color-text--white text-center-only padding-half-1">
  		{{ trans('dialogs.confirm_modal_title_save_msg') }}
  	</h3>
	<div class="mdl-dialog__actions block padding-1-half ">
		<div class="mdl-grid ">
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				{!! Form::button(trans('dialogs.confirm_modal_button_cancel_text'), array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--grey-400 mdl-color-text--white dialog-close dialog-delete-close block full-span')) !!}
			</div>
			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				{!! Form::button('<span class="mdl-spinner-text">'.trans('dialogs.confirm_modal_button_save_text').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--green mdl-color-text--white mdl-button--raised full-span','type' => 'submit','id' => 'submit')) !!}
			</div>
		</div>
  	</div>
</dialog>