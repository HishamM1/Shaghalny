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
            <h2>{{ request('search') === null ? 'All Jobs' : request('search') }}</h2>
        </div>
    </div>
    <!-- End Subheader -->

    <!-- Jobs Section  -->
    @if (count($jobs) == 0)
        <div class="errorPage">
            <div class="searchIcon">
                <i class="fa-brands fa-searchengin"></i>
            </div>
            <div class="text">No results found for the keyword “{{ request('search') }}”</div>
            <p>Please check the spelling or use a general search keyword</p>
            <a href="/" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i>Back to search</a>
        </div>
    @else
        <div class="content">
            <div class="container">
                <div class="filterSection">
                    <ul class="links">

                        <li class="filterChoice">
                            <div class="collapsible">Country</div>
                            <form class="filterContent" method="GET" action="{{ url()->full() }}">
                                <div class="check-box">
                                    <input type="checkbox" id="countrycheckbox0"
                                        onChange="window.location.href='{{ request()->fullUrlWithQuery(['country' => null]) }}'"
                                        {{ request('country') === null ? 'checked' : '' }}>
                                    <label for="countrycheckbox0">All</label>
                                </div>
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                @if (request('type'))
                                    @foreach (request('type') as $type)
                                        <input type="hidden" name="type[]" value="{{ $type }}">
                                    @endforeach
                                @endif
                                @if (request('category'))
                                    @foreach (request('category') as $cat)
                                        <input type="hidden" name="category[]" value="{{ $cat }}">
                                    @endforeach
                                @endif
                                @foreach ($countries as $country)
                                    <div class="check-box">
                                        <input type="checkbox" id="countrycheckbox{{ $loop->iteration }}"
                                            name="country[]"
                                            @if (request('country') != null) @foreach (request('country') as $cout) {{ $country === $cout ? 'checked' : '' }} @endforeach @endif
                                            value="{{ $country }}" onChange="this.form.submit()">
                                        <label for="countrycheckbox{{ $loop->iteration }}">{{ $country }}</label>

                                    </div>
                                @endforeach
                            </form>
                        </li>

                        <li class="filterChoice">
                            <div class="collapsible">Job Category</div>
                            <form class="filterContent" method="GET" action="{{ url()->full() }}">
                                <div class="check-box">
                                    <input type="checkbox" id="categorycheckbox0"
                                        onChange="window.location.href='{{ request()->fullUrlWithQuery(['category' => null]) }}'"
                                        {{ request('category') === null ? 'checked' : '' }}>
                                    <label for="categorycheckbox0">All</label>
                                </div>
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                @if (request('type'))
                                    @foreach (request('type') as $type)
                                        <input type="hidden" name="type[]" value="{{ $type }}">
                                    @endforeach
                                @endif
                                @if (request('country'))
                                    @foreach (request('country') as $country)
                                        <input type="hidden" name="country[]" value="{{ $country }}">
                                    @endforeach
                                @endif
                                @foreach ($categories as $category)
                                    <div class="check-box">
                                        <input type="checkbox" id="categorycheckbox{{ $loop->iteration }}"
                                            name="category[]"
                                            @if (request('category') != null) @foreach (request('category') as $cat) {{ $category === $cat ? 'checked' : '' }} @endforeach @endif
                                            value="{{ $category }}" onChange="this.form.submit()">
                                        <label
                                            for="categorycheckbox{{ $loop->iteration }}">{{ $category }}</label>

                                    </div>
                                @endforeach
                            </form>
                        </li>

                        <li class="filterChoice">
                            <div class="collapsible">Job Type</div>
                            <form class="filterContent" method="GET" action="{{ url()->full() }}">
                                <div class="check-box">
                                    <input type="checkbox" id="typecheckbox0"
                                        onChange="window.location.href='{{ request()->fullUrlWithQuery(['type' => null]) }}'"
                                        {{ request('type') === null ? 'checked' : '' }}>
                                    <label for="typecheckbox0">All</label>
                                </div>
                                @if (request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                                @if (request('category'))
                                    @foreach (request('category') as $cat)
                                        <input type="hidden" name="category[]" value="{{ $cat }}">
                                    @endforeach
                                @endif
                                @if (request('country'))
                                    @foreach (request('country') as $country)
                                        <input type="hidden" name="country[]" value="{{ $country }}">
                                    @endforeach
                                @endif
                                @foreach ($jobtypes as $jobtype)
                                    <div class="check-box">
                                        <input type="checkbox" id="typecheckbox{{ $loop->iteration }}" name="type[]"
                                            @if (request('type') != null) @foreach (request('type') as $job) {{ $jobtype === $job ? 'checked' : '' }} @endforeach @endif
                                            value="{{ $jobtype }}" onChange="this.form.submit()">
                                        <label for="typecheckbox{{ $loop->iteration }}">{{ $jobtype }}</label>
                                    </div>
                                @endforeach
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="jobsSection">
                    @foreach ($jobs as $job)
                        <div class="box">
                            <a href="/job/{{ $job->id }}"class="title">{{ $job->title }}</a>
                            <img src="/storage/{{ $job->company->image }}" alt="Company doesn't have an image">
                            <div class="details">
                                <span class="companyName">{{ $job->company->company_name }}</span>
                                <span class="location">- {{ $job->company->location }}</span>
                                <div class="createdAt">{{ $job->created_at->diffForHumans() }}</div>
                                <div class="jobType">
                                    <button class="jobTypeBtn">{{ $job->type }}</button>
                                </div>
                                <div class="description">
                                    {{ $job->job_description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $jobs->links() }}
            </div>
        </div>
    @endif
    <!-- Jobs Section  -->
    <script src="/scripts/main.js"></script>
</body>

</html>
