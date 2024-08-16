function showSection(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.style.display = section.id === sectionId ? 'block' : 'none';
    });
}

function showForm(formId) {
    const forms = document.querySelectorAll('.form-container');
    forms.forEach(form => {
        form.style.display = form.id === formId ? 'block' : 'none';
    });
}
