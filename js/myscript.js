// JavaScript to dynamically update the organization name
const organizationName = "Northern Light International School";
document.getElementById('organization-name').textContent = `Welcome to ${organizationName}!`;

// JavaScript for the countdown timer and progress bar
const progressBar = document.getElementById('progress-bar');
const progressBarText = document.getElementById('progress-bar-text');
const progressPercentage = document.getElementById('progress-percentage');
const totalSeconds = 8 * 24 * 60 * 60; // 8 days in seconds

async function getEndTime() {
    try {
        const response = await fetch('countdown-end-time.php'); // Fetch the end time from the server
        const data = await response.json();
        console.log('Fetched end time:', data.endTime); // Debug log
        return data.endTime; // Assuming server returns { endTime: <timestamp> }
    } catch (error) {
        console.error('Error fetching end time:', error);
        return null;
    }
}

async function initializeCountdown() {
    let endTime = await getEndTime();

    if (!endTime) {
        // If end time isn't set, initialize it to 8 days from now
        try {
            const response = await fetch('countdown-end-time.php', { method: 'POST' });
            const data = await response.json();
            endTime = data.endTime;
            console.log('Initialized end time:', endTime); // Debug log
        } catch (error) {
            console.error('Error initializing end time:', error);
            return;
        }
    }

    function updateProgressBar() {
        const now = new Date().getTime();
        const remainingTime = Math.max(0, endTime - now); // Ensure remaining time is non-negative
        const remainingSeconds = Math.floor(remainingTime / 1000);

        const elapsedSeconds = totalSeconds - remainingSeconds;
        const percentage = Math.min(100, Math.max(0, (elapsedSeconds / totalSeconds) * 100)); // Keep percentage in range

        if (remainingSeconds === 0) {
            window.location.href = 'nlis/index.html'; // Redirect when countdown ends
            return;
        }

        const days = Math.floor(remainingSeconds / (3600 * 24));
        const hours = Math.floor((remainingSeconds % (3600 * 24)) / 3600);
        const minutes = Math.floor((remainingSeconds % 3600) / 60);
        const seconds = remainingSeconds % 60;

        const timeString = `${days.toString().padStart(2, '0')}:${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        progressBarText.textContent = timeString;
        progressBar.style.width = `${percentage}%`;
        progressPercentage.textContent = `${Math.floor(percentage)}%`;

        setTimeout(updateProgressBar, 1000);
    }

    updateProgressBar();
}

initializeCountdown();
