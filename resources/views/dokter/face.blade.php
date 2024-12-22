<x-layout.dokter>

  <div class="mt-6 flex flex-col justify-center gap-y-4">
    {{-- <div class="relative h-auto w-full">
      <video class="relative z-10 w-full"
             autoplay
             playsinline>
        <source src="#">
      </video>
      <div class="absolute left-0 top-0 z-20 h-full w-full bg-gray-900 opacity-40"></div>
      <div class="align-start absolute left-0 top-0 z-30 flex h-full w-full flex-col justify-end p-8">
        <h3 class="text-pretty text-3xl font-semibold uppercase text-white">Mohon ijinkan akses kamera & akses lokasi
        </h3>
      </div>
    </div> --}}

    <div class="relative h-auto w-full">
      <video id="webcam"
             autoplay
             playsinline
             class="relative w-full rounded-xl bg-gray-200">
      </video>
      <canvas id="canvas"
              class="absolute w-full bg-gray-50">
      </canvas>
      <canvas id="webcam-container"
              class="absolute hidden w-full">
      </canvas>
    </div>

    <div class="mt-4 grid grid-cols-2 place-content-stretch gap-3">
      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="webcam-switch"
               type="checkbox"
               class="peer sr-only">
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-red-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-red-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-red-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Camera</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="cameraFlip"
               type="checkbox"
               class="peer sr-only">
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-green-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-green-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Flip</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="detection-switch"
               type="checkbox"
               class="peer sr-only">
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-purple-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-purple-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-purple-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Deteksi Wajah</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="box-switch"
               type="checkbox"
               class="peer sr-only">
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-yellow-400 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-yellow-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-yellow-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Box</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="expression-switch"
               type="checkbox"
               class="peer sr-only">
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-teal-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-teal-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-teal-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Mood</span>
      </label>

      <label class="me-5 inline-flex cursor-pointer items-center">
        <input id="age-gender-switch"
               type="checkbox"
               class="peer sr-only">
        <div
             class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-orange-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-orange-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-orange-800">
        </div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Perkiraan Umur</span>
      </label>

    </div>

  </div>

  @pushOnce('customJs')
    <script src="{{ Storage::disk('public')->url('js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ Storage::disk('public')->url('js/face-api.js') }}"></script>
    <script type="text/javascript"
            src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
    {{-- <script src="{{ Storage::disk('public')->url('js/faceSystem.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api/dist/face-api.js"></script> --}}
    <script>
      document.addEventListener("DOMContentLoaded", async function(event) {
        console.log("DOM loaded");

        const webcamElement = document.getElementById('webcam');
        const webcam = new Webcam(webcamElement, 'user');
        let currentStream;
        let displaySize;
        let convas;
        let faceDetection;

        $("#webcam-switch").change(function() {
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

        $('#cameraFlip').click(function() {
          webcam.stop();
          webcam.flip();
          webcam.start()
            .then(result => {
              webcamElement.style.transform = "";
            });
        });

        $("#webcam").bind("loadedmetadata", function() {
          displaySize = {
            width: this.scrollWidth,
            height: this.scrollHeight
          }
        });

        $("#detection-switch").change(function() {
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

        function startDetection() {
          faceDetection = setInterval(async () => {
            const detections = await faceapi.detectAllFaces(webcamElement, new faceapi
              .TinyFaceDetectorOptions()).withFaceLandmarks(true).withFaceExpressions().withAgeAndGender()
            console.log(detections);

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

            if (!$(".loading").hasClass('d-none')) {
              $(".loading").addClass('d-none')
            }
          }, 300)
        }

        function cameraStarted() {
          toggleContrl("detection-switch", true);
          $("#errorMsg").addClass("d-none");
          if (webcam.webcamList.length > 1) {
            $("#cameraFlip").removeClass('d-none');
          }
        }

        function cameraStopped() {
          toggleContrl("detection-switch", false);
          $("#errorMsg").addClass("d-none");
          $("#cameraFlip").addClass('d-none');
        }

        function displayError(err = '') {
          if (err != '') {
            $("#errorMsg").html(err);
          }
          $("#errorMsg").removeClass("d-none");
        }

        ///////

        // const webcamElement = document.getElementById('webcam');
        // const canvasElement = document.getElementById('canvas');
        // const snapSoundElement = document.getElementById('snapSound');
        // const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);

        // webcam.start()
        //   .then(result => {
        //     console.log("webcam started");
        //   })
        //   .catch(err => {
        //     console.log(err);
        //   });
        // $('#cameraFlip').click(function() {
        //   webcam.stop();
        //   webcam.flip();
        //   webcam.start();
        // });
        // $('#cameraBtn').click(function() {
        //   webcam.start();
        // });

        // let picture = webcam.snap();
        // document.querySelector('#download-photo').href = picture;
        // face()
        async function face() {
          //   await faceapi.nets.ssdMobilenetv1.loadFromUri(
          //     `{{ Storage::disk('public')->url('models/ssd_mobilenetv1_model-weights_manifest.json') }}`
          //   );
          await faceapi.nets.mtcnn.loadFromUri(
            `{{ Storage::disk('public')->url('models/mtcnn_model-weights_manifest.json') }}`
          );
          //   await faceapi.nets.faceLandmark68Net.loadFromUri(
          //     `{{ Storage::disk('public')->url('models/face_landmark_68_model-weights_manifest.json') }}`
          //   );
          await faceapi.nets.faceRecognitionNet.loadFromUri(
            `{{ Storage::disk('public')->url('models/face_recognition_model-weights_manifest.json') }}`
          );
          //   await faceapi.nets.faceExpressionNet.loadFromUri(
          //     `{{ Storage::disk('public')->url('models/face_expression_model-weights_manifest.json') }}`
          //   );
        }
      });
    </script>
  @endPushOnce

</x-layout.dokter>
