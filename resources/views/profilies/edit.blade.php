<x-app>
    <section class="section">
        <div class="container">
            <div class="section-title">
                <div class="section-title__wrapper">
                    <h2>Списки</h2>
                    <div class="section-title__line"></div>
                </div>
            </div>

            <div class="block-body edit">
                <form method="POST" action="{{ route("profile-update", $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="edit__field">
                        <label for="name">{{ __("Ім'я") }}</label>
                        <input name="name" type="text" value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="surname">{{ __("Прізвище") }}</label>
                        <input name="surname" type="text" value="{{ $user->surname }}">
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="fathername">{{ __("По батькові") }}</label>
                        <input name="fathername" type="text" value="{{ $user->fathername }}">
                        @error('fathername')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="faculty">{{ __("Факультет") }}</label>
                        <input name="faculty" type="text" value="{{ $user->faculty }}">
                        @error('faculty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="cathedra">{{ __("Кафедра") }}</label>
                        <input name="cathedra" type="text" value="{{ $user->cathedra }}">
                        @error('cathedra')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="specialty">{{ __("Спеціальність") }}</label>
                        <input name="specialty" type="text" value="{{ $user->specialty }}">
                        @error('specialty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="group">{{ __("Група") }}</label>
                        <input name="group" type="text" value="{{ $user->group }}">
                        @error('group')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="workplace">{{ __("Місце роботи") }}</label>
                        <input name="workplace" type="text" value="{{ $user->workplace }}">
                        @error('workplace')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field">
                        <label for="avatar">{{ __("Фото профілю") }}</label>
                        <input name="avatar" type="file" accept=".png, .jpeg, .jpg">
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="edit__field edit__text">
                        <label for="about">{{ __("Про себе") }}</label>
                        <textarea name="about" id="about" cols="30" rows="10" value="{{ $user->about }}"></textarea>
                    </div>
                    <div class="edit__buttons">
                        <button class="edit__change" type="submit" name="submit">Змінити</button>
                        <a href="{{ back() }}"><button class="edit__cancel">Відміна</button></a>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-app>