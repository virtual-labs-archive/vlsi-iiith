

var questions = [
{
    question: "Does the order of input and output ports in the argument of module matter?",
    choices: ["yes", "no", "may matter in some situations", "may not matter in some situations"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 1
}, 
{
    question: "Which of the following loops are supported by verilog?",
    choices: ["if-else loop", "for loop", "while loop", "all of the above"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 3
}, 
{
    question: "What defines the beginning and end of a loop",
    choices: ["begin----end", "curly brackets ()", "None of these", "Both of them"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 0
}, 
{
    question: "What defines high impedance state or floating state in verilog?",
    choices: ["1", "X", "Z", "Both X and Z"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 2
}, 
{
    question: "In the figure A is input and B is output of inverter and C is clock. Tell whether inverter is working synchronously or asynchronously?",
    choices: ["asynchronous", "synchronous", "unpredictable", "sometimes synchronous sometimes asynchronous"],
    source: "Images/1.png",
    correctAnswer: 1
},
{
    question: "In the figure, tell whether inverter is working on positive edge or negative edge of clock?",
    choices: ["negative edge","positive edge","Both on negative and positive edge","Middle of negative and positive edge"],
    source: "Images/2.png",
    correctAnswer: 1
},
{
    question: "In the following figure tell whether reset is synchronous or asynchronous?",
    choices: ["asynchronous","synchronous","unpredictable","sometimes synchronous and sometimes asynchronous"],
    source: "Images/3.png",
    correctAnswer: 0
},
{
    question: "What is the similar system task in verilog as printf in C?",
    choices: ["$monitor","$display","$print","all of these"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 1
},
{
    question: "In the figure given is it a positive edge reset or negative edge reset?",
    choices: ["both positive and negative edge reset","negative edge","positive edge","unpredictable"],
    source: "Images/3.png",
    correctAnswer: 2

},
{
    question: "Can we include one source file in another in verilog?",
    choices: ["no","yes using \`include","yes using \`define","yes by just writing the name of file in another file"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 1
}
];

var currentQuestion = 0;
var correctAnswers = 0;
var quizOver = false;
var choiceArr = [];



function displayCurrentQuestion() 
{

    var question = questions[currentQuestion].question;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;

    $(questionClass).text(question);

    $("<br><img src= " + questions[currentQuestion].source +" alt=\" \">").appendTo(questionClass);

    $(choiceList).find("li").remove();

    var choice;
    for (var i = 0; i < numChoices; i++) 
    {
        choice = questions[currentQuestion].choices[i];
        $("<li><input type=\"radio\" value=" + i + " name=\"dynradio\" />" + choice + "</li>").appendTo(choiceList);
    }
}

function displayResults()
{
    var i = 0;
    var resultClass = $(document).find(".resultContainer");
    var flag;
    $("<h1>Result:</h1>").appendTo(resultClass);
    $("<h2>The highlighted answers are the correct answers.<br>The selected options are the ones you selected.<br></h2>").appendTo(resultClass);
    while(i<questions.length)
    {
        var question = questions[i].question;
        var numChoices = questions[i].choices.length;

        $("<div class=\"question\">" + question + "</div>").appendTo(resultClass);
        $("<br><img src= " + questions[i].source +" alt=\" \">").appendTo(resultClass);


        //$(resultClass).append(question);
        //console.log("In loop");
        $("<br>").appendTo(resultClass);
        var choice;
        flag=0;
        for (var j = 0; j < numChoices; j++)
        {
            choice = questions[i].choices[j];
            if(choiceArr[i]==questions[i].correctAnswer && flag===0 && choiceArr[i]==j)
            {
                $("<li> <input type=\"radio\" checked> <mark>" + choice + "</mark> </li>").appendTo(resultClass);
                flag = 1;
            }
            else
            {
                if(choiceArr[i]==j && flag===0)
                {
                    $("<li> <input type=\"radio\" checked> " + choice + "</li>").appendTo(resultClass);
                }
                else if(questions[i].correctAnswer==j && flag===0)
                {
                    $("<li> <input type=\"radio\"> <mark>" + choice + "</mark> </li>").appendTo(resultClass);
                }
                else
                {
                    $("<li> <input type=\"radio\">" + choice + "</li>").appendTo(resultClass);
                }
            }
        }

        i++;
    }
}

function hideScore() 
{
    $(document).find(".result").hide();
}

function resetQuiz() 
{
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore();
}

function displayScore() 
{
    var results = $(document).find(".quizContainer > .result");
    $(results).text("You scored: " + correctAnswers + " out of: " + questions.length);
    $(results).show();
}

