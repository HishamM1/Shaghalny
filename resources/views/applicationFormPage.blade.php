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
                        {{ $job->title }} - {{ $job->type }}
                        <img src="Imgs/{{ $job->company->image }}" alt="">
                    </div>
                    <div class="message">The hiring team at ({{ $job->company->company_name }}) requires you to answer
                        the below questions.</div>

                    <form action="/storeApplication" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{ $job->id }}" name="job_id" hidden>
                        <div>
                            <label for="" style="display:block">Full Name:</label>
                            <input type="text" name="full_name" placeholder="Your Full-Name"
                                style="margin: 10px 0px 10px;padding:4px">
                        </div>
                        @error('full_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="" style="display: block">Email:</label>
                            <input type="text" name="email" placeholder="Your Email"
                                style="margin: 10px 0px 10px;padding:4px">
                        </div>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="" style="display: block">Number:</label>
                            <input type="tel" name="number" placeholder="Your Mobile Number"
                                style="margin: 10px 0px 10px;padding:4px">
                        </div>
                        @error('number')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div class="military question">
                            <label>Did you finish your military service?</label>
                            <div class="radioBtns">
                                <input type="radio" id="Yes" name="finished_military" value="Yes">
                                <label for="Yes">Yes</label><br>
                                <input type="radio" id="No" name="finished_military" value="No">
                                <label for="No">No</label><br>
                            </div>
                        </div>
                        @error('finished_military')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div class="unique question">
                            <label>Tell us about yourself. What makes you unique from other candidates?</label>
                            <textarea name="about_applier" id="" cols="20" rows="10" placeholder="Write your answer here.."></textarea>
                        </div>
                        @error('about_applier')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="">CV:</label>
                            <input type="file" name="cv" required style="margin: 10px 0px 10px;padding:4px">
                        </div>
                        @error('cv')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <input type="submit" class="btn" value="Submit Application"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/scripts/main.js"></script>
</body>

</html>
