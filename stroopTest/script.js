// Array of Colors
var COLORS = new Array(
  'red',
  'blue',
  'green',
  'yellow',
  'white',
  'pink',
  'black',
  'orange',
  'purple',
  'gray',
);

// Array of Text to be displayed as options
var TEXT = new Array(
  'RED',
  'BLUE',
  'GREEN',
  'YELLOW',
  'WHITE',
  'PINK',
  'BLACK',
  'ORANGE',
  'PURPLE',
  'GRAY',
);

// DOM Elements
var InstructionsObj = document.getElementById('instructions');
var startBtn = document.getElementById('start-stroop');
var Start = document.getElementById('startstop');
var hanTitle = document.getElementById('han-title');
var hanIntro = document.getElementById('han-intro');
var Content = document.getElementById('content');
var name = document.getElementById('names');
var opt = document.getElementById('options');
var maxCount;
var Send = document.getElementById('endbtn');

// Starts Demo test of 5 questions (1 - 5)
function Demo() {
  maxCount = 5;
  hanTitle.style.display = 'none';
  hanIntro.style.display = 'none';
  InstructionsObj.style.display = 'none';
  startBtn.style.display = 'none';

  Start.style.display = 'flex';
  document.getElementById('timetext').innerHTML =
    '<div class="display-4 mb-2">Demo</div>Contains 5 practice Questions';

  var initial = document.getElementById('time').innerHTML;
  var timeElement = document.getElementById('time');

  var myVar = setInterval(function() {
    myTimer();
  }, 1000);

  // Starts a 5 second Timer
  function myTimer() {
    initial = initial - 1;
    if (timeElement.innerHTML != '0') {
      timeElement.innerHTML = initial;
    } else {
      clearInterval(myVar);
      Questions();
    }
  }
}

// Starts actual test of 25 Questions (6 - 30)
function StartTest() {
  hanTitle.style.display = 'none';
  InstructionsObj.style.display = 'none';
  Start.style.display = 'flex';
  Content.style.display = 'none';
  opt.style.display = 'none';
  initial = 5;
  document.getElementById('time').innerHTML = '5';
  document.getElementById('timetext').innerHTML = 'Test starts in';
  var timeElement = document.getElementById('time');

  var myVar = setInterval(function() {
    myTimer();
  }, 1000);

  function myTimer() {
    initial = initial - 1;
    if (timeElement.innerHTML != '0') {
      timeElement.innerHTML = initial;
    } else {
      clearInterval(myVar);
      Questions();
    }
  }
}

// Initializing result array
// [[1,0],[2,0],...[25,0]]
var Result = [];
for (let i = 1; i <= 25; i++) {
  Result.push([i, 0]);
}

var lastColorIndex = 'red';
var lastTextIndex = 'RED';
var Count = 0;
var Score = 0;
var TotalTime = 0;
// Records time when question is generated
var a;
// Records time when question is answered
var b;

function Questions() {
  document.getElementById('startstop').style.display = 'none';
  document.getElementById('A').style.display = 'block';
  document.getElementById('B').style.display = 'block';
  document.getElementById('C').style.display = 'block';
  document.getElementById('D').style.display = 'block';
  Content.style.display = 'block';
  opt.style.display = 'block';
  var options = new Array(4);
  var hash = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  var i = 0;
  var colorIndex = Math.floor(COLORS.length * Math.random());
  while (colorIndex == lastColorIndex) {
    colorIndex = Math.floor(COLORS.length * Math.random());
  }

  // Do not repeat last text.
  var textIndex = Math.floor(TEXT.length * Math.random());
  while (textIndex == lastTextIndex) {
    textIndex = Math.floor(TEXT.length * Math.random());
  }

  document.getElementById('content').innerHTML = TEXT[textIndex];
  document.getElementById('content').style.color = COLORS[colorIndex];
  AnswerIndex = Math.floor(options.length * Math.random());
  options[AnswerIndex] = TEXT[colorIndex];
  hash[colorIndex] = 1;
  for (i = 0; i < 4; i++) {
    if (i != AnswerIndex) {
      while (true) {
        Index = Math.floor(COLORS.length * Math.random());
        if (hash[Index] != 1) {
          options[i] = TEXT[Index];
          hash[Index] = 1;
          break;
        }
      }
    }
  }
  document.getElementById('A').innerHTML = options[0];
  document.getElementById('B').innerHTML = options[1];
  document.getElementById('C').innerHTML = options[2];
  document.getElementById('D').innerHTML = options[3];

  lastColorIndex = colorIndex;
  lastTextIndex = textIndex;
  // Records time when question is generated
  a = performance.now();
}

