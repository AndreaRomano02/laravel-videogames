const forms = document.querySelectorAll(".delete-form");

forms.forEach(form => {

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const title = form.dataset.title;
        const proceed = confirm(`Do you really want to delete "${title}"?`);

        if (proceed) form.submit();
    });
})
