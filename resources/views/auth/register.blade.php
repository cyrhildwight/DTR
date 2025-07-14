<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - DTR System</title>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900 text-gray-800 font-sans">
  <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-xl shadow-xl p-1 w-full max-w-md">
    <div class="bg-[#f4f4f4] text-gray-800 rounded-xl px-8 py-10 shadow-inner">
      <div class="flex flex-col items-center mb-8">
        <img src="pic/logo.png" alt="DTR Logo" class="w-16 h-16 mb-3 rounded-full shadow-lg border border-blue-500/30">
        <h1 class="text-3xl font-extrabold text-blue-700 tracking-wider">DTR SYSTEM</h1>
        <p class="text-sm text-gray-600 font-medium mt-1">Create your account</p>
      </div>

      <form action="/register" method="post" class="space-y-5">
        @csrf

        <div>
          <label for="name" class="block text-sm font-semibold mb-1 text-gray-700">Name</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required
            class="w-full px-4 py-2.5 border border-gray-400 rounded-md bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
          @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold mb-1 text-gray-700">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required
            class="w-full px-4 py-2.5 border border-gray-400 rounded-md bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password" class="block text-sm font-semibold mb-1 text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2.5 border border-gray-400 rounded-md bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-semibold mb-1 text-gray-700">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
            class="w-full px-4 py-2.5 border border-gray-400 rounded-md bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
        </div>

        <div class="pt-2">
          <input type="submit" value="Register"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold py-3 text-base rounded-md transition duration-300 shadow-md"/>
        </div>
      </form>

      <p class="mt-6 text-center text-sm text-gray-600 font-medium">
        Already have an account?
        <a href="/login" class="text-blue-600 font-bold hover:underline">Login here</a>
      </p>
    </div>
  </div>
</body>
</html>




