<x-layout.dokter>
  <div class="flex flex-col gap-y-6">
    <div class="grid grid-cols-3">
      <button id="akurasiBtn"
              type="button"
              disabled
              class="mb-2 me-2 inline-flex cursor-not-allowed items-center rounded-lg border border-blue-200 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-blue-700 dark:bg-blue-800 dark:text-white dark:hover:bg-blue-700 dark:focus:ring-blue-600">
        @svg('tabler-map-2', 'me-2 h-6 w-6')
      </button>
      <button id="latitudeBtn"
              type="button"
              disabled
              class="mb-2 me-2 inline-flex cursor-not-allowed items-center rounded-lg border border-blue-200 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-blue-700 dark:bg-blue-800 dark:text-white dark:hover:bg-blue-700 dark:focus:ring-blue-600">
        @svg('tabler-map-2', 'me-2 h-6 w-6')
      </button>
      <button id="longitudeBtn"
              type="button"
              disabled
              class="mb-2 me-2 inline-flex cursor-not-allowed items-center rounded-lg border border-blue-200 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-blue-700 dark:bg-blue-800 dark:text-white dark:hover:bg-blue-700 dark:focus:ring-blue-600">
        @svg('tabler-map-2', 'me-2 h-6 w-6')
      </button>
    </div>
    <div id="map"
         class="relative h-96 w-full"></div>

    <div class="items-center justify-center align-middle">
      <form action="{{ route('absensi-store') }}"
            method="POST">
        @csrf
        <input id="longitudeInput"
               type="text"
               name="longitude"
               hidden>
        <input id="latitudeInput"
               type="text"
               name="latitude"
               hidden>
        <input id="radiusInput"
               type="number"
               name="radius"
               hidden>

        <button id="absenBtn"
                type="submit"
                disabled
                class="mb-2 me-2 inline-flex cursor-not-allowed items-center rounded-lg border border-blue-200 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-blue-700 dark:bg-blue-800 dark:text-white dark:hover:bg-blue-700 dark:focus:ring-blue-600">
          @svg('tabler-map-2', 'me-2 h-6 w-6')
          Absen
        </button>
      </form>
    </div>
    {{-- </div> --}}
    {{-- </div> --}}
  </div>

  @pushOnce('customCss')
    <link rel="stylesheet"
          href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin="" />
  @endPushOnce

  @pushOnce('customJs')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script type="module">
      document.addEventListener("DOMContentLoaded", (event) => {
        console.log("DOM fully loaded and parsed");
        let absenButton = document.getElementById('absenBtn');
        let akurasiButton = document.getElementById('akurasiBtn');
        let longitudeButton = document.getElementById('longitudeBtn');
        let latitudeButton = document.getElementById('latitudeBtn');

        let longInput = document.getElementById('longitudeInput');
        let latInput = document.getElementById('latitudeInput');
        let radiusInput = document.getElementById('radiusInput');

        var map = L.map('map').setView([-6.940067507628112, 107.64661628064961], 18);
        // const currentLong = '107.64661628064961';
        // const currentLat = '-6.940067507628112';
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 18,
          minZoom: 18,
          attribution: '© OpenStreetMap'
        }).addTo(map);

        var circle = L.circle([-6.940067507628112, 107.64661628064961], {
          // var circle = L.circle([-6.940, 107.647], {
          color: 'green',
          fillColor: '#f03',
          fillOpacity: 0.1,
          radius: 20
        }).addTo(map);

        // var polygon = L.polygon([
        //   [107.646, -0.08],
        //   [107.646, -0.06],
        //   [107.646, -0.047]
        // ]).addTo(map);

        map.locate({
          setView: true,
          maxZoom: 18,
          minZoon: 18
        });

        navigator.geolocation.getCurrentPosition(
          function(response) {
            console.log(response);
            var radius = response.coords.accuracy;
            var lat = response.coords.latitude;
            var lon = response.coords.longitude;
            console.log('Latitude: ' + lat + ', Longitude: ' + lon);
            var userLocation = map.getCenter({
              lat,
              lon
            });
            var absenLocation = circle.getLatLng();
            let posisi = map.distance(userLocation, absenLocation);
            var userMarker = L.marker({
              lat,
              lon
            }).addTo(map);

            akurasiButton.innerText = `akurasi : ${radius}`;
            longitudeButton.innerText = `lat : ${(lat).toFixed(4)}`;
            latitudeButton.innerText = `long : ${(lon).toFixed(4)}`;

            map.setView([lat, lon], 18);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            L.marker([lat, lon]).addTo(map)
            //   .bindPopup("You are here")
            //   .openPopup();
            if (posisi < 20) {
              userMarker.bindPopup("Anda berada di zona absen!").openPopup();
              absenButton.disabled = false;
              absenButton.classList.remove("cursor-not-allowed");
              longInput.value = lon;
              latInput.value = lat;
              radiusInput.value = posisi;
            } else {
              userMarker.bindPopup(
                  `Anda berada di luar zona absen, mohon geser. sekitar ${Math.trunc(posisi)} meter dari posisi anda`
                )
                .openPopup();
            }

          },
          function(error) {
            console.error(error);
            alert(error);
          }, {
            timeout: 1000 * 60,
            enableHighAccuracy: true,
            maximumAge: 1000 * 60 * 60
          }
        );

        // function onLocationFound(e) {
        //   console.log(e);

        //   var radius = e.accuracy;
        //   var userLocation = map.getCenter(e.latlng);
        //   var absenLocation = circle.getLatLng();
        //   let posisi = map.distance(userLocation, absenLocation);

        //   // console.log(posisi);
        //   var userMarker = L.marker(e.latlng).addTo(map);
        //   //   console.log(userMarker.toGeoJSON());
        //   //   console.log(circle.toGeoJSON());

        //   akurasiButton.innerText = `akurasi : ${radius}`;
        //   longitudeButton.innerText = `lat : ${(e.latitude).toFixed(4)}`;
        //   latitudeButton.innerText = `long : ${(e.longitude).toFixed(4)}`;
        //   if (posisi < 20) {
        //     userMarker.bindPopup("Anda berada di zona absen!").openPopup();
        //     absenButton.disabled = false;
        //     absenButton.classList.remove("cursor-not-allowed");
        //     longInput.value = e.longitude;
        //     latInput.value = e.latitude;
        //     radiusInput.value = posisi;
        //   } else {
        //     userMarker.bindPopup(
        //         `Anda berada di luar zona absen, mohon geser. sekitar ${Math.trunc(posisi)} meter dari posisi anda`
        //       )
        //       .openPopup();
        //   }

        //   // .bindPopup("Anda berada dalam jarak " + radius + " meter dari titik lokasi").openPopup();
        //   //   L.circle(e.latlng, radius).addTo(map);

        //   map.stopLocate();
        // }

        // map.on('locationfound', onLocationFound);

        // function onLocationError(e) {
        //   alert('Lokasi gagal ditemukan');
        // }
        // map.on('locationerror', onLocationError);
      });
    </script>
  @endPushOnce

</x-layout.dokter>
