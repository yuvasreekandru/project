@component('mail::message')

    Hi <b>{{ $user->name }}</b>,
    @php
        $getSetting = App\Models\SystemSetting::getSingle();
    @endphp
    <p>You're almost ready to start enjoying the benfits of {{ $getSetting->website_name }}.</p>

    <p>Simply click the button below to verify email address.</p>

    <p>
        @component('mail::button', ['url' => url('activate/' . base64_encode($user->id))])
            Verify
        @endcomponent
    </p>

    <p>This will verify your email address, and then you'll officially be a part of the {{ $getSetting->website_name }}</p>
Thanks,<br>
{{ $getSetting->website_name }}
@endcomponent
