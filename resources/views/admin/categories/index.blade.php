<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">Add Category</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6  lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 dark:bg-gray-800 p-10 overflow-hidden shadow-sm sm:rounded-lg">

                @forelse ($categories as $category )
                <div class="item card flex flex-row justify-between items-center">
                    <img src="{{ Storage::url($category->icon) }}" alt="" class="w-[50px] h-[50px] object-cover">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $category->name }}
                    </h3>
                    <div class="flex flex-row items-center gap-x-2">

                        <a href="{{ route('admin.categories.edit', $category) }}" class="px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">Edit</a>
                        <form method="POST" id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="px-5 py-3 rounded-full text-white bg-red-500 hover:bg-red-600" onclick="confirmDelete({{ $category->id }})">Delete</button>
                        </form>
                    </div>
                </div>

                @empty

                @endforelse

            </div>
        </div>
    </div>
    <script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Kategori akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>
</x-app-layout>
