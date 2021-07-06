let osc, fft;

function setup() {
    let myCanvas = createCanvas(1920, 500);
    myCanvas.parent('myContainer');

  osc = new p5.TriOsc(); // set frequency and type
  osc.amp(0.9);

  fft = new p5.FFT();
  osc.start();
}

function draw() {
  background(0);

  let waveform = fft.waveform(); // analyze the waveform
  beginShape();
  strokeWeight(10);
  for (let i = 0; i < waveform.length; i++) {
    let x = map(i, 0, waveform.length, 0, width);
    let y = map(waveform[i], -1, 1, height, 0);
    vertex(x, y);
  }
  endShape();

  // change oscillator frequency based on mouseX
  let freq = map(mouseX, 0, width, 40, 880);
  osc.freq(freq);

  let amp = map(mouseY, 0, height, 1, 0.01);
  osc.amp(amp);
}