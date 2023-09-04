const deleteForm = document.getElementById("delete-form");
const videogameTitle = document.getElementById("videogame-title").innerText;

deleteForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const proceed = confirm(`Do you really want to delete ${videogameTitle}?`);

    if (proceed) deleteForm.submit();
});
