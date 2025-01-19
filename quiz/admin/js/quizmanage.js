



document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.querySelector("#add-btn");
    const subjectInput = document.getElementById("subject-name");

    submitButton.onclick=function (e) {
        e.preventDefault(); // Prevent form submission and page reload
        const subjectName = subjectInput.value.trim();

        // Check if the value is being captured
        console.log(subjectName);

        if (subjectName) {
            // Send it to the backend via AJAX
            fetch("php/store_subject.php",{
                method:"POST",
                headers:{
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ name: subjectName }),
            })
                .then((response) =>response.json())
                .then((data) => {
                    console.log(data); //Check the response from the server
                    if (data.success){
                        Swal.fire({
                            icon:'success',
                            title:'Subject added successfully!',
                            timer:1500, // Auto-close after 1.5 seconds
                            didClose:()=>{
                                // Optionally handle any actions after the timer closes
                                console.log("Alert closed automatically");
                            }
                        });fetchSubjects();// Refresh subject list
                    }
                    else {
                        alert("Failed to add subject:" +data.message);
                    }
                })
                .catch((error)=>{
                    console.error("Error:",error);
                });
        } else {
            alert("Please enter a subject name.");
        }
    }


});


//show subjects
// Function to fetch and display subjects
function fetchSubjects(){
    fetch('php/get_subjects.php')//Endpoint to fetch subjects
        .then(response=>response.json())
        .then(data => {
            const subjectList=document.getElementById('subject-list');
            subjectList.innerHTML = ''; // Clear existing content
            
            if (data.success && data.subjects.length>0) {
                data.subjects.forEach(subject=>{
                    const subjectDiv=document.createElement('div');
                    subjectDiv.className='visible-subject';

                    subjectDiv.innerHTML=`
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>${subject.name}</h6>
                            <div>
                                <i class="fa fa-edit mx-2" style="font-size:16px;" onclick="editSubject(${subject.id}, '${subject.name}')"></i>
                                <i class="fa fa-trash mx-2" style="font-size:16px;" onclick="deleteSubject(${subject.id})"></i>
                            </div>
                        </div>
                    `;
                    subjectList.appendChild(subjectDiv);
                });
            } else{ 
                subjectList.innerHTML='<p>No subjects available.</p>';
            }
        })
        .catch(error=>{
            console.error('Error fetching subjects:', error);
            alert('Failed to fetch subjects. Please try again.');
        });
}

function deleteSubject(id) {
    Swal.fire({
        title:'Are you sure?',
        text:'You won\'t be able to revert this!',
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#30287ad1',
        cancelButtonColor:'#d33',
        confirmButtonText:'Yes, delete it!',
    }).then((result)=>{
        if (result.isConfirmed){
            // Perform the delete action
            fetch('php/delete_subjects.php',{
                method:'POST',
                headers:{ 'Content-Type': 'application/x-www-form-urlencoded'},
                body: `id=${id}`, // Sending the subject id in the body
            })
                .then((response) => response.json())
                .then((data)=>{
                    if (data.success){
                        Swal.fire(
                            'Deleted!',
                            'Subject has been deleted.',
                            'success'
                        );
                        fetchSubjects();// Refresh subject list
                    } else{
                        Swal.fire(
                            'Error!',
                            `Failed to delete subject: ${data.message}`,
                            'error'
                        );
                    }
                })
                .catch((error)=>{
                    console.error('Error deleting subject:', error);
                    Swal.fire(
                        'Error!',
                        'Something went wrong while deleting the subject.',
                        'error'
                    );
                });
        }
    });
}


// Fetch subjects when the page loads
document.addEventListener('DOMContentLoaded', fetchSubjects);

document.getElementById("questionCreate").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch("php/insert_question.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Show success message
                Swal.fire("Success", "Question added successfully!", "success");
                // Optionally reset the form
                document.getElementById("questionCreate").reset();
            } else {
                // Show error message
                Swal.fire("Error", data.message || "Failed to add the question.", "error");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            Swal.fire("Error", "An error occurred while adding the question.", "error");
        });
});
