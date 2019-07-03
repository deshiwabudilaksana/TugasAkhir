@component('mail::message')
# Halo {{$nama_seller}}

Terima kasih telah mendaftar di Gifuto.id. **Untuk proses verifikasi produk**, harap mengisi formulir melalui button berikut

@component('mail::button', ['url' => 'http://bit.ly/merchantgifuto'])
Lengkapi Formulir
@endcomponent

Regards,<br>
{{ config('app.name') }} Team
@endcomponent

