<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FollowCar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center h-screen">
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-red-500 mb-6">FollowCar</h2>
        
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-blue-400 font-semibold mb-2">Correo Electrónico</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-red-500">
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-blue-400 font-semibold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600 focus:outline-none focus:border-red-500">
            </div>
            
            <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">Iniciar Sesión</button>
        </form>
        
        <p class="text-gray-400 text-sm text-center mt-4">¿No tienes cuenta? <a href="#" class="text-blue-400 hover:underline">Regístrate</a></p>
    </div>
</body>
</html>
