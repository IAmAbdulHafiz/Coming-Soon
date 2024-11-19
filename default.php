<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <link rel="icon" type="image/x-icon" href="img/nss_logo.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap">
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background-color: #002366; /* Dark Blue */
            font-family: 'DM Sans', sans-serif;
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .background-image {
            position: absolute;
            bottom: 10%;
            right: 10%;
            width: 400px; /* Adjust the width as needed */
            height: 400px;
            background: url('/img/nss_brand.png') no-repeat center center/cover;
            opacity: 0.6; /* Adjust the opacity as needed */
            z-index: 0;
        }
        .content {
            position: relative;
            z-index: 2;
        }
        h1 {
            font-size: 48px;
            font-weight: 700;
            margin: 8px 0;
            animation: fadeInDown 1s ease-in-out;
        }
        p {
            font-size: 18px;
            margin: 16px 0;
            animation: fadeInUp 1s ease-in-out;
        }
        .link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            color: #002366; /* Dark Blue */
            text-decoration: none;
            background: #FFD700; /* Gold */
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            animation: fadeInUp 1s ease-in-out;
        }
        .ic-launch {
            margin-left: 10.5px;
            width: 21px;
            height: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #FFD700; /* Gold */
            animation: fadeInUp 1s ease-in-out;
        }
        .progress-container {
            width: 80%;
            background-color: #ddd;
            border-radius: 25px;
            overflow: hidden;
            margin: 20px auto;
            animation: fadeInUp 1s ease-in-out;
        }
        .progress-bar {
            height: 30px;
            background-color: #FFD700; /* Gold */
            width: 0;
            border-radius: 25px;
            text-align: center;
            line-height: 30px;
            color: #002366; /* Dark Blue */
            font-weight: bold;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="overlay"></div>
    <div class="content">
        <h1 id="coming-soon-title">Coming Soon</h1>
        <h1 id="organization-name">Welcome to [Organization Name]!</h1>
        <p>We are currently working on something amazing. Stay tuned!</p>
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar">18:00:00</div>
        </div>
        <div class="link-container">
            <a class="link" href="https://nebatech.com" rel="nofollow" target="_blank">
                Nebatech Software Solution Ltd
                <svg class="ic-launch" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3333 15.8333H4.66667V4.16667H10.5V2.5H4.66667C3.74167 2.5 3 3.25 3 4.16667V15.8333C3 16.75 3.74167 17.5 4.66667 17.5H16.3333C17.25 17.5 18 16.75 18 15.8333V10H16.3333V15.8333ZM12.1667 2.5V4.16667H15.1583L6.96667 12.3583L8.14167 13.5333L16.3333 5.34167V8.33333H18V2.5H12.1667Z" fill="#002366"/>
                </svg>
            </a>
        </div>
        <div class="footer">
            Contact us: +233249241156 / 0206789600 or <a href="mailto:info@nebatech.com" style="color: #FFD700;">info@nebatech.com</a>
        </div>
    </div>
    <script>
        // JavaScript to dynamically update the organization name
        const organizationName = "Etoile Royale Educational Center"; // Change this to the desired organization name
        document.getElementById('organization-name').textContent = `Welcome to ${organizationName}!`;

        // JavaScript for the countdown timer and progress bar
        const progressBar = document.getElementById('progress-bar');
        const totalSeconds = 18 * 60 * 60; // 18 hours in seconds
        let remainingSeconds = totalSeconds;

        function updateProgressBar() {
            const hours = Math.floor(remainingSeconds / 3600);
            const minutes = Math.floor((remainingSeconds % 3600) / 60);
            const seconds = remainingSeconds % 60;

            progressBar.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            progressBar.style.width = `${((totalSeconds - remainingSeconds) / totalSeconds) * 100}%`;

            if (remainingSeconds > 0) {
                remainingSeconds--;
                setTimeout(updateProgressBar, 1000);
            }
        }

        updateProgressBar();
    </script>
</body>
</html>