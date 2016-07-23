@if (Session::has('flashNotification.message'))
@if (Session::has('flashNotification.modal'))
@include('partials.modal', ['modalClass' => 'flashModal', 'title' => 'Notice', 'body' => Session::get('flashNotification.message')])
@else
<div class="notification {{ Session::get('flashNotification.level') }}">
	<div class="alert alert-dismissable alert-{{ Session::get('flashNotification.level') }}">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<p>{{ Session::get('flashNotification.message') }}</p>
	</div>
</div>
@endif
<script>
	window.setTimeout(function() {
		$(".notification.success").fadeTo(750, 0).slideUp(750, function() {
			$(this).remove();
		});
	}, 5000);
	window.setTimeout(function() {
		$(".notification.info").fadeTo(750, 0).slideUp(750, function() {
			$(this).remove();
		});
		$(".notification.message").fadeTo(750, 0).slideUp(750, function() {
			$(this).remove();
		});
	}, 10000);
</script>
<?php
	Session::forget('flashNotification.message');
	Session::forget('flashNotification.modal');
?>
@endif
