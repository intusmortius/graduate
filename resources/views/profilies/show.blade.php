<x-app>
    <section class="section">
        <div class="container">
            <div class="profile">
                <div class="profile__left">
                    <div class="profile__photo">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    @can('update', $user)
                    <a href="{{ route("edit", $user) }}"><button class="btn">Изменить профиль</button></a>
                    @endcan
                </div>
                <div class="profile__right">
                    <h3 class="profile__name">{{ $user->fullname() }}</h3>
                    <p class="profile__description">Факультет: {{ $user->faculty }}</p>
                    <p class="profile__description">Специальность: {{ $user->specialty }}</p>
                    <p class="profile__description">Кафедра: {{ $user->cathedra }}</p>
                    <p class="profile__description">Группа: {{$user->group}}</p>
                    <p class="profile__description">Место работы: {{ $user->workplace }}</p>
                    <h3 class="profile__about-title">О себе </h3>
                    <p class="profile__about">
                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является
                        стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный
                        печатник
                        создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.
                        Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в
                        электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с
                        образцами
                        Lorem Ipsum в 60-х годах и.
                    </p>
                </div>
            </div>

        </div>
    </section>

</x-app>