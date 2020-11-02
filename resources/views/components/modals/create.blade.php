<x-modal>
    <x-slot name="id">
        create
    </x-slot>
    <x-slot name="title">
        Edit
    </x-slot>
    <x-slot name="class">
        edit-modal
    </x-slot>
    <form id="modalFormEdit" action="" method="POST">
        @csrf
        <div class="edit-modal__field">

            <label for="name">Имя</label>
            <input name="name" id="name" type="text" required>
            <span id="nameError"></span>
        </div>
        <div class="edit-modal__field">
            <label for="surname">Фамилия</label>
            <input name="surname" id="surname" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="fathername">Отчество</label>
            <input name="fathername" id="fathername" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="faculty">Факультет</label>
            <input name="faculty" id="faculty" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="specialty">Специальность</label>
            <input name="specialty" id="specialty" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="cathedra">Кафедра</label>
            <input name="cathedra" id="cathedra" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="group">Группа</label>
            <input name="group" id="group" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="workplace">Место работы</label>
            <input name="workplace" id="workplace" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="avatar">{{ __("Фото профиля") }}</label>
            <input name="avatar" type="file" accept=".png, .jpeg, .jpg">
        </div>
        <button id="change" class="btn" type="submit">Изменить</button>
        <button class="btn edit__cancel cancelBtn">Отмена</button>
    </form>
    <x-slot name="footer">
    </x-slot>
</x-modal>