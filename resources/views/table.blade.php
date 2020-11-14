<x-app>
    <section class="section">
        <div class="container">
            <div class="section-title">
                <div class="section-title__wrapper">
                    <h2>Списки</h2>
                    <div class="section-title__line"></div>
                </div>
            </div>
            <div id="filter" class="filter">
                <div class="filter__body">
                    <div id="filter-name" class="filter__name">
                        <span>Пошук</span>
                        <svg class="toggle" width="20" height="16" viewBox="0 0 20 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.1783 0.5H1.91589C1.1078 0.5 0.633429 1.40883 1.09549 2.07179L9.59631 14.2686C10.0045 14.8542 10.8771 14.8359 11.2604 14.2337L19.022 2.03688C19.4456 1.37115 18.9674 0.5 18.1783 0.5Z"
                                fill="black" stroke="black" />
                        </svg>
                    </div>
                    <form class="filter__options" method="GET" action="/search">
                        @csrf
                        <div class="filter__option">
                            <input name="name_search" type="text" value="{{ $search }}">
                        </div>
                        <div class="filter__search">
                            <button class="btn" type="submit">Шукати</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="block-body table">
                <table class="table__body">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ПІБ</th>
                            <th scope="col">Факультет</th>
                            <th scope="col">Спеціальність</th>
                            <th scope="col">Кафедра</th>
                            <th scope="col">Група</th>
                            <th scope="col">Місце роботи</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        @if(!$user->hasRoles("admin"))
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{ route("profile", $user) }}">{{$user->fullname()}}</a></td>
                            <td>{{ $user->faculty }}</td>
                            <td>{{ $user->specialty }}</td>
                            <td>{{ $user->cathedra }}</td>
                            <td>{{ $user->group }}</td>
                            <td>{{ $user->workplace }}</td>
                        </tr>
                        @endif
                        @empty
                        <th scope="row"></th>
                        <td>empty</td>
                        <td>empty</td>
                        <td>empty</td>
                        <td>empty</td>
                        <td>empty</td>
                        <td>empty</td>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links("vendor.pagination.default") }}
            </div>

        </div>
    </section>

</x-app>