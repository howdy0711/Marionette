
navigator.getUserMedia = ( navigator.getUserMedia ||
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);
var record = document.querySelector('.record');
var stop = document.querySelector('.stop');
var soundClips = document.querySelector('.sound-clips');
var canvas = document.querySelector('.visualizer');
var audioCtx = new (window.AudioContext || webkitAudioContext)();
var canvasCtx = canvas.getContext("2d");
var blobData;
if (navigator.getUserMedia) {
   console.log('getUserMedia supported.');
   navigator.getUserMedia (

      {
         audio: true
      },

      // Success callback
      function(stream) {
      	 var mediaRecorder = new MediaRecorder(stream);

      	 visualize(stream);

      	 record.onclick = function() {
      	 	mediaRecorder.start();
      	 	record.style.background = "#229";
      	 	record.style.color = "#fff";

      	 }

      	 stop.onclick = function() {
      	 	mediaRecorder.stop();
      	 	record.style.background = "";
      	 	record.style.color = "";

      	 }

      	 mediaRecorder.ondataavailable = function(e) {
           console.log("data available");
      	   var clipContainer = document.createElement('article');
           var audio = document.createElement('audio');
           var deleteButton = document.createElement('button');
           var saveButton = document.createElement('button');

           
           clipContainer.classList.add('clip');
           audio.setAttribute('controls', '');
           deleteButton.innerHTML = "Delete";
           saveButton.innerHTML = "Save";

           clipContainer.appendChild(audio);

           clipContainer.appendChild(deleteButton);
           clipContainer.appendChild(saveButton);
           soundClips.appendChild(clipContainer);

           var audioURL = window.URL.createObjectURL(e.data);
           blobData = e.data;
           audio.src = audioURL;

           deleteButton.onclick = function(e) {
             evtTgt = e.target;
             evtTgt.parentNode.parentNode.removeChild(evtTgt.parentNode);
           }
            
           saveButton.onclick = function(e) {
               var date = new Date();
               var soundName = prompt("사운드 이름을 입력해주세요.");
               var fileName = "UV_sound"+date.getMilliseconds();
               console.log(fileName);
              var fd = new FormData();
                 fd.append("name", fileName);
                 fd.append("data", blobData);
                 fd.append("koreanName", soundName);
                 $.ajax({
                     type: "POST",
                     url: "/saveRecoding",
                     data: fd,
                     processData: false,
                     contentType: false
                 }).done(function(data) {
                     console.log("업로드 완료");
                     $("<span></span>")
                     .addClass("item effect userSound voice")
                     .attr("data-id",fileName).text(soundName)
                     .appendTo("#effect")
                     .draggable({
                         helper:"clone",
                         snap:true,
                         snapTolerance:15,
                     });
                     
                     
                 });
               
           }

      	 }
      },

      // Error callback
      function(err) {
         console.log('The following gUM error occured: ' + err);
      }
   );
} else {
   console.log('getUserMedia not supported on your browser!');
}

function visualize(stream) {
  var source = audioCtx.createMediaStreamSource(stream);

  var analyser = audioCtx.createAnalyser();
  analyser.fftSize = 2048;
  var bufferLength = analyser.frequencyBinCount;
  var dataArray = new Uint8Array(bufferLength);

  source.connect(analyser);
  //analyser.connect(audioCtx.destination);
  
  WIDTH = canvas.width
  HEIGHT = canvas.height;

  draw()

  function draw() {

    requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(200, 200, 200)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);

    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(0, 0, 0)';

    canvasCtx.beginPath();

    var sliceWidth = WIDTH * 1.0 / bufferLength;
    var x = 0;


    for(var i = 0; i < bufferLength; i++) {
 
      var v = dataArray[i] / 128.0;
      var y = v * HEIGHT/2;

      if(i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }

    canvasCtx.lineTo(canvas.width, canvas.height/2);
    canvasCtx.stroke();

  }
}

