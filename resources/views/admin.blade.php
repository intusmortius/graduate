<x-app>
    <section class="section">
        <div class="container">
            <div class="section-title">
                <div class="section-title__wrapper">
                    <h2>Панель управления</h2>
                    <div class="section-title__line"></div>
                </div>
            </div>
            <div id="filter" class="filter">
                <div class="filter__body">
                    <div id="filter-name" class="filter__name">
                        <span>Фильтр</span>
                        <svg class="toggle" width="20" height="16" viewBox="0 0 20 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.1783 0.5H1.91589C1.1078 0.5 0.633429 1.40883 1.09549 2.07179L9.59631 14.2686C10.0045 14.8542 10.8771 14.8359 11.2604 14.2337L19.022 2.03688C19.4456 1.37115 18.9674 0.5 18.1783 0.5Z"
                                fill="black" stroke="black" />
                        </svg>
                    </div>
                    <div class="filter__options">
                        <div class="filter__option">
                            <label for="">Имя</label>
                            <input type="text">
                        </div>
                        <div class="filter__option">
                            <label for="">Факультет</label>
                            <input type="text">
                        </div>
                        <div class="filter__option">
                            <label for="">Специальность</label>
                            <input type="text">
                        </div>
                        <div class="filter__option">
                            <label for="">Кафедра</label>
                            <input type="text">
                        </div>
                        <div class="filter__option">
                            <label for="">Группа</label>
                            <input type="text">
                        </div>
                        <div class="filter__option">
                            <label for="">Место работы</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-body">

                <div class="admin__title">Пользователи</div>
                <div class="admin__table">
                    @foreach ($users as $user)

                    <div class="admin__row" id="row-{{$user->id}}">
                        <div class="admin__users">
                            <span>{{$loop->iteration}}</span>
                            <a href="{{ route("profile", $user) }}">{{$user->fullname()}}</a>
                        </div>
                        <div class="admin__roles">
                            @forelse ($user->roles as $role)
                            <h4>{{ $role->name }}</h4>
                            @empty
                            <h4>no roles yet</h4>
                            @endforelse
                        </div>
                        <div class="admin__buttons">

                            <button class="admin__buttons-change modalEdit" data-toggle="modal" data-target="#create"
                                data-id="{{$user->id}}">Редактировать</button>
                            @if(auth()->user()->id!==$user->id)
                            <button data-id="{{$user->id}}" data-toggle="modal" data-target="#roleModal"
                                class="admin__buttons-role">Права</button>
                            <button data-id="{{$user->id}}" data-toggle="modal" data-target="#deleteModal"
                                class="admin__buttons-delete">Удалить</button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $users->links("vendor.pagination.default") }}
            </div>
        </div>
    </section>
    <x-modals.create>
    </x-modals.create>
    <x-modals.delete>
    </x-modals.delete>
    <x-modals.role :roles="$roles">
    </x-modals.role>
</x-app>