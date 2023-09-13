<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
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
                    <h5>Doctors Information</h5>
                </div>
                <button type="button" data-toggle="modal" data-target="#addDoctorModal">Add Doctors</button> <br><br>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-element">
                                <form action="{{ route('admin.doctor.add') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name </label>
                                        <input type="text" id="name" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position </label>
                                        <input type="text" id="position" name="position" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number </label>
                                        <input type="text" id="phone" name="phone" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input type="email" id="email" name="email" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="profile">Profile Picture </label>
                                        <input type="file" id="profile" name="profile" class="form-control"
                                            accept="image/*" />
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="card-admin">
                    <div class="row">
                        @foreach ($doctors as $doctor)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="card">
                                    <img src="{{ asset('storage/images/' . $doctor->profile) }}"
                                        alt="profile-picture" />
                                    <p class="title">{{ $doctor->name }}</p>
                                    <p> {{ $doctor->position }} </p>
                                    <p> {{ $doctor->phone }} </p>
                                    <div class="buttons">
                                        <button data-toggle="modal"
                                            data-target="#editDoctorModal{{ $doctor->id }}">Edit</button>
                                        <button data-toggle="modal"
                                            data-target="#deleteDoctorModal{{ $doctor->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editDoctorModal{{ $doctor->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Doctor Information</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-element">
                                                <form action="{{ route('admin.doctor.edit') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $doctor->id }}">
                                                    <div class="form-group">
                                                        <label for="name">Name </label>
                                                        <input type="text" id="name" name="name"
                                                            value="{{ $doctor->name }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position">Position </label>
                                                        <input type="text" id="position" name="position"
                                                            value="{{ $doctor->position }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number </label>
                                                        <input type="text" id="phone" name="phone"
                                                            value="{{ $doctor->phone }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email </label>
                                                        <input type="email" id="email" name="email"
                                                            value="{{ $doctor->email }}" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile">Profile Picture </label>
                                                        <input type="file" id="profile" name="profile"
                                                            class="form-control" accept="image/*" />
                                                    </div>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteDoctorModal{{ $doctor->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Doctor Information
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure want to delete??
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <a href="{{ url('delete-doctor/' . $doctor->id) }}"><button type="button"
                                                    class="btn btn-primary">Delete</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
</body>

</html>
