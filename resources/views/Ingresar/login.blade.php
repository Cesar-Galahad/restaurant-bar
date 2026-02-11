@extends('/layouts/app')

@section('titulo','Iniciar Sesión')

@section('contenido')

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          La Lonja   
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Inicia sesión en tu cuenta
              </h1>

              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tu correo electrónico</label>
                      <input type="email" name="email" id="email"
                      class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5
                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                      placeholder="name@company.com" required="">
                  </div>

                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                      <input type="password" name="password" id="password" placeholder="••••••••"
                      class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5
                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                      required="">
                  </div>

                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" type="checkbox"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50
                            dark:bg-gray-700 dark:border-gray-600">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Acuérdate de mí</label>
                          </div>
                      </div>
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                        Olvidaste tu contraseña?
                      </a>
                  </div>

                  <button type="submit"
                  class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 font-medium
                  rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700">
                      Iniciar Sesión
                  </button>

                  <div class="flex items-center my-4">
                      <div class="flex-grow border-t border-gray-300"></div>
                      <span class="mx-4 text-sm text-gray-500 dark:text-gray-400">o continúa con</span>
                      <div class="flex-grow border-t border-gray-300"></div>
                  </div>

                  <a href="{{ route('google.login') }}"
                    class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-lg
                    px-5 py-2.5 text-sm font-medium text-gray-700 bg-white hover:bg-gray-100
                    dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">

                        <svg class="w-5 h-5" viewBox="0 0 48 48">
                            <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3C33.7 32.6 29.3 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3 0 5.7 1.1 7.8 3l5.7-5.7C33.7 6.1 29.1 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.3-.4-3.5z"/>
                            <path fill="#FF3D00" d="M6.3 14.7l6.6 4.8C14.5 16 18.9 12 24 12c3 0 5.7 1.1 7.8 3l5.7-5.7C33.7 6.1 29.1 4 24 4c-7.7 0-14.3 4.4-17.7 10.7z"/>
                            <path fill="#4CAF50" d="M24 44c5.2 0 9.9-2 13.4-5.2l-6.2-5.1C29.2 35.1 26.7 36 24 36c-5.3 0-9.8-3.4-11.3-8l-6.5 5C9.5 39.4 16.2 44 24 44z"/>
                            <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-1.1 3-3.2 5.4-6.1 6.9l6.2 5.1C34.9 38.6 44 32 44 24c0-1.3-.1-2.3-.4-3.5z"/>
                        </svg>

                        Iniciar sesión con Google
                    </a>

                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      No tienes una cuenta?
                      <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                        Regístrate
                      </a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>

@endsection
