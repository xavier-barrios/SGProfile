window.onload = function() {
    modal = document.getElementById("myModal");
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function openModal() {
    // let modal = document.getElementById("myModal");
    modal.style.display = "block";
}

function closeModal() {
    // let modal = document.getElementById("myModal");
    modal.style.display = "none";
}