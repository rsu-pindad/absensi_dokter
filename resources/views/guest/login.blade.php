<x-layout.guest title="Halaman Masuk">
  <div id="loginContent"
       class="mx-auto flex hidden flex-col items-center justify-center px-3 py-4">
    <a href="#"
       class="mb-6 flex items-center text-2xl font-semibold text-gray-900 dark:text-white">
      @svg('tabler-activity', 'w-24 h-24 text-lime-500 animate-pulse hover:text-blue-500 hover:animate-ping hover:rounded-full hover:bg-gray-100 hover:shadow')
    </a>
    <div
         class="w-full rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-800 sm:max-w-md md:mt-0 xl:p-0">
      <div class="space-y-4 p-4">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
          Selamat Datang
        </h1>
        <div class="inline-flex w-full flex-col items-stretch align-middle">
          <button id="googleButton"
                  type="button"
                  class="dark:focus:ring-blue-500/55 text-md upper mb-2 inline-flex items-center rounded-lg bg-blue-500 px-5 py-2.5 text-center font-medium text-white hover:bg-blue-500/90 focus:outline-none focus:ring-4 focus:ring-blue-500/50">
            @svg('tabler-brand-google-filled', 'me-2 h-4 w-4')
            Masuk dengan Google
          </button>
          <div class="inline-flex w-full items-center justify-center">
            <hr class="my-4 h-1 w-64 rounded border-0 bg-gray-200 dark:bg-gray-700">
            <div class="absolute left-1/2 -translate-x-1/2 bg-white px-4 dark:bg-gray-900">
              @svg('tabler-x', 'h-4 w-4 text-gray-700 dark:text-gray-300')
            </div>
          </div>
          <button id="appleButton"
                  type="button"
                  class="dark:focus:ring-gray-800/55 text-md upper mb-2 inline-flex items-center rounded-lg bg-gray-800 px-5 py-2.5 text-center font-medium text-white hover:bg-gray-800/90 focus:outline-none focus:ring-4 focus:ring-gray-800/50">
            @svg('tabler-brand-apple-filled', 'me-2 h-4 w-4')
            Masuk dengan Apple
          </button>
        </div>
      </div>
    </div>
  </div>

  @pushOnce('customCss')
    <link href="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/src/notiflix.min.css"
          rel="stylesheet" />
  @endPushOnce

  @pushOnce('customJs')
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-aio-3.2.7.min.js"></script>
    <script type="module">
      window.addEventListener("load", (event) => {
        console.log("Content Fully loaded");
        Notiflix.Loading.remove(1000);
        document.getElementById('loginContent').classList.remove('hidden');
        let googleBtn = document.getElementById('googleButton');
        googleBtn.addEventListener('click', function(e) {
          e.preventDefault();
          const url = `{{ route('google-redirect') }}`;
          location.href = url;
        });
      });
      document.addEventListener("DOMContentLoaded", (event) => {
        console.log("DOM loaded");
        Notiflix.Loading.standard('Loading...');
      });
    </script>
  @endPushOnce

</x-layout.guest>
