@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('unsuccess'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <section class="section dashboard">
        <div class="row">

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Blogs</h5>
                                <a href="{{ route('blogs.create') }}" class="btn btn-primary bx-pull-right"> New Blog <i
                                            class="bi bi-plus"></i></a>

                                <div class="col-lg-3 mb-3">
                                    <form class=" d-flex align-items-center" method="GET" action="/blogs">
                                        <input type="text" class="form-control" name="query" placeholder="Search"
                                               title="Enter search keyword">
                                        {{--<button type="submit" title="Search" class="input-group-text"><i class="bi bi-search"></i></button>--}}
                                    </form>
                                </div>


                                <!-- Table with stripped rows -->
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->type }}</td>
                                            <td>{{ $blog->date }}</td>
                                            <td colspan="2">
                                                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                                                    <a class="btn btn-secondary"
                                                       href="{{ route('blogs.show',$blog->id) }}"><i
                                                                class="bi bi-collection"></i></a>

                                                    <a class="btn btn-success"
                                                       href="{{ route('blogs.edit',$blog->id) }}"><i
                                                                class="bi bi-pencil-square"></i></a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                                class="bi bi-trash-fill"></i></button>
                                                    <div class="modal fade" id="deleteModal" tabindex="-1">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Confirmation</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Small Modal-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                {!! $blogs->links() !!}
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </section>

@endsection
