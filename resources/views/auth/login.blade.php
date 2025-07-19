<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - DTR System</title>

  <style>
    .glow-border {
      position: relative;
      border-radius: 1rem;
      z-index: 0;
      overflow: hidden;
    }
    .glow-border::before {
      content: "";
      position: absolute;
      inset: 0;
      padding: 2px;
      background: linear-gradient(
        90deg,
        transparent,
        #3b82f6,
        #06b6d4,
        #9333ea,
        transparent
      );
      border-radius: 1rem;
      animation: glow-run 4s linear infinite;
      z-index: -1;
      mask: linear-gradient(#0000 0 0) content-box, linear-gradient(#000 0 0);
      -webkit-mask: linear-gradient(#0000 0 0) content-box, linear-gradient(#000 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
    }
    @keyframes glow-run {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .eye-toggle {
      position: absolute;
      top: 50%;
      right: 1rem;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6b7280;
    }

    .dark .eye-toggle {
      color: #d1d5db;
    }

    .eye-toggle svg {
      width: 1.25rem;
      height: 1.25rem;
    }
  </style>
  
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white font-sans transition duration-300 px-4">

  <div class="glow-border w-full max-w-md sm:max-w-lg md:max-w-md">
    <div class="bg-slate-100/90 text-gray-900 rounded-2xl px-6 sm:px-10 py-10 sm:py-12 shadow-2xl">
      <div class="flex flex-col items-center mb-10 text-center">
        <img src="pic/logo.png" alt="DTR Logo"
             class="w-20 h-20 sm:w-24 sm:h-24 mb-4 rounded-full logo-glow" />
        <h1 class="text-2xl sm:text-3xl font-extrabold text-blue-600 tracking-widest drop-shadow-[0_2px_4px_rgba(59,130,246,0.7)]">
          DTR SYSTEM
        </h1>
        <p class="text-sm text-gray-600 font-medium">Daily Time Record Portal</p>
      </div>
      <form action="login" method="post" class="space-y-6">
        @csrf
        <div>
          <label for="email" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">
            Email
          </label>
          <input type="text" id="email" name="email" required
            class="w-full px-4 py-2 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm"/>
        </div>

        <div class="relative">
          <label for="password" class="block text-sm font-semibold uppercase tracking-wide mb-1 text-gray-700">
            Password
          </label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 pr-10 border border-gray-400 rounded-lg bg-white text-gray-800 placeholder-gray-500 text-base font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm" />
          <span class="eye-toggle" onclick="togglePassword('password', this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                     -1.274 4.057-5.065 7-9.542 7
                     -4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </span>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm gap-3 sm:gap-0">
          <label class="flex items-center gap-2 text-gray-700 font-medium">
            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 bg-white border-gray-400">
            Remember me
          </label>
          <a href="#" class="text-blue-600 font-semibold hover:underline">Forgot Password?</a>
        </div>

        <div>
          <input type="submit" value="Login"
            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 text-lg rounded-lg transition duration-300 shadow-md"/>
        </div>
      </form>
      <p class="mt-8 text-center text-sm text-gray-600 font-medium">
        Don't have an account?
        <a href='/register' class="text-blue-600 font-bold hover:underline">Sign up now</a>
      </p>

    </div>
  </div>

  <script>
    function togglePassword(fieldId, btn) {
      const input = document.getElementById(fieldId);
      const svg = btn.querySelector('svg');
      const eyeOpen = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
             -1.274 4.057-5.065 7-9.542 7
             -4.477 0-8.268-2.943-9.542-7z" />`;
      const eyeOff = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7
            a10.049 10.049 0 013.362-4.568M9.878 9.878
            A3 3 0 0114.121 14.12M3 3l18 18" />`;

      if (input.type === "password") {
        input.type = "text";
        svg.innerHTML = eyeOff;
      } else {
        input.type = "password";
        svg.innerHTML = eyeOpen;
      }
    }
  </script>
</body>
</html>
