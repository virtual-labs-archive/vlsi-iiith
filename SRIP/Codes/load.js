$(document).ready(function () 
{

    // Display the first question
    displayCurrentQuestion();
    $(this).find(".quizMessage").hide();

    // On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () 
    {
        if (!quizOver) 
        {

            value = $("input[type='radio']:checked").val();

            if (value == undefined) 
            {
                $(document).find(".quizMessage").text("Please select an answer");
                $(document).find(".quizMessage").show();
            } 
            else 
            {
                // TODO: Remove any message -> not sure if this is efficient to call this each time....
                $(document).find(".quizMessage").hide();

                if (value == questions[currentQuestion].correctAnswer) 
                {
                    correctAnswers++;
                }

                currentQuestion++; // Since we have already displayed the first question on DOM ready
                if (currentQuestion < questions.length) 
                {
                    displayCurrentQuestion();
                } 
                else 
                {
                    displayScore();
                    
                    // Change the text in the next button to ask if user wants to play again
                    $(document).find(".nextButton").text("Try Again?");
                    quizOver = true;
                }
            }
        } 
        else 
        {   
            // quiz is over and clicked the next button (which now displays 'Try Again?'
            quizOver = false;
            $(document).find(".nextButton").text("Next Question");
            resetQuiz();
            displayCurrentQuestion();
            hideScore();
        }
    });

});