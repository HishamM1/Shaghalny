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

    .flashMessage {
        background-color: #ff5f00;
        color: white;
        padding: 20px;
        margin: 20px 0px 0px 50px;
        width: fit-content;
        border-radius: 10px
    }
</style>

<body style="background-color: #f6f6f6">
    <x-navbar />

    <div class="container">
        <div class="welcome">
            <h2>Welcome Back!</h2>
        </div>
        <div class="add-job">
            <a href="{{route("jobs.create")}}" class="btn btn-danger">Add New Job</a>
        </div>
        <div class="container">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Created At</th>
                    <th>Operations</th>
                </tr>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->type }}</td>
                        <td>{{ $job->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route("jobs.show", $job->id)}}" class="btn btn-primary">View</a>
                            <a href="{{ route("jobs.applications.index", $job->id) }}" class="btn btn-primary">Applications</a>
                            <a href="{{ route("jobs.edit", $job->id)}}" class="btn btn-primary">Update</a>
                            <form action="{{ route("jobs.destroy", $job->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" type="submit">Delete</button>
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
