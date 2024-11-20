// JavaScript to dynamically update the organization name
const organizationName = "Etoile Royale Educational Center"; // Change this to the desired organization name
document.getElementById('organization-name').textContent = `Welcome to ${organizationName}!`;

// JavaScript for the countdown timer and progress bar
const progressBar = document.getElementById('progress-bar');
const progressBarText = document.getElementById('progress-bar-text');
const progressPercentage = document.getElementById('progress-percentage');
const totalSeconds = 7 * 24 * 60 * 60; // 1 week in seconds

async function getEndTime() {
    try {
        const response = await fetch('countdown-end-time.php'); // Fetch the end time from the PHP script
        const data = await response.json();
        console.log('End time fetched:', data.endTime); // Debug log
        return data.endTime; // Assuming the server returns { endTime: <timestamp> }
    } catch (error) {
        console.error('Error fetching end time:', error); // Debug log
        return null;
    }
}

async function initializeCountdown() {
    let endTime = await getEndTime();

    if (!endTime) {
        // If not, set the end time to 1 week from now and store it on the server
        try {
            const response = await fetch('countdown-end-time.php', { method: 'POST' });
            const data = await response.json();
            endTime = data.endTime;
            console.log('End time set:', endTime); // Debug log
        } catch (error) {
            console.error('Error setting end time:', error); // Debug log
            return;
        }
    }

    function updateProgressBar() {
        const now = new Date().getTime();
        const remainingTime = endTime - now;
        const remainingSeconds = Math.max(0, Math.floor(remainingTime / 1000));

        if (remainingSeconds === 0) {
            window.location.href = 'katech/index.html';
            return;
        }

        const days = Math.floor(remainingSeconds / (3600 * 24));
        const hours = Math.floor((remainingSeconds % (3600 * 24)) / 3600);
        const minutes = Math.floor((remainingSeconds % 3600) / 60);
        const seconds = remainingSeconds % 60;

        const timeString = `${days.toString().padStart(2, '0')}:${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        progressBarText.textContent = timeString;
        const percentage = ((totalSeconds - remainingSeconds) / totalSeconds) * 100;
        progressBar.style.width = `${percentage}%`;
        progressPercentage.textContent = `${Math.floor(percentage)}%`;

        if (remainingSeconds > 0) {
            setTimeout(updateProgressBar, 1000);
        } else {
            // Countdown has ended, you can add any additional actions here
            progressBarText.textContent = "00:00:00:00";
            progressPercentage.textContent = "100%";
        }
    }

    updateProgressBar();
}

initializeCountdown();