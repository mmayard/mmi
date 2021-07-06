let mic, fft;


function setup() {
    let myCanvas = createCanvas(1920, 500);
    myCanvas.parent('myContainer');
   //var myCanvas = createCanvas(winWidth, winHeight);
  
  noFill();

  mic = new p5.AudioIn();
  mic.start();
  fft = new p5.FFT();
  fft.setInput(mic);
}

function draw() {
  background(0, 0, 255);

  let spectrum = fft.analyze();

  beginShape();
  for (i = 0; i < spectrum.length; i++) {
    vertex(i, map(spectrum[i], 0, 100, height, 150));
  }
  endShape();
}
