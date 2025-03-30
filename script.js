document.addEventListener("DOMContentLoaded", function () {
    // Validate Add Contact Form
    const addForm = document.querySelector('form[action="add_contact.php"]');
    if (addForm) {
        addForm.addEventListener("submit", function (event) {
            const name = addForm.querySelector('input[name="name"]').value.trim();
            const email = addForm.querySelector('input[name="email"]').value.trim();
            const phone = addForm.querySelector('input[name="phone"]').value.trim();

            if (!name || !email || !phone) {
                alert("All fields are required!");
                event.preventDefault();
                return;
            }
            if (!validateEmail(email)) {
                alert("Please enter a valid email address.");
                event.preventDefault();
                return;
            }
            if (!validatePhone(phone)) {
                alert("Phone number must contain only digits.");
                event.preventDefault();
                return;
            }
        });
    }

    // Confirm deletion for Delete Links
    const deleteLinks = document.querySelectorAll(".delete-link");
    deleteLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            if (!confirm("Are you sure you want to delete this contact?")) {
                event.preventDefault();
            }
        });
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validatePhone(phone) {
        return /^\d+$/.test(phone);
    }
});
