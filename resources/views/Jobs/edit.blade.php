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
    <style>
        .error {
            color: red;
            font-size: 12px;
        }

        input {
            margin: 10px 0px 10px;
            padding: 4px;
            width: 50%;

        }

        select {
            margin: 10px 0px 10px;
            padding: 4px;
            width: 50%;
        }

        label {
            display: block;
        }
    </style>
    <title>Job</title>
</head>

<body>
    <x-navbar />
    <div class="appForm">
        <div class="container">
            <div class="card" style="min-width:600px">
                <div class="cardHeader">
                    <h2>Update Job</h2>
                </div>
                <div class="cardBody">
                    <form action="{{route("jobs.update", $job->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <input type="text" value="{{ $job->company_id }}" name="company_id" hidden>
                        <div>
                            <label for="">Title:</label>
                            <input type="text" name="title" placeholder="Job Title" value="{{ $job->title }}">
                        </div>
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="">Years of Experience Needed:</label>
                            <input type="number" name="experience" placeholder="Years of Experience"
                                value="{{ $job->experience }}">
                        </div>
                        @error('experience')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="">Type:</label>
                            <select name="type" id="">
                                <option value="Full Time" {{ $job->type == 'Full time' ? 'selected' : '' }}>Full Time
                                </option>
                                <option value="Part Time" {{ $job->type == 'Part time' ? 'selected' : '' }}>Part Time
                                </option>
                                <option value="Internship" {{ $job->type == 'Internship' ? 'selected' : '' }}>Internship
                                </option>
                                <option value="Remote" {{ $job->type == 'Remote' ? 'selected' : '' }}>Remote</option>
                            </select>
                        </div>
                        @error('type')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div class="unique question">
                            <label>Job Description:</label>
                            <textarea name="job_description" id="" cols="20" rows="10"
                                placeholder="Write job description here..">{{ $job->job_description }}</textarea>
                        </div>
                        @error('job_description')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="">Amount of Salary:</label>
                            <input type="number" name="salary" placeholder="Salary in single digit"
                                value="{{ $job->salary }}">
                        </div>
                        @error('salary')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="">Job Category:</label>
                            <select name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"{{ $category->id == $job->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn" value="Update"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/scripts/main.js"></script>
</body>

</html>
