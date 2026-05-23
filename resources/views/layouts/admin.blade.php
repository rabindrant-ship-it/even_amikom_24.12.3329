<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 bg-gray-800 text-white p-5 min-h-screen shadow-lg">

        <h2 class="text-2xl font-bold mb-8">
            Admin Panel
        </h2>

        <ul class="space-y-3">

            {{-- DASHBOARD --}}
            <li>
                <a href="/admin"
                   class="block px-4 py-2 rounded-lg hover:bg-gray-700 transition">

                    Dashboard

                </a>
            </li>

            {{-- CATEGORY --}}
            <li>
                <a href="/admin/categories"
                   class="block px-4 py-2 rounded-lg hover:bg-gray-700 transition">

                    Kategori

                </a>
            </li>

            {{-- PARTNER --}}
            <li>
                <a href="/admin/partners"
                   class="block px-4 py-2 rounded-lg hover:bg-gray-700 transition">

                    Partner

                </a>
            </li>

            {{-- EVENTS --}}
            <li>
                <a href="/admin/events"
                   class="block px-4 py-2 rounded-lg hover:bg-gray-700 transition">

                    Events

                </a>
            </li>

            {{-- HOME --}}
            <li class="pt-5 border-t border-gray-600">

                <a href="/"
                   class="block px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 transition">

                    Lihat Homepage

                </a>

            </li>

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-6">

        @yield('content')

    </div>

</div>

</body>
</html>
