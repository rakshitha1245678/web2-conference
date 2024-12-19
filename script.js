document.getElementById('registrationForm').addEventListener('submit', function (event) {
    const sessions = document.querySelectorAll('input[name="sessions[]"]:checked');
    if (sessions.length === 0) {
        alert('Please select at least one session.');
        event.preventDefault();
    }
});
