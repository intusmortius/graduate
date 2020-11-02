<x-modal>
    <x-slot name="id">
        deleteModal
    </x-slot>
    <x-slot name="title">
        Delete
    </x-slot>
    <x-slot name="class">
        edit-modal
    </x-slot>
    <div class="edit-modal__delete">
        <p>Вы уверены что хотите удалить пользователя</p>
        <div class="edit-modal__delete-item">
            <button id="deleteBtn" class="btn">Удалить</button>
            <button class="btn edit__cancel cancelBtn">Отмена</button>
        </div>
    </div>
</x-modal>