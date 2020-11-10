@props(["roles"=>null])

<x-modal>
    <x-slot name="id">
        roleModal
    </x-slot>
    <x-slot name="title">
        Ролі
    </x-slot>
    <x-slot name="class">
        edit-modal
    </x-slot>
    <div class="edit-modal__role">
        <h3>Призначити роль користувачеві</h3>
        <form id="role-form" action="">
            @csrf
            <select name="name" id="role-name" multiple required>
                @forelse($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @empty
                <span>There are no roles yet !</span>
                @endforelse
            </select>
            <button class="btn" type="submit" name="submit">Призначити</button>
        </form>
    </div>
</x-modal>