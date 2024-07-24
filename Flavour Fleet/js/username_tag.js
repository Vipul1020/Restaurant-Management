document.addEventListener('DOMContentLoaded', function() {
    fetch('getUsername.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.username) {
                document.getElementById('username').textContent = data.username;
            } else {
                console.error('Username not found in session');
            }
        })
        .catch(error => console.error('Error fetching username:', error));
});
