<x-app>
    <section class="section">
        <div class="container">


            <div class="auth auth__verify">
                <h1 class="auth__title">Форма зворотного зв'язку</h1>
                <form method="POST" action="/contact">
                    @csrf
                    <div class="auth__field">
                        <label class="auth__label" for="message">Повідомлення: </label>
                        <textarea class="auth__textarea" type="text" class="form-control luna-message" id="message"
                            placeholder="" name="message" required></textarea>
                    </div>

                    <div class="auth__field">
                        <button type="submit" class="btn btn-primary" value="Send">Надіслати</button>
                    </div>
                </form>
                @if(session('message'))
                <div class='alert alert-success'>
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </section>
</x-app>