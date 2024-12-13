<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <!-- Sidebar -->
<aside class="w-64 bg-white shadow-md p-6 flex flex-col">
    <div class="text-2xl font-bold text-blue-600 mb-8">Tamago</div>
    <nav class="space-y-4">
        <a href="#" class="flex items-center space-x-4 text-gray-700 hover:text-blue-500">
            <span class="material-icons">dashboard</span>
            <span>Dashboard</span>
        </a>
        <a href="#" class="flex items-center space-x-4 text-gray-700 hover:text-blue-500">
            <span class="material-icons">location_city</span>
            <span>Explore City</span>
        </a>
        <a href="#" class="flex items-center space-x-4 text-gray-700 hover:text-blue-500">
            <span class="material-icons">notifications</span>
            <span>Notification</span>
        </a>
        <a href="#" class="flex items-center space-x-4 text-gray-700 hover:text-blue-500">
            <span class="material-icons">favorite</span>
            <span>Favorite</span>
        </a>
        <a href="#" class="flex items-center space-x-4 text-gray-700 hover:text-blue-500">
            <span class="material-icons">settings</span>
            <span>Settings</span>
        </a>
    </nav>

    <div class="mt-auto bg-blue-100 text-blue-600 rounded-lg p-4 text-sm">
        <strong>Get 45% Off</strong><br>
        Special Price for you, hotel discount up to 45%.
    </div>

    <button class="mt-6 flex items-center space-x-2 text-gray-700 hover:text-red-500">
        <span class="material-icons">logout</span>
        <span>Log Out</span>
    </button>
</aside>


        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Find hotel to stay 🏨</h1>
                <form class="flex space-x-2">
                    <input type="text" placeholder="Jul 12 - Jul 14" class="border p-2 rounded w-40" />
                    <input type="text" placeholder="Yogyakarta, Indonesia" class="border p-2 rounded flex-grow" />
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
                </form>
            </div>

            <section>
                <h2 class="text-lg font-bold mb-4">Lodging available</h2>
                <div class="grid grid-cols-3 gap-4">
                    <!-- Hotel Card -->
                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Shikara Hotel" class="rounded mb-4">
                        <h3 class="text-lg font-bold">Shikara Hotel</h3>
                        <p class="text-gray-500 text-sm">Jl. Aston No. 72 Yogyakarta</p>
                        <p class="text-blue-600 font-bold mt-2">$42.72 / night</p>
                    </div>

                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Visala Hotel" class="rounded mb-4">
                        <h3 class="text-lg font-bold">Visala Hotel</h3>
                        <p class="text-gray-500 text-sm">Jl. Kebon No. 17 Yogyakarta</p>
                        <p class="text-blue-600 font-bold mt-2">$38.42 / night</p>
                    </div>

                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Hogi Hotel" class="rounded mb-4">
                        <h3 class="text-lg font-bold">Hogi Hotel</h3>
                        <p class="text-gray-500 text-sm">Jl. Gatot No. 12 Yogyakarta</p>
                        <p class="text-blue-600 font-bold mt-2">$40.14 / night</p>
                    </div>
                </div>
            </section>

            <section class="mt-8">
                <h2 class="text-lg font-bold mb-4">Most Popular</h2>
                <div class="grid grid-cols-4 gap-4">
                    <!-- Most Popular Hotel -->
                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Shikara Hotel" class="rounded mb-4">
                        <h3 class="text-lg font-bold">Shikara Hotel</h3>
                        <p class="text-gray-500 text-sm">Jl. Aston No. 72 Yogyakarta</p>
                        <p class="text-blue-600 font-bold mt-2">$42.72 / night</p>
                    </div>

                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Visala Hotel" class="rounded mb-4">
                        <h3 class="text-lg font-bold">Visala Hotel</h3>
                        <p class="text-gray-500 text-sm">Jl. Kebon No. 17 Yogyakarta</p>
                        <p class="text-blue-600 font-bold mt-2">$38.42 / night</p>
                    </div>

                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Hogi Hotel" class="rounded mb-4">
                        <h3 class="text-lg font-bold">Hogi Hotel</h3>
                        <p class="text-gray-500 text-sm">Jl. Gatot No. 12 Yogyakarta</p>
                        <p class="text-blue-600 font-bold mt-2">$40.14 / night</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
