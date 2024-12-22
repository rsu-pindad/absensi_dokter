<x-layout.dokter>

  <div style="position: relative"
       class="margin">
    <video id="inputVideo"
           onplay="onPlay(this)"
           autoplay
           muted></video>
    <canvas id="overlay" />
  </div>

  @pushOnce('customJs')
    <script src="{{ Storage::disk('public')->url('js/face-api.js') }}"></script>
    <script type="module">
      document.addEventListener("DOMContentLoaded", (event) => {
        console.log("DOM fully loaded and parsed");
        run();
        async function run() {
          // load the models
          const sourceModel = `{!! Storage::disk('public')->url('models/') !!}`
          console.log(sourceModel);

          await faceapi.loadMtcnnModel(sourceModel)
          await faceapi.loadFaceRecognitionModel(sourceModel)

          // try to access users webcam and stream the images
          // to the video element
          const videoEl = document.getElementById('inputVideo')
          navigator.getUserMedia({
              video: {}
            },
            stream => videoEl.srcObject = stream,
            err => console.error(err)
          )
        }
      });
    </script>
  @endPushOnce

</x-layout.dokter>
