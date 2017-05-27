@component('mail::message')
# Ha recibido un pago

Ha recibido un pago de Mercadopago
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
