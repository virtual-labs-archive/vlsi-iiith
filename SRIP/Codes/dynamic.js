

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
    correctAnswer: 2
}, 
{
    question: "What defines high impedance state or floating state in verilog?",
    choices: ["1", "X", "Z", "Both X and Z"],
    source: "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",
    correctAnswer: 2
}, 
{
    question: "In the following figure A is input and B is output of inverter and C is clock. Tell whether inverter is working synchronously or asynchronously?",
    choices: ["asynchronous", "synchronous", "unpredictable", "sometimes synchronous sometimes asynchronous"],
    source: "Images/1.png",
    correctAnswer: 1
}];

var currentQuestion = 0;
var correctAnswers = 0;
var quizOver = false;



function displayCurrentQuestion() 
{

    var question = questions[currentQuestion].question;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;

    $(questionClass).text(question);

    $('<img src= ' + questions[currentQuestion].source +' alt=" ">').appendTo(questionClass);

    $(choiceList).find("li").remove();

    var choice;
    for (i = 0; i < numChoices; i++) 
    {
        choice = questions[currentQuestion].choices[i];
        $('<li><input type="radio" value=' + i + ' name="dynradio" />' + choice + '</li>').appendTo(choiceList);
    }
}

function resetQuiz() 
{
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore();
}

function displayScore() 
{
    $(document).find(".quizContainer > .result").text("You scored: " + correctAnswers + " out of: " + questions.length);
    $(document).find(".quizContainer > .result").show();
}

function hideScore() 
{
    $(document).find(".result").hide();
}