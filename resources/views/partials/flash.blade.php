@if (Session::has('flash_message'))
    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
@endif
@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif