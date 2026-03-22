@extends('layout.index')
@section('title', 'Employee')

@section('content')
<div class="content-wrapper">

    <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Employee
              </h3>
        <!-- BUTTON ADD -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            New
        </button>
    </div>

    <!-- ===================== MODAL ADD ===================== -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/employee/store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5>Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Position Name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- ==================================================== -->

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-center">Nik</th>
                <th class="text-center">Name</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Birthdate</th>
                <th class="text-center">Address</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Department</th>
                <th class="text-center">Position</th>
                <th class="text-center" style="width: 15%">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($employess as $employee)
            <tr>
                <td>{{ $employee->nik }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->birthdate }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->department_name }}</td>
                <td>{{ $employee->position_name }}</td>
                <td class="text-center">

                    <!-- BUTTON EDIT -->
                    <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $employee->id }}">
                        Edit
                    </button>

                    <!-- BUTTON DELETE -->
                    <button class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#delete{{ $employee->id }}">
                        Delete
                    </button>

                </td>
            </tr>

            <!-- ===================== MODAL EDIT ===================== -->
            <div class="modal fade" id="edit{{ $employee->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ url('/employee/update/'.$employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5>Edit employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <input type="text" name="nik" class="form-control"
                                    value="{{ $employee->nik }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="name" class="form-control"
                                    value="{{ $employee->name }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="gender" class="form-control"
                                    value="{{ $employee->gender }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="birthdate" class="form-control"
                                    value="{{ $employee->birthdate }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="address" class="form-control"
                                    value="{{ $employee->address }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="phone" class="form-control"
                                    value="{{ $employee->phone }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="departmentid" class="form-control"
                                    value="{{ $employee->departmentid }}">
                            </div>
                            <div class="modal-body">
                                <input type="text" name="positionid" class="form-control"
                                    value="{{ $employee->positionid }}">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ====================================================== -->


            <!-- ===================== MODAL DELETE ===================== -->
            <div class="modal fade" id="delete{{ $employee->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ url('/employee/delete/'.$employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="modal-header">
                                <h5>Delete Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Yakin hapus <b>{{ $employee->name }}</b>?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ====================================================== -->

            @endforeach
        </tbody>
    </table>

</div>
@endsection