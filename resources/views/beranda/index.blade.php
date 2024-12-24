<x-layout.dokter title="Halaman Beranda">

  <section id="sectionContent"
           class="mx-auto grid hidden max-w-screen-xl content-center rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8">
    @if ($isAbsen < 1)
      <div class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
        <a href="#">
          @svg('tabler-face-id-error', 'my-4 mx-auto h-56 w-56 text-red-600')
        </a>
        <div class="p-5">
          <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
              Halo {{ Auth::user()->name }},
            </h5>
          </a>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ Illuminate\Support\Carbon::today()->formatLocalized('%A, %d %B %Y') }}
            anda belum Absen !
          </p>
          <a href="{{ route('absensi-fl') }}"
             class="inline-flex items-center rounded-lg bg-lime-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-lime-800 focus:outline-none focus:ring-4 focus:ring-lime-300 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
            Absensi
            @svg('tabler-fingerprint-scan', 'ms-2 h-6 w-6')
          </a>
        </div>
      </div>
    @else
      <div class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
        <a href="#">
          @isset($lastPhoto)
            <img class="rounded-t-lg"
                 src="{{ Storage::disk('public')->url('absensi') . '/' . $lastPhoto . '.png' }}"
                 alt="avatar" />
          @else
            @svg('tabler-face-id', 'my-4 mx-auto h-56 w-56 text-green-600')
          @endisset
        </a>
        <div class="p-5">
          <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
              Halo {{ Auth::user()->name }},
            </h5>
          </a>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Terimakasih sudah mengisi absensi.</p>
          <a href="{{ route('absensi-fl') }}"
             class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Lihat Data Absensi
            @svg('tabler-database-smile', 'ms-2 h-8 w-8')
          </a>
        </div>
      </div>
    @endif
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
