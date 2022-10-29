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
    <link rel="stylesheet" href="/styles/job.css" />
    <title>Job</title>
</head>

<body>
    <x-navbar />
    <div class="job">
        <div class="container">
            <div class="mainCard">
                <div class="cardTitle">{{ $job->title }} - ({{ $job->type }})</div>
                <div class="cardBody">
                    <div class="btns">
                        <button class="jobTypeBtn">{{ $job->category->name }}</button>
                        <img src="/Imgs/alexApps.png" alt="">
                    </div>
                    <div class="details">
                        <span class="companyName">{{ $job->company->name }}</span>
                        <span class="location">{{ $job->company->location }} </span>
                    </div>
                    <div class="date">Posted {{ $job->created_at->diffForHumans() }}</div>
                    {{-- <div class="openedJobs"><span>80</span> Applicants for 1 Open Position</div> --}}
                </div>
                <a href="/appForm" class="applyBtn">Apply For Job</a>
            </div>
            <div class="jobDetails">
                <div class="cardTitle">Job Details</div>
                <div class="cardBody">
                    <div class="experience">
                        <span>Experience Needed:</span>
                        <span>{{ $job->experience }} Years</span>
                    </div>
                    <div class="salary">
                        <span>Salary:</span>
                        <span>{{ $job->salary }}k Per Month</span>
                    </div>
                    <div class="category">
                        <span>Job Cateogries:</span>
                        <span>{{ $job->category->name }}</span>
                    </div>
                </div>
            </div>
            <div class="jobDesc">
                <div class="cardTitle">Job Description</div>
                <ul class="cardBody">
                    <li>{{ $job->description }}</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="/scripts/main.js"></script>
</body>

</html>
