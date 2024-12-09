function validateLogin() {
  const studentId = document.getElementById('student-id').value.trim();
  const password = document.getElementById('password').value.trim();

  if (!studentId || !password) {
      alert('Please enter both Student ID and Password.');
      return false; // Prevent form submission
  }

  if (password.length < 6) {
      alert('Password must be at least 6 characters long.');
      return false; // Prevent form submission
  }

  return true; // Allow form submission
}
