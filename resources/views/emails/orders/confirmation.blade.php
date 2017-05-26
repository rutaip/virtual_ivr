@component('mail::message')
# Confirmación de su compra

Este correo es una confirmación de su pago efecutado, para ver más detalles de su compras de click en el siguiente botón
@component('mail::button', ['url' => url('payments')])
Ver Compras
@endcomponent

Fastcode,<br>
{{ config('app.name') }}
@endcomponent
