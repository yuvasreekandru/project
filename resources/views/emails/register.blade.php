@component('mail::message')

    Hi <b>{{ $user->name }}</b>,

    <p>You're almost ready to start enjoying the benfits of Ecommerce.</p>

    <p>Simply click the button below to verify email address.</p>

    <p>
        @component('mail::button', ['url' => url('activate/' . base64_encode($user->id))])
            Verify
        @endcomponent
    </p>

    <p>This will verify your email address, and then you'll officially be a part of the Ecommerce</p>

@endcomponent
