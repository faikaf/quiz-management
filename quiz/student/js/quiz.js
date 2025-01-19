const container = document.querySelector(".container");
const quizContainer = document.querySelector(".quiz-container");
const questionContainer = document.querySelector(".question-container");
const questionText = document.querySelector(".question-text");
const optionsContainer = document.querySelector(".options-container");
const nextButton = document.querySelector(".next-but");
 


questions;
let timer;
let timeLeft =10; // Set the timer duration (in seconds) for each question
let currentQuestion=0;
let score=0;
let questionCount = 1;


const showquestion = () => {
    if (currentQuestion < questions.length) {
        const current = questions[currentQuestion]; // Get the current question object
        console.log("Current Question:", current);

        if (current) {
            // Display the question text
            if (questionText) {
                questionText.textContent = `Question ${questionCount}: ${current.question}`; // Add question count before the question text
            } else {
                console.error('questionText element not found!');
            }

            // Clear previous options
            optionsContainer.innerHTML = '';

            // Loop through options and display them
            const options = [current.option1, current.option2, current.option3, current.option4];
            console.log("Options: ", options); // Log options to check if they are correct
            const labels = ['a)', 'b)', 'c)', 'd)']; // Option labels

            options.forEach((option, index) => {
                const button = document.createElement('button');
                button.textContent = `${labels[index]} ${option}`;
                button.classList.add('option-btn');
                button.onclick = () => handleAnswer(button, option, current.answer); // Pass the button, selected option, and correct answer
                optionsContainer.appendChild(button);
            });

            // Show "Next" button if not on the last question
            nextButton.style.display = (currentQuestion < questions.length - 1) ? 'block' : 'none';
              // Reset the timer for the new question
              timeLeft = 10; // Reset timer to 30 seconds (or your desired duration)
              timerDisplay.textContent = `Time left: ${timeLeft} seconds`;
               
              // Start the countdown timer
              clearInterval(timer); // Clear any previous timer
              timer = setInterval(updateTimer, 1000); // Update timer every second
        } else {
            console.error('Current question is undefined!');
        }
    } else {
        showResults();
    }
};
document.addEventListener('DOMContentLoaded', function() {
    // Your JavaScript code here
});

// Function to handle the answer selected by the user
const handleAnswer = (button, selectedOption, correctAnswer) => {
    // Check if selected answer is correct
    if (selectedOption === correctAnswer) {
        button.style.backgroundColor = 'green'; // Change the background color to green for correct answer
        button.style.color = 'white'; // Optional: change text color to white for better contrast
        score++; // Increment score for correct answer
    } else {
        button.style.backgroundColor = 'red'; // Change the background color to red for wrong answer
        button.style.color = 'white'; // Optional: change text color to white for better contrast
    }

    // Disable all options after selecting an answer
    const allButtons = optionsContainer.querySelectorAll('button');
    allButtons.forEach(btn => btn.disabled=true);

   // Check if it's the last question
   if (currentQuestion === questions.length - 1) {
    console.log("This is the last question."); // Debug log
    clearInterval(timer); // Stop the timer
    console.log("Timer cleared."); // Debug log

    setTimeout(() => {
        console.log("Triggering showResults..."); // Debug log
        showResults(); // Call the results function
    }, 2000); // Delay to allow feedback
} else {
    console.log("Not the last question, showing Next button."); // Debug log
    nextButton.style.display = 'block'; // Show "Next" button
}

};
const timerDisplay = document.querySelector(".timer");

// Function to update the timer every second
const updateTimer = () => {
    timeLeft--;
    timerDisplay.textContent = `Time left: ${timeLeft} seconds`; // Update the display

    if (timeLeft <= 0) {
        // If time runs out, stop the timer and automatically move to the next question
        clearInterval(timer);
        handleTimeOut();
    }
};

// Function to handle timeout when time runs out
const handleTimeOut=()=>{
    const current =questions[currentQuestion];
    Swal.fire({
        title: "Time's up!",
        text: `The correct answer was: ${current.answer}`,
        icon: 'error',
        showConfirmButton: false,  // Hide the confirm button
        timer: 2000,  // 2 seconds before automatically moving to the next question
        timerProgressBar: true  // Show progress bar while the timer counts down
    }).then(() => {
        nextQuestion(); // Automatically move to the next question
    });
};


// Function to show results after the quiz is completed
const showResults = () => {
    // Display the SweetAlert with the score
    Swal.fire({
        title: `Quiz completed!`,
        text: `Your score is: ${score}/${questions.length}`,
        icon: 'success',
        showConfirmButton: false,  // Hide the confirm button
        timer: 3000,  // 3 seconds before auto-closing
        timerProgressBar: true  // Show the progress bar
    }).then(() => {
        // After 3 seconds, redirect to the homepage
        if (questions.length >= 10) {
            window.location.href = 'student-home-page.php';  // Adjust the redirect URL as needed
        } else {
            //alert('The quiz ended before reaching 10 questions.');
            window.location.href = 'student-home-page.php';  // Adjust the redirect URL as needed
        }
    });
};


// Function to move to the next question
const nextQuestion=() => {
    clearInterval(timer); // Clear any previous timer
    if (currentQuestion < questions.length - 1) {
        currentQuestion++; // Move to the next question
        questionCount++;// Increment the question count
        showquestion(); // Render the new question
    } else {
        showResults(); // If no more questions, show the results
    }
};

// Attach the nextQuestion function to the Next button
nextButton.onclick = nextQuestion;
// Display the first question on page load
document.addEventListener('DOMContentLoaded', function() {
    showquestion(); // Show the first question when the page loads
});