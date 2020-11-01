<x-app>
    <section class="section">
        <div class="container">
            <div class="auth">
                <h2 class="auth__title">Регистрация</h2>
                <p class="auth__greeting">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet placeat iusto nostrum tempora quasi
                    itaque in saepe, voluptatibus, illum error eos quas? Dicta possimus fuga ab expedita voluptates
                    molestiae harum?

                </p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="auth__field">
                        <label class="auth__label" for="name">{{ __('Имя') }}</label>

                        <div>
                            <input class="auth__input @error('email') auth__invalid-input @enderror" id="name"
                                type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="surname">{{ __('Фамилия') }}</label>

                        <div>
                            <input class="auth__input @error('surname') auth__invalid-input @enderror" id="surname"
                                type="text" name="surname" value="{{ old('surname') }}" required autocomplete="surname"
                                autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="fathername">{{ __('Отчество') }}</label>

                        <div>
                            <input class="auth__input @error('fathername') auth__invalid-input @enderror"
                                id="fathername" type="text" name="fathername" value="{{ old('fathername') }}" required
                                autocomplete="fathername" autofocus>

                            @error('fathername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="faculty">{{ __('Факультет') }}</label>

                        <div>
                            <input class="auth__input @error('faculty') auth__invalid-input @enderror" id="faculty"
                                type="text" name="faculty" value="{{ old('faculty') }}" required autocomplete="faculty"
                                autofocus>

                            @error('faculty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="specialty">{{ __('Специальность') }}</label>

                        <div>
                            <input class="auth__input @error('specialty') auth__invalid-input @enderror" id="specialty"
                                type="text" name="specialty" value="{{ old('specialty') }}" required
                                autocomplete="specialty" autofocus>

                            @error('specialty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="cathedra">{{ __('Кафедра') }}</label>

                        <div>
                            <input class="auth__input @error('cathedra') auth__invalid-input @enderror" id="cathedra"
                                type="text" name="cathedra" value="{{ old('cathedra') }}" required
                                autocomplete="cathedra" autofocus>

                            @error('cathedra')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="group">{{ __('Группа') }}</label>

                        <div>
                            <input class="auth__input @error('group') auth__invalid-input @enderror" id="group"
                                type="text" name="group" value="{{ old('group') }}" required autocomplete="group"
                                autofocus>

                            @error('group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="auth__field">
                        <label class="auth__label" for="workplace">{{ __('Место работы') }}</label>

                        <div>
                            <input class="auth__input @error('workplace') auth__invalid-input @enderror" id="workplace"
                                type="text" name="workplace" value="{{ old('workplace') }}" required
                                autocomplete="workplace" autofocus>

                            @error('workplace')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="auth__field">
                        <label class="auth__label" for="email">{{ __('Электронная почта') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="auth__input @error('email') auth__invalid-input @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="auth__field">
                        <label class="auth__label" for="password">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="auth__input @error('email') auth__invalid-input @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="auth__field">
                        <label class="auth__label" for="password-confirm">{{ __('Подтверждение пароля') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="auth__input"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="auth__field">
                        <div>
                            <button type="submit" class="btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app>