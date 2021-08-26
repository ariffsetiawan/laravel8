@extends('layouts.master')

@section('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

    @include('partials.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('partials.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
                        <a href="/users/create" class="btn btn-success btn-icon-split shadow-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Create New</span>
                        </a>
                    </div>

                    @include('components.alerts')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if ($users->isNotEmpty())
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a href="/users/{{ $user->id }}/edit" class="btn btn-info btn-icon-split btn-sm">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            <span class="text">Edit</span>
                                                        </a>

                                                        @if ($user->id != auth()->user()->id)
                                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" id="deleteButton" data-target="#deleteModal" data-attr="/users/delete/{{ $user->id }}">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text">Delete</span>
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('partials.footer')

    </div>
    <!-- End of Content Wrapper -->

<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="spinner-border" role="status" style="display: none;" id="loader">
    <span class="sr-only">Loading...</span>
</div>
    
@endsection

@section('scripts')

<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>

<script>
    // display delete modal
    $(document).on('click', '#deleteButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            success: function(result) {
                $('#deleteModal').modal("show");
                $('#modalBody').html(result).show();
            }, 
            complete: function() {
                $('#loader').hide();
            }, 
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

</script>
    
@endsection