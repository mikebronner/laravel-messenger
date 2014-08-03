@if (Session::has('flashNotification.message'))
@if (Session::has('flashNotification.modal'))
@include('partials.modal', ['modalClass' => 'flashModal', 'title' => 'Notice', 'body' => Session::get('flashNotification.message')])
@else
<div class="container notification {{ Session::get('flashNotification.level') }}">
	<div class="alert alert-dismissable alert-{{ Session::get('flashNotification.level') }}">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<p>{{ Session::get('flashNotification.message') }}</p>
	</div>
</div>
@endif
<script>
	window.setTimeout(function() {
		$(".container.notification.success").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 5000);
	window.setTimeout(function() {
		$(".container.notification.info").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
		$(".container.notification.message").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 10000);
</script>
@endif
