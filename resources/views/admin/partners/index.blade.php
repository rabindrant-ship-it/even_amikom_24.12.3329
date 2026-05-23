@extends('layouts.admin')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Manajemen Partner
        </h1>

        {{-- SEARCH --}}
        <form action="{{ route('admin.partners.index') }}"
              method="GET"
              class="flex gap-2">

            <input type="text"
                   name="search"
                   value="{{ $search ?? '' }}"
                   placeholder="Cari partner..."
                   class="border border-gray-300 rounded-lg px-4 py-2">

            <button type="submit"
                    class="bg-gray-800 text-white px-4 py-2 rounded-lg">

                Search

            </button>

        </form>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
            {{ session('success') }}
        </div>

    @endif

    {{-- FORM TAMBAH --}}
    <div class="bg-white shadow-lg rounded-lg p-5 mb-6">

        <h2 class="text-xl font-semibold mb-4">
            Tambah Partner
        </h2>

        <form action="{{ route('admin.partners.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-1 md:grid-cols-3 gap-3">

            @csrf

            <input type="text"
                   name="name"
                   placeholder="Nama Partner"
                   class="border border-gray-300 rounded-lg px-4 py-2">

            <input type="file"
                   name="logo_url"
                   class="border border-gray-300 rounded-lg px-4 py-2">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                Tambah

            </button>

        </form>

    </div>

    {{-- TABLE --}}
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3">No</th>
                    <th class="p-3">Logo</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($partners as $i => $partner)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $i + 1 }}
                    </td>

                    <td class="p-3">

                        <img src="{{ asset('storage/' . $partner->logo_url) }}"
                             class="w-20 h-20 object-cover rounded-lg">

                    </td>

                    <td class="p-3">
                        {{ $partner->name }}
                    </td>

                    <td class="p-3">

                        <div class="flex justify-center gap-2">

                            {{-- EDIT --}}
                            <button
                                onclick="openModal(
                                    {{ $partner->id }},
                                    '{{ $partner->name }}'
                                )"
                                class="bg-yellow-400 text-white px-3 py-1 rounded">

                                Edit

                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin hapus?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center p-5 text-gray-500">

                        Data partner kosong

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- MODAL EDIT --}}
<div id="editModal"
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

        <h2 class="text-2xl font-bold mb-4">
            Edit Partner
        </h2>

        <form id="editForm"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <input type="text"
                   id="editName"
                   name="name"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

            <input type="file"
                   name="logo_url"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

            <div class="flex justify-end gap-2">

                <button type="button"
                        onclick="closeModal()"
                        class="bg-gray-400 text-white px-4 py-2 rounded">

                    Batal

                </button>

                <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

<script>

    function openModal(id, name)
    {
        document.getElementById('editModal')
                .classList.remove('hidden');

        document.getElementById('editName').value = name;

        document.getElementById('editForm').action =
            `/admin/partners/${id}`;
    }

    function closeModal()
    {
        document.getElementById('editModal')
                .classList.add('hidden');
    }

</script>

@endsection
