// Sample data for the table
const students = [
    { id: 1, name: "Atibali Saiyed", class: 10, section: "A" },
    { id: 2, name: "Rahul Tripathi", class: 10, section: "A" },
    { id: 3, name: "Ashok Patel", class: 10, section: "A" },
    { id: 5, name: "Shah Hetal", class: 11, section: "Commerce A" },
    { id: 6, name: "Samir Shaikh", class: 11, section: "Commerce A" },
    { id: 7, name: "Sofia Fernandis", class: 10, section: "A" },
    { id: 8, name: "Pratibha Dave", class: 11, section: "Science A" },
    { id: 9, name: "Moin Ansari", class: 10, section: "A" },
    { id: 10, name: "Akhay Jain", class: 10, section: "A" },
    { id: 11, name: "Khushi Singh", class: 11, section: "Science A" },
    { id: 13, name: "Manoj Limbachya", class: 10, section: "A" }
];

// Function to render the student data
function renderStudentTable() {
    const tableBody = document.getElementById('studentTableBody');
    students.forEach((student, index) => {
        const row = `
            <tr>
                <td>${index + 1}</td>
                <td>${student.id}</td>
                <td>${student.name}</td>
                <td>${student.class}</td>
                <td>${student.section}</td>
                <td class="action-links">
                    <a href="#" onclick="editStudent(${student.id})">Edit</a> ||
                    <a href="Student_detail.html" onclick="viewStudent(${student.id})">View</a> ||
                    <a href="#" onclick="deleteStudent(${student.id})">Delete</a>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

// Placeholder functions for Edit, View, and Delete
function editStudent(id) {
    // alert('Edit student with ID: ' + id);
}

function viewStudent(id) {
    // alert('View student with ID: ' + id);
}

function deleteStudent(id) {
    if (confirm('Are you sure you want to delete this student?')) {
        // alert('Deleted student with ID: ' + id);
    }
}

// Initialize the table on page load
window.onload = function() {
    renderStudentTable();
};
