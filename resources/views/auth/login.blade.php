<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - DTR System</title>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-950 via-gray-900 to-slate-900 text-gray-800 font-sans transition duration-300">
  <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl shadow-2xl p-1 w-full max-w-md">
    <div class="bg-[#f4f4f4] text-gray-800 rounded-2xl px-10 py-12 shadow-inner">
      <div class="flex flex-col items-center mb-10">
        <img src="pic/logo.png" alt="DTR Logo" class="w-20 h-20 mb-3 rounded-full shadow-lg border border-blue-500/30">
        <h1 class="text-3xl font-extrabold text-blue-700 tracking-wider">DTR SYSTEM</h1>
        <p class="text-sm text-gray-600 font-medium">Daily Time Record Portal</p>
      </div>

      <form action="login" method="post" class="space-y-6"> @csrf
        <div>
          <label for="email" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Email</label>
          <input type="text" id="email" name="email" required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
        </div>

        <div>
          <label for="password" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
        </div>

        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2 text-gray-700 font-medium">
            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 bg-gray-100 border-gray-400">
            Remember me
          </label>
          <a href="#" class="text-blue-600 font-semibold hover:underline">Forgot Password?</a>
        </div>

        <div>
          <input type="submit" value="Login"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold py-3 text-lg rounded-lg transition duration-300 shadow-md"/>
        </div>
      </form>

      <p class="mt-8 text-center text-sm text-gray-600 font-medium">
        Don't have an account?
        <a href='/register' class="text-blue-600 font-bold hover:underline">Sign up now</a>
      </p>
    </div>
  </div>
</body>
</html>