function Record(Answer) {
  // Records time when question is answered
  b = performance.now();
  if (maxCount == 30) {
    // Sets the time take to answer question (b-a)
    Result[Count - 5][1] = Math.round(((b - a) / 1000) * 100) / 100;
    TotalTime = TotalTime + (b - a) / 1000;
    if (document.getElementById(Answer).innerHTML == TEXT[lastColorIndex]) {
      Score += 1;
    }
  }
  Count += 1;
  if (Count < maxCount) {
    Questions();
  } else if (Count == 5 && maxCount == 5) {
    maxCount = 30;
    StartTest();
  } else {
    document.getElementById('content').style.display = 'none';
    document.getElementById('options').style.display = 'none';

    // Displays chart
    // https://www.jscharts.com/how-to-use-line-graphs
    var myChart = new JSChart('chartcontainer', 'line');
    myChart.setDataArray(Result);
    myChart.setSize(1300, 500);
    myChart.setTitle('A customized chart');
    myChart.setAxisNameX('Questions');
    myChart.setAxisNameY('Time');
    myChart.setLineWidth(3);
    myChart.setLineColor('#f0ad4e');
    myChart.setAxisWidth(2);
    myChart.setAxisColor('#d9534f');
    myChart.setAxisPaddingBottom(40);
    myChart.setAxisPaddingLeft(50);
    myChart.setAxisPaddingRight(30);
    myChart.setAxisPaddingTop(50);
    myChart.draw();
	
	
	// Displays total score and time
    document.getElementById('score').innerHTML = Score;
    document.getElementById('totaltime').innerHTML = Math.round(TotalTime * 100) / 100;
    document.getElementById('chartcontainer').style.display = 'block';
    document.getElementById('endButton').style.display = 'flex';

    // Sets data into a csv file???

    // var csvContent = 'data:text/csv;charset=utf-8,';
    // //info.forEach(function(infoArray,index){dataString=infoArray.join(",");csvContent+=dataString+"\n";});
    // csvContent += 'Score' + ',' + Score + '\n';
    // csvContent += 'TotalTime' + ',' + Math.round(TotalTime * 100) / 100 + '\n';
    // Result.forEach(function(infoArray, index) {
    //   dataString = infoArray.join(',');
    //   csvContent += dataString + '\n';
    // });

    // var encodedUri = encodeURI(csvContent);
    // var link = document.createElement('a');
    // link.setAttribute('href', encodedUri);
    // link.setAttribute('download', path + '/my_data.csv');
    // link.click();
    // window.open(encodedUri);
  }
}

//sends data to stroopResult.php to insert values of : 
//Total Score , Total Times, Question no. w.r.t to time it took to answer

function send_data(){
	
	var time = Math.round(TotalTime * 100) / 100;
	var t_array = [];
	
	console.log(Score +" , "+ time +" , "+ Result);
	
	for (i=0;i<25;i++){	
		t_array[i] = Result[i][1];
	}
	
	console.log(" , " + t_array);
		
	$.ajax({		

		url : 'stroopResult.php',
		data : {'Score' : Score , 't_array' : t_array , 'time' : time},
		type : 'POST',		
		dataType: 'json',		
		success : function(ouput){
			console.log(output);
		}
	});			
}