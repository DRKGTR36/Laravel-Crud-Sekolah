@component('mail::message')
# Pendaftaran siswa

Selamat Anda telah terdaftar di SMK Cinta Kasih Tzu Chi

@component('mail::button', ['url' => 'http://test'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
