const deleteForm = document.getElementById("delete-form");
const comicTitle = document.getElementById("videogame-title").innerText;

deleteForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const proceed = confirm(`Do you really wan to delete ${videogameTitle}?`);

    if (proceed) deleteForm.submit();
});
