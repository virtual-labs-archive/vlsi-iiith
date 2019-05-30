$(document).ready(function () 
{

    // Display the first question
    displayCurrentQuestion();
    $(this).find(".quizMessage").hide();
    $(this).find(".resultButton").hide();

    // On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () 
    {
        /*global quizOver*/
        if (!quizOver) 
        {

            var value = $("input[type='radio']:checked").val();

            if (value == null) 
            {
                $(document).find(".quizMessage").text("Please select an answer");
                $(document).find(".quizMessage").show();
            } 
            else 
            {
                /*global value*/
                choiceArr.push(value);
                // TODO: Remove any message
                $(document).find(".quizMessage").hide();

                /*global currentQuestion*/
                if (value == questions[currentQuestion].correctAnswer) 
                {
                    /*global correctAnswers*/
                    correctAnswers++;
                }

                currentQuestion++;      // Since we have already displayed the first question on DOM ready
                /*global questions*/
                if (currentQuestion < questions.length) 
                {
                    /*global displayCurrentQuestion*/
                    displayCurrentQuestion();
                } 
                else 
                {
                    /*global displayScore*/
                    displayScore();
                    $(document).find(".resultButton").show();
                    // Change the text in the next button to ask if user wants to play again
                    $(document).find(".nextButton").text("Try Again?");
                    /*global quizOver*/
                    quizOver = true;
                }
            }
        } 
        else 
        {   
            // quiz is over and clicked the next button (basically the 'Try Again?')
            document.location.reload(false);
        }
    });

    /*global displayResults */
    $(this).find(".resultButton").one("click", function()
    {
        displayResults(); 

    });

});