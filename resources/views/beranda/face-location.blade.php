<x-layout.dokter>

  <div class="py-auto flex flex-col justify-center gap-y-4">

    <div class="grid grid-flow-col place-content-stretch gap-x-2 gap-y-4">

      <div class="flex justify-evenly">
        <label class="me-5 inline-flex cursor-pointer items-center">
          <input id="location-switch"
                 type="checkbox"
                 class="peer sr-only">
          <div
               class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-red-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-red-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-red-800">
          </div>
          <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Lokasi</span>
        </label>

        <label class="me-5 inline-flex cursor-pointer items-center">
          <input id="webcam-switch"
                 type="checkbox"
                 class="peer sr-only"
                 disabled>
          <div
               class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-red-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-red-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-red-800">
          </div>
          <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Camera</span>
        </label>
      </div>

      {{-- <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="detection-switch"
               type="checkbox"
               class="peer sr-only"
               readonly>
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-purple-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-purple-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-purple-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Deteksi Wajah</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="box-switch"
               type="checkbox"
               class="peer sr-only"
               readonly>
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-yellow-400 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-yellow-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-yellow-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Box</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="expression-switch"
               type="checkbox"
               class="peer sr-only"
               readonly>
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-teal-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-teal-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-teal-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Mood</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="age-gender-switch"
               type="checkbox"
               class="peer sr-only"
               readonly>
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-orange-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-orange-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-orange-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Perkiraan Umur</span>
      </label> --}}

    </div>

    <div id="waktuAbsen"
         onload="waktuSekarang()"
         class="text-balance self-center text-2xl font-semibold">
    </div>

    <div id="map"
         class="js-element-map relative block h-32 w-full self-center"></div>

    <div class="js-element-webcam relative block h-auto w-full self-center">
      <video id="webcam"
             autoplay
             playsinline
             width="480"
             height="480"
             class="relative rounded-xl bg-gray-200">
      </video>
      <canvas id="canvas"
              class="relative hidden w-full rounded-xl">
      </canvas>
      <canvas id="webcam-container"
              class="relative hidden w-full rounded-xl">
      </canvas>
    </div>

    {{-- <div class="js-element-map block"> --}}
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
               type="text"
               name="radius"
               hidden>
      </form>
    </div>
    {{-- </div> --}}

  </div>

  @pushOnce('customCss')
    <link rel="stylesheet"
          href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/src/notiflix.min.css"
          rel="stylesheet" />
  @endPushOnce

  @pushOnce('customJs')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script src="{{ Storage::disk('public')->url('js/jquery-2.1.1.min.js') }}"></script>
    {{-- <script src="{{ Storage::disk('public')->url('js/face-api.js') }}"></script> --}}
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1.7.14/dist/face-api.min.js"></script>
    <script type="text/javascript"
            src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-aio-3.2.7.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/id.js"></script>
    <script type="module">
      document.addEventListener("DOMContentLoaded", async function(event) {
        console.log("DOM loaded");
        // Notiflix.Block.init({});
        Notiflix.Block.standard('.js-element-webcam', 'Meminta ijin kamera...');
        Notiflix.Block.standard('.js-element-map', 'Meminta ijin lokasi...');
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const webcamElement = document.getElementById('webcam');
        const webcam = new Webcam(webcamElement, 'user');
        let currentStream;
        let displaySize;
        let convas;
        let faceDetection;

        let webcamSwitch = document.getElementById('webcam-switch');
        let detectionSwitch = document.getElementById('detection-switch');
        let boxSwitch = document.getElementById('box-switch');
        let expressionSwitch = document.getElementById('expression-switch');
        let ageSwitch = document.getElementById('age-gender-switch');
        let locationSwitch = document.getElementById('location-switch');
        let waktuAbsen = document.getElementById('waktuAbsen');
        // waktuAbsen.innerText = dayjs().locale('id-ID').format('dddd ,DD-MMMM-YYYY, HH:mm:s');
        // let absenButton = document.getElementById('absenBtn');
        // let akurasiButton = document.getElementById('akurasiBtn');
        // let longitudeButton = document.getElementById('longitudeBtn');
        // let latitudeButton = document.getElementById('latitudeBtn');

        let longInput = document.getElementById('longitudeInput');
        let latInput = document.getElementById('latitudeInput');
        let radiusInput = document.getElementById('radiusInput');

        let watchdogUser;
        let radiusAbsensi = 35;

        function waktuSekarang() {
          waktuAbsen.innerText = dayjs().locale('id-ID').format('HH:mm:s');
          //   waktuAbsen.textContent = dayjs().locale('id-ID').format('HH:mm:s');
          setTimeout(waktuSekarang, 1000);
        }
        waktuSekarang();

        // let headAbsen = document.getElementById('headlineAbsen');
        // let cameraFlip = document.getElementById('cameraFlip');

        webcamElement.addEventListener('loadedmetadata', function() {
          displaySize = {
            width: this.scrollWidth,
            height: this.scrollHeight
          }
        });

        webcamSwitch.addEventListener('change', function() {
          if (this.checked) {
            webcam.start()
              .then(result => {
                cameraStarted();
                webcamElement.style.transform = "";
                console.log("webcam started");
              })
              .catch(err => {
                displayError();
              });
          } else {
            cameraStopped();
            webcam.stop();
            console.log("webcam stopped");
          }
        });

        webcamSwitch.addEventListener('change', function() {
          if (this.checked) {
            toggleContrl("box-switch", true);
            toggleContrl("landmarks-switch", true);
            toggleContrl("expression-switch", true);
            toggleContrl("age-gender-switch", true);
            $("#box-switch").prop('checked', true);
            $(".loading").removeClass('d-none');
            Promise.all([
              faceapi.nets.tinyFaceDetector.loadFromUri(
                `{{ Storage::disk('public')->url('models/tiny_face_detector_model-weights_manifest.json') }}`
              ),
              faceapi.nets.faceLandmark68TinyNet.loadFromUri(
                `{{ Storage::disk('public')->url('models/face_landmark_68_tiny_model-weights_manifest.json') }}`
              ),
              faceapi.nets.faceExpressionNet.loadFromUri(
                `{{ Storage::disk('public')->url('models/face_expression_model-weights_manifest.json') }}`
              ),
              faceapi.nets.ageGenderNet.loadFromUri(
                `{{ Storage::disk('public')->url('models/age_gender_model-weights_manifest.json') }}`
              )
            ]).then(function() {
              createCanvas();
              startDetection();
            })
          } else {
            clearInterval(faceDetection);
            toggleContrl("box-switch", false);
            toggleContrl("landmarks-switch", false);
            toggleContrl("expression-switch", false);
            toggleContrl("age-gender-switch", false);
            if (typeof canvas !== "undefined") {
              setTimeout(function() {
                canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
              }, 1000);
            }
          }
        });

        function createCanvas() {
          if (document.getElementsByTagName("canvas").length == 0) {
            canvas = faceapi.createCanvasFromMedia(webcamElement)
            document.getElementById('webcam-container').append(canvas)
            faceapi.matchDimensions(canvas, displaySize)
          }
        }

        function toggleContrl(id, show) {
          if (show) {
            $("#" + id).prop('disabled', false);
            $("#" + id).parent().removeClass('disabled');
          } else {
            $("#" + id).prop('checked', false).change();
            $("#" + id).prop('disabled', true);
            $("#" + id).parent().addClass('disabled');
          }
        }

        var map = L.map('map').setView([-6.940067507628112, 107.64661628064961], 18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 18,
          minZoom: 18,
          attribution: '© OpenStreetMap'
        }).addTo(map);

        var circle = L.circle([-6.940067507628112, 107.64661628064961], {
          color: 'green',
          fillColor: '#f03',
          fillOpacity: 0.1,
          radius: radiusAbsensi
        }).addTo(map);

        // navigator.geolocation.getCurrentPosition(
        locationSwitch.addEventListener('change', function(e) {
          e.preventDefault();
          Notiflix.Block.remove('.js-element-map', 2000);
          getUserLocation();
        });

        function getUserLocation() {
          webcamSwitch.disabled = false;
          watchdogUser = setInterval(async () => {
            navigator.geolocation.getCurrentPosition(
              function(response) {
                var radius = response.coords.accuracy;
                var lat = response.coords.latitude;
                var lon = response.coords.longitude;
                var userMarker = L.marker({
                  lat,
                  lon
                }).addTo(map);
                map.setView([lat, lon], 18);

                var userLocation = map.getCenter();
                var absenLocation = circle.getLatLng();
                let posisi = map.distance(userLocation, absenLocation);

                // akurasiButton.innerText = `akurasi GPS : ${(radius).toFixed(0)}`;
                // longitudeButton.innerText = `lat : ${(lat).toFixed(4)}`;
                // latitudeButton.innerText = `long : ${(lon).toFixed(4)}`;
                longInput.value = lon;
                latInput.value = lat;
                radiusInput.value = posisi;
                if (posisi < radiusAbsensi) {
                  // Notiflix.Notify.success('Lokasi ditemukan');
                  userMarker.bindPopup("Anda berada di zona absen!").openPopup();
                  // absenButton.disabled = false;
                  // absenButton.classList.remove("cursor-not-allowed");
                } else {
                  // absenButton.disabled = false;
                  // webcam.stop();
                  // Notiflix.Notify.warning('anda diluar zona');
                  userMarker.bindPopup(
                    `Anda berada di luar zona absen, mohon geser. sekitar ${Math.trunc(posisi)} meter dari posisi anda`
                  ).openPopup();
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
            )
          }, 2000);
        }

        function startDetection() {
          faceDetection = setInterval(async () => {
            const detections = await faceapi.detectAllFaces(webcamElement, new faceapi
              .TinyFaceDetectorOptions()).withFaceLandmarks(true).withFaceExpressions().withAgeAndGender()
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            if ($("#box-switch").is(":checked")) {
              faceapi.draw.drawDetections(canvas, resizedDetections)
            }
            if ($("#landmarks-switch").is(":checked")) {
              faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
            }
            if ($("#expression-switch").is(":checked")) {
              faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
            }
            if ($("#age-gender-switch").is(":checked")) {
              resizedDetections.forEach(result => {
                const {
                  age,
                  gender,
                  genderProbability
                } = result
                new faceapi.draw.DrawTextField(
                  [
                    `${Math.round(age, 0)} tahun`,
                    `${gender} (${Math.round(genderProbability)})`
                  ],
                  result.detection.box.bottomRight
                ).draw(canvas)
              })
            }
            if (detections[0].expressions.happy > 0.89) {
              //   alert('Berhasil Absen');
              //   location.href = `{{ route('beranda') }}`;
              //   let picture = webcam.snap();
              //   document.querySelector('#download-photo').href = picture;

              webcam.stop();
              let aInput = document.getElementById('latitudeInput').value;
              let bInput = document.getElementById('longitudeInput').value;
              let cInput = document.getElementById('radiusInput').value;
              console.log(aInput);
              console.log(bInput);
              console.log(cInput);

              fetch(`{{ route('absensi-store') }}`, {
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify({
                  latitudeInput: aInput,
                  longitudeInput: bInput,
                  radiusInput: cInput,
                }),
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json',
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": token,
                },
              }).then((response) => {
                return response.json();
              }).then((res) => {
                if (res.status === 201) {
                  Notiflix.Notify.success('Berhasil Absen');
                  location.href = `{{ route('beranda') }}`;
                }
              }).catch((error) => {
                Notiflix.Notify.failure('error');
              })
            }

            if (!$(".loading").hasClass('d-none')) {
              $(".loading").addClass('d-none')
            }
          }, 300)
        }

        function stopDetection() {
          //   const stopper = () => {
          clearInterval(faceDetection);
          //   };
        }

        function cameraStarted() {
          Notiflix.Block.remove('.js-element-webcam', 2000);
          toggleContrl("detection-switch", true);
          $("#errorMsg").addClass("d-none");
          if (webcam.webcamList.length > 1) {
            // $("#cameraFlip").removeClass('d-none');
          }
        }

        function cameraStopped() {
          Notiflix.Block.standard('.js-element-webcam', 'akses kamera berhenti...');
          Notiflix.Notify.info('Kamera berhenti');
          toggleContrl("detection-switch", false);
          //   $("#errorMsg").addClass("d-none");
          //   $("#cameraFlip").addClass('d-none');
        }

        function displayError(err = '') {
          if (err != '') {
            // $("#errorMsg").html(err);
            Notiflix.Notify.failure(err);
          }
          Notiflix.Notify.info(err);
          //   $("#errorMsg").removeClass("d-none");
        }

        // if ("geolocation" in navigator) {
        //   navigator.geolocation.getCurrentPosition(function(position) {
        //     var lat = position.coords.latitude;
        //     var lon = position.coords.longitude;
        //     // console.log('Latitude: ' + lat + ', Longitude: ' + lon);
        //   }, function(error) {
        //     console.error("Error getting location: ", error);
        //   });
        // } else {
        //   alert("Geolocation is not supported by your browser.");
        // }
      });
    </script>
  @endPushOnce

</x-layout.dokter>
