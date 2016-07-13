//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
  //The orange highlighted code may need to be changed
   //you will need to match these question types(Radio/DropDown)
   //and names (q1, q2, ...) to the ones in your quiz
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
  // numCorrect += checkQuestionRadio( document.quiz.q10);

  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
//   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 9 questions correct.\n" +
     "The correct answers are highlighted." 

}
