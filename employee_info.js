// Sample JavaScript for dynamic functionality

// Add event listeners for edit, view, and delete buttons
document.querySelectorAll('.edit').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        alert('Edit Employee: ' + this.parentElement.parentElement.children[2].innerText);
    });
});

document.querySelectorAll('.view').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        alert('View Employee: ' + this.parentElement.parentElement.children[2].innerText);
    });
});

document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const confirmed = confirm('Are you sure you want to delete this employee?');
        if (confirmed) {
            this.parentElement.parentElement.remove();
        }
    });
});
