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
    <link rel="stylesheet" href="/styles/jobs.css" />
    <title>Jobs</title>
</head>

<body>
    <x-navbar />
    <!-- Start Subheader -->
    <div class="subheader">
        <div class="container">
            <h2>{{ $searched }} Jobs</h2>
        </div>
    </div>
    <!-- End Subheader -->

    <!-- Jobs Section  -->
    @if (count($jobs) == 0)
        <p>test</p>
    @else
        <div class="content">
            <div class="container">
                <div class="filterSection">
                    <ul class="links">
                        <li class="filterChoice">
                            <div class="collapsible">Country</div>
                            <form class="filterContent">
                                <div class="check-box">
                                    <input type="checkbox" id="checkbox0" checked>
                                    <label for="checkbox0">All ({{ count($countries) }})</label>
                                </div>
                                @foreach ($countries as $country)
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox{{ $loop->iteration }}">
                                        <label for="checkbox{{ $loop->iteration }}">{{ $country }}</label>
                                    </div>
                                @endforeach
                            </form>
                        </li>

                        <li class="filterChoice">
                            <div class="collapsible">Job Category</div>
                            <form class="filterContent">
                                <div class="check-box">
                                    <input type="checkbox" id="checkbox1" checked>
                                    <label for="checkbox1">All ({{ count($categories) }})</label>
                                </div>
                                @foreach ($categories as $category)
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox2">
                                        <label for="checkbox2">{{ $category->name }}</label>

                                    </div>
                                @endforeach
                            </form>
                        </li>
                        <li class="filterChoice">
                            <div class="collapsible">Job Type</div>
                            <form class="filterContent">
                                <div class="check-box">
                                    <input type="checkbox" id="checkbox0" checked>
                                    <label for="checkbox0">All ({{ count($jobtypes) }})</label>
                                </div>
                                @foreach ($jobtypes as $jobtype)
                                    <div class="check-box">
                                        <input type="checkbox" id="checkbox{{ $loop->iteration }}">
                                        <label for="checkbox{{ $loop->iteration }}">{{ $jobtype }}</label>

                                    </div>
                                @endforeach
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="jobsSection">
                    @foreach ($jobs as $job)
                        <div class="box">
                            <a href="/jobs/job"class="title">{{ $job->title }}</a>
                            <img src="/Imgs/alexApps.png" alt="">
                            <div class="details">
                                <span class="companyName">{{ $job->company->name }}</span>
                                <span class="location">- {{ $job->company->location }}</span>
                                <div class="createdAt">{{ $job->created_at->diffForHumans() }}</div>
                                <div class="jobType">
                                    <button class="jobTypeBtn">{{ $job->type }}</button>
                                </div>
                                <div class="description">
                                    {{ $job->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    @endif
    <!-- Jobs Section  -->
    <script src="/scripts/main.js"></script>
</body>

</html>
