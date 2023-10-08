<x-head />
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .add-job,
    .welcome {
        margin-bottom: 10px;
        margin-left: 40px;
        padding: 10px 10px;
    }

    .return {
        margin-left: 38px;
        margin-bottom: 20px;
        padding: 10px 10px;
    }

    .flashMessage {
        margin-left: 40px;
        margin-bottom: 20px;
        padding: 10px 10px;
        background-color: #ff5f00;
        color: white;
    }
</style>

<body>
    <x-navbar />

    <div class="container">
        <div class="welcome">
            <h2>Applications for <span style="color: #ff5f00">{{ $job_title }}</span></h2>
        </div>
        <div class="return">
            <a href="{{route("dashboard.index")}}" class="btn btn-primary">Return</a>
        </div>

        <div class="container">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Sent At</th>
                    <th>Finished Military</th>
                    <th>About Applier</th>
                    <th>CV</th>
                    <th>Operations</th>
                </tr>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->full_name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->number }}</td>
                        <td>{{ $application->created_at->diffForHumans() }}</td>
                        <td>{{ $application->finished_military }}</td>
                        <td>{{ $application->about_applier }}</td>
                        <td><a href="{{ $application->cv }}" download class="btn btn-primary">Download</a>
                        </td>
                        <td>
                            <form action="{{ route("jobs.applications.destroy", [$job_id, $application->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @if (session()->has('success'))
            <div class="flashMessage">
                <p>
                    {{ session('success') }}
                </p>
            </div>
        @endif

    </div>
</body>
