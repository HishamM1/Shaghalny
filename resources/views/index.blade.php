<x-head />
<style>
    .flashMessage {
        background-color: #ff5f00;
        color: white;
        padding: 20px;
        margin: 20px 0px 20px 50px;
        width: fit-content;
        border-radius: 10px
    }
</style>

<body onload="randomizeImg();">
    <div class="mainPage">
        <x-navbar />
        <!-- Start landingPage -->
        <div class="landingPage">
            <div class="content">
                <p>Find the Best Jobs</p>
                <h3>
                    Searching for vacancies & career opportunities? Shaghalny helps you
                    in your job search
                </h3>
                <form action="/jobs/" method="GET"class="searchBar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Search Jobs(e.g. Senior PHP Developer)" />
                    <div class="availableJobs">{{ $jobs_count }} Open Jobs</div>
                    <button type="submit" class="btn submitBtn">Search Jobs</button>
                </form>
            </div>
            @if (session()->has('success'))
                <div class="flashMessage">
                    <p>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        </div>
        <!-- End landingPage -->
    </div>
    <script src="/scripts/main.js"></script>
</body>
