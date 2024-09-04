@component('mail::message')

    Hello <b>{{ $user->name }}</b>,

    <p>We understand it happen.</p>
    @component('mail::button', ['url' => url('reset/' . $user->remember_token)])
        Reset Your Password
    @endcomponent

    <p>In case you have any issue recovering your password,please contact us.</p>
    @php
        $getSetting = App\Models\SystemSetting::getSingle();
    @endphp
    Thanks,<br>
    {{ $getSetting->website_name }}
@endcomponent
