<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    @livewireStyles
</head>

<body>
    @include('admin.navbar')

    <main>
        <div class="content">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-12">
                <div class="title-box">
                    <h5>Appointments</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive -sm">
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th >Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date Requested</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->doctor }}</td>
                                <td>{{ $appointment->message }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                  <a href="{{route('appointment.approve',$appointment->id)}}" class="btn btn-outline-success">Approve</a><br>
                                  <a href="{{route('appointment.reject',$appointment->id)}}" class="btn btn-outline-danger">Reject</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        </div>
        <p class="copyright">
            &copy; 2023 - <span>One Health</span> All Rights Reserved.
        </p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="admin/app.js"></script>
    @livewireScripts
</body>

</html>
