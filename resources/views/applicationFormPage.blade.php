<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Library -->
    <script src="https://kit.fontawesome.com/ccfa29ce82.js" crossorigin="anonymous"></script>
    <!-- Global Css -->
    <link rel="stylesheet" href="/styles/global.css">
    <!-- Css -->
    <link rel="stylesheet" href="/styles/appForm.css" />
    <title>Job</title>
</head>

<body>
    <x-navbar />
    <div class="appForm">
        <div class="container">
            <div class="card">
                <div class="cardHeader">
                    <h2>Application Form</h2>
                </div>
                <div class="cardBody">
                    <div class="jobName">
                        Vue.js Front-End Developer - (Remote)
                        <img src="Imgs/alexApps.png" alt="">
                    </div>
                    <div class="message">The hiring team at (JOBNAME) requires you to answer the below questions.</div>
                    
                    <form action="">
                        <div class="experience question">
                            <label>What is your experience with this job?</label>
                            <textarea name="experience" id="" cols="20" rows="10" placeholder="Write your answer here.."></textarea>
                        </div>
                        <div class="military question">
                            <label>Did you finish your military service?</label>
                            <div class="radioBtns">
                                <input type="radio" id="Yes" name="Yes" value="Yes">
                                <label for="Yes">Yes</label><br>
                                <input type="radio" id="No" name="No" value="No">
                                <label for="No">No</label><br>
                            </div>
                        </div>
                        <div class="unique question">
                            <label>Tell us about yourself. What makes you unique from other candidates?</label>
                            <textarea name="unique" id="" cols="20" rows="10" placeholder="Write your answer here.."></textarea>
                        </div>
                        <input type="submit" class="btn" value="Submit Application"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
