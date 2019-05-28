$(document).ready(function () 
{

    // Display the first question
    displayCurrentQuestion();
    $(this).find(".quizMessage").hide();
    $(this).find(".resultButton").hide();

    // On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () 
    {
        if (!quizOver) 
        {

            value = $("input[type='radio']:checked").val();
            choiceArr.push(value);

            if (value == undefined) 
            {
                $(document).find(".quizMessage").text("Please select an answer");
                $(document).find(".quizMessage").show();
            } 
            else 
            {
                // TODO: Remove any message
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
                    $(document).find(".resultButton").show();
                    // Change the text in the next button to ask if user wants to play again
                    $(document).find(".nextButton").text("Try Again?");
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

    $(this).find(".resultButton").one("click", function()
    {
        displayResults(); 

    });

});