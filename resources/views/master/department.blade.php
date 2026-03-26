@extends('layout.index')
@section('title', 'Department')

@section('content')
<div class="content-wrapper">

    <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Department
              </h3>
        <!-- BUTTON ADD -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            New
        </button>
    </div>

    <!-- ===================== MODAL ADD ===================== -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('department.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5>Add Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Department Name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- ==================================================== -->

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center" style="width: 15%">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td class="text-center">

                    <!-- BUTTON EDIT -->
                    <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $department->id }}">
                        Edit
                    </button>

                    <!-- BUTTON DELETE -->
                    <button class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#delete{{ $department->id }}">
                        Delete
                    </button>

                </td>
            </tr>

            <!-- ===================== MODAL EDIT ===================== -->
            <div class="modal fade" id="edit{{ $department->id }}" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('department.update', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5>Edit Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <input type="text" name="name" class="form-control"
                                    value="{{ $department->name }}" id="name" placeholder="Department Name">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ====================================================== -->


            <!-- ===================== MODAL DELETE ===================== -->
            <div class="modal fade" id="delete{{ $department->id }}" tabindex="-1" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="modal-header">
                                <h5>Delete Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Are You Sure Delete? <b>{{ $department->name }}</b>?
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