<x-app>
    <section class="section">
        <div class="container">
            <div class="auth">
                <h2 class="auth__title">Вход</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="auth__field">
                        <label class="auth__label" for="email">{{ __('Email') }}</label>

                        <div>
                            <input class="auth__input @error('email') auth__invalid-input @enderror" id="email"
                                type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                            <span class="auth__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="auth__field">
                        <label class="auth__label" for="password">{{ __('Password') }}</label>

                        <div>
                            <input class="auth__input @error('password') auth__invalid-input @enderror" id="password"
                                type="password" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="auth__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="auth__field">
                        <div>
                            <div>
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="auth__label2" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="auth__field">
                        <div class="auth__button-wrapper">
                            <button class="auth__btn btn" type="submit">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="auth__forget" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app>