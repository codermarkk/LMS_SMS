function validateForm() {
  const studentId = document.getElementById('student-id').value.trim();
  const email = document.getElementById('email').value.trim();
  const firstName = document.getElementById('first-name').value.trim();
  const lastName = document.getElementById('last-name').value.trim();
  const password = document.getElementById('password').value.trim();

  if (!studentId || !email || !firstName || !lastName || !password) {
      alert('Please fill out all required fields.');
      return false; // Prevent form submission
  }

  if (password.length < 6) {
      alert('Password must be at least 6 characters long.');
      return false; // Prevent form submission
  }

  return true; // Allow form submission
}