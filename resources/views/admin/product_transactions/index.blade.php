<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ Auth::user()->hasRole('owner') ? __('Apotek Order') : __('My Transaction') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6  lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 dark:bg-gray-800 p-10 overflow-hidden shadow-sm sm:rounded-lg">

                @forelse ($product_transactions as $transaction )
                <div class="item card flex flex-row justify-between items-center">
                    <a href="{{ route('product_transactions.show', $transaction) }}">
                    <div class="flex flex-row items-center gap-x-3">
                        {{-- <img src="#" alt="" class="w-[50px] h-[50px] object-cover"> --}}
                        <div>
                            <p class="text-base text-slate-500">Total Transaksi</p>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ 'Rp ' . number_format($transaction->total_amount, 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                </a>
                    <div class="hidden md:flex flex-col">
                        <p class="text-base text-slate-500">
                            Date
                        </p>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                           {{ $transaction->created_at->format('d M Y H:i') }}
                        </h3>
                    </div>
                    @if ($transaction->is_paid)
                        <span class="px-3 py-1 rounded-full bg-green-500">
                            <p class="text-white text-sm">SUCCESS</p>
                        </span>
                    @else
                    <span class="px-3 py-1 rounded-full bg-orange-500">
                        <p class="text-white text-sm">PENDING</p>
                    </span>
                    @endif
                    <div class="hidden md:flex flex-row items-center gap-x-2">
                        <a href="{{ route('product_transactions.show', $transaction) }}"class="px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">View Details</a>
                    </div>
                </div>

                <hr class="my-3">
                @empty
                    <p class="text-center text-white font-bold text-gray-500">Belum tersedia transaksi terbaru.</p>
                @endforelse

            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Produk akan dihapus permanen!",
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
