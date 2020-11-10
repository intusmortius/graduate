<x-modal>
    <x-slot name="id">
        create
    </x-slot>
    <x-slot name="title">
        Редагування
    </x-slot>
    <x-slot name="class">
        edit-modal
    </x-slot>
    <form id="modalFormEdit" action="" method="POST">
        @csrf
        <div class="edit-modal__field">

            <label for="name">Ім'я</label>
            <input name="name" id="name" type="text" required>
            <span id="nameError"></span>
        </div>
        <div class="edit-modal__field">
            <label for="surname">Прізвище</label>
            <input name="surname" id="surname" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="fathername">По батькові</label>
            <input name="fathername" id="fathername" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="faculty">Факультет</label>
            <input name="faculty" id="faculty" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="specialty">Спеціальність</label>
            <input name="specialty" id="specialty" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="cathedra">Кафедра</label>
            <input name="cathedra" id="cathedra" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="group">Група</label>
            <input name="group" id="group" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="workplace">Місце роботи</label>
            <input name="workplace" id="workplace" type="text" required>
        </div>
        <div class="edit-modal__field">
            <label for="avatar">{{ __("Фото профілю") }}</label>
            <input name="avatar" type="file" accept=".png, .jpeg, .jpg">
        </div>
        <button id="change" class="btn" type="submit">Змінити</button>
        <button class="btn edit__cancel cancelBtn">Відміна</button>
    </form>
    <x-slot name="footer">
    </x-slot>
</x-modal>