<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>@yield('title')</title>
</head>

<body class="bg-gray-100">
  <!-- Navbar -->
  <nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between">
      <a href="/" class="text-lg font-semibold">My Blog</a>
      <ul class="flex space-x-4">
        <li><a href="/" class="hover:text-gray-300">Home</a></li>
        <li><a href="/about" class="hover:text-gray-300">About</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto py-8">
    @yield('main')
  </main>
</body>

</html>
