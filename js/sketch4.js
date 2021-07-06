
let soundFile, analyzer, delay;

function preload() {
  soundFormats('ogg', 'mp3');
  soundFile = loadSound('assets/oscc.mp3');
}

function setup() {
   let myCanvas = createCanvas(1920, 500);
    myCanvas.parent('myContainer');


  soundFile.disconnect(); // so we'll only hear delay

  delay = new p5.Delay();
  delay.process(soundFile, 0.22, 0.5, 5300);
  delay.setType('pingPong'); // a stereo effect

  analyzer = new p5.Amplitude();
}

function draw() {
  background(0);

  // get volume reading from the p5.Amplitude analyzer
  let level = analyzer.getLevel();

  // use level to draw a green rectangle
  let levelHeight = map(level, 0, 0.1, 0, height);
  fill(255);
  rect(0, height, width, -levelHeight);

  let filterFreq = map(mouseX, 0, width, 60, 15000);
  filterFreq = constrain(filterFreq, 60, 215000);
  let filterRes = map(mouseY, 0, height, 3, 0.01);
  filterRes = constrain(filterRes, 0.01, 3);
  delay.filter(filterFreq, filterRes);
  let delTime = map(mouseY, 0, width, 0.2, 0.01);
  delTime = constrain(delTime, 0.01, 0.2);
  delay.delayTime(delTime);
}

function mousePressed() {
  soundFile.play();
}
