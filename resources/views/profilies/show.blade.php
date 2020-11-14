<x-app>
    <section class="section">
        <div class="container">
            <div class="profile">
                <div class="profile__left">
                    <div class="profile__photo">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    @can('update', $user)
                    <a href="{{ route("edit", $user) }}"><button class="btn">Змінити профіль</button></a>
                    @endcan
                </div>
                <div class="profile__right">
                    <h3 class="profile__name">{{ $user->fullname() }}</h3>
                    <p class="profile__description">Факультет: {{ $user->faculty }}</p>
                    <p class="profile__description">Спеціальність: {{ $user->specialty }}</p>
                    <p class="profile__description">Кафедра: {{ $user->cathedra }}</p>
                    <p class="profile__description">Група: {{$user->group}}</p>
                    <p class="profile__description">Місце роботи: {{ $user->workplace }}</p>
                    @if ($user->about)
                    <h3 class="profile__about-title">Про себе </h3>
                    <p class="profile__about">
                        {{$user->about}}
                    </p>
                    @endif

                </div>
            </div>

        </div>
    </section>

</x-app>