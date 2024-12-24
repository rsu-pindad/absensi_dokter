<x-layout.dokter title="Halaman Beranda">

  <section id="sectionContent"
           class="hidden bg-white px-4 py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto grid max-w-screen-xl content-center rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8">
      @if ($isAbsen < 1)
        @svg('tabler-face-id-error', 'my-4 mx-auto h-56 w-56 text-red-600')
        <div class="me-auto place-self-center">
          <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
            Halo {{ Auth::user()->name }} , hari ini
            {{ Illuminate\Support\Carbon::today()->formatLocalized('%A, %d %B %Y') }}
            anda belum Absen !
          </h1>
          <a href="{{ route('absensi-fl') }}"
             class="inline-flex items-center justify-center rounded-lg bg-primary-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Absen
            @svg('tabler-fingerprint-scan', 'w-8 h-8 ms-2')
          </a>
        </div>
      @else
        @svg('tabler-face-id', 'my-4 mx-auto h-56 w-56 text-green-600')
        <div class="me-auto place-self-center">
          <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
            Halo {{ Auth::user()->name }}, terimakasih sudah mengisi absensi
          </h1>
          <a href="{{ route('absensi-fl') }}"
             class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Lihat Data Absensi
            @svg('tabler-database-smile', 'w-8 h-8 ms-2')
          </a>
        </div>
      @endif
    </div>
  </section>

  @pushOnce('customCss')
    <link href="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/src/notiflix.min.css"
          rel="stylesheet" />
  @endPushOnce

  @pushOnce('customJs')
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-aio-3.2.7.min.js"></script>
    <script type="module">
      document.addEventListener("DOMContentLoaded", async function(event) {
        const loading = loads => {
          Notiflix.Loading.standard('Loading...');
        }
        const removeHidden = async () => {
          await loading();
          document.getElementById('sectionContent').classList.remove('hidden');
        }
        removeHidden();
      });
    </script>
  @endPushOnce

</x-layout.dokter>
