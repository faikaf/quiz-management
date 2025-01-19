
// Add this line to trigger on page load
window.onload = function () {
    loadhome();
}

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('mainContent').classList.toggle('shifted');
}
// Add this line to trigger on home page load
function loadhome() {
    const frame = document.getElementById('contentFrame');
    frame.src = 'student-home-page.php';
    frame.style.display = 'block';
    toggleSidebar();
}
// Add this line to trigger on quiz management page load
function profile() {
    const frame = document.getElementById('contentFrame');
    frame.src = 'profile.php';
    frame.style.display = 'block';
    toggleSidebar();
}

// Add this line to trigger on feedback page load
function loadfeedback() {
    const frame = document.getElementById('contentFrame');
    frame.src = 'feedback.php';
    frame.style.display = 'block';
    toggleSidebar();
}


//logout function

document.addEventListener('DOMContentLoaded', function() {
    var logoutBtn = document.querySelector('#logout-btn');
    logoutBtn.onclick = function() {
        swal({
            title:"Are you sure you want to logout?",
            icon:"warning",
            buttons:true,
            dangerMode:true,
        }).then((willLogout)=>{
            if (willLogout){
                swal({
                    title:"Logging out...",
                    icon:"info",
                    buttons:false, // Disable buttons
                    timer:2000,   // Show for 2 seconds
                }).then(()=>{
                    window.location.href = "../Slogin.php"; // Redirect to the login page
                });
            } else {
                swal("Your session is safe!", {
                    icon: "error",
                });
            }
        });
    };
});





