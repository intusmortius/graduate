<x-modal>
    <x-slot name="id">
        deleteModal
    </x-slot>
    <x-slot name="title">
        Видалення
    </x-slot>
    <x-slot name="class">
        edit-modal
    </x-slot>
    <div class="edit-modal__delete">
        <p>Ви впевнені що хочете видалити користувача</p>
        <div class="edit-modal__delete-item">
            <button id="deleteBtn" class="btn">Видалити</button>
            <button class="btn edit__cancel cancelBtn">Відміна</button>
        </div>
    </div>
</x-modal>