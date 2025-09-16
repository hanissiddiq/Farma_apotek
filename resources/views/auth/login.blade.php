<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Parma</title>
  <link rel="shortcut icon" href="{{ asset('assets/svgs/logo-mark.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

  <div class="flex flex-col items-center px-6 py-10 min-h-dvh">
    <img src="{{ asset('assets/svgs/logo.svg') }}" class="mb-[53px]" alt="Logo Parma">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"
      class="mx-auto max-w-[345px] w-full p-6 bg-white rounded-3xl mt-auto"
      id="deliveryForm">
      @csrf

      <div class="flex flex-col gap-5">
        <p class="text-[22px] font-bold">
          Sign In
        </p>

        <!-- Email Address -->
        <div class="flex flex-col gap-2.5">
          <label for="email" class="text-base font-semibold">Email Address</label>
          <input type="email" name="email" id="email"
            style="background-image: url('{{ asset('assets/svgs/ic-email.svg') }}');"
            class="form-input bg-no-repeat bg-left pl-10"
            value="{{ old('email') }}" required autofocus autocomplete="username"
            placeholder="Your email address">
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-2.5">
          <label for="password" class="text-base font-semibold">Password</label>
          <input type="password" name="password" id="password"
            style="background-image: url('{{ asset('assets/svgs/ic-lock.svg') }}');"
            class="form-input bg-no-repeat bg-left pl-10"
            required autocomplete="current-password"
            placeholder="Protect your password">
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center gap-2">
          <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
            name="remember">
          <label for="remember_me" class="text-sm text-gray-600">
            {{ __('Remember me') }}
          </label>
        </div>

        <!-- Forgot Password + Submit -->
        <div class="flex items-center justify-between mt-4">
          @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
              href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
            </a>
          @endif

          <button type="submit"
            class="inline-flex text-white font-bold text-base bg-primary rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
            {{ __('Log in') }}
          </button>
        </div>
      </div>
    </form>

    <a href="{{ route('register') }}" class="font-semibold text-base mt-[30px] underline">
      Create New Account
    </a>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
</body>

</html>
