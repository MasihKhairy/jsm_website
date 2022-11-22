@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/blogs">Blogs</a></li>
                <li class="breadcrumb-item active">Blog Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <section class="section">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Blog Details</h5>


                                <!-- Table with stripped rows -->
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th>Title</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $blogs->title }}</td>
                                    </tr>

                                    <tr>
                                        <th>Type</th>
                                    </tr>

                                    <tr>
                                        <th>Date</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $blogs->date }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $blogs->type }}</td>
                                    </tr>

                                    <tr>
                                        <th>Quote</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $blogs-> quote }}</td>
                                    </tr>

                                    <tr>
                                        <th>Text</th>
                                    </tr>
                                    <tr>
                                        <td>{!! $blogs->text !!} </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Blog Image</h5>

                                <img src="/public/image/blog/{{$blogs->img}}" alt="" height="100%" width="100%">

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </section>

@endsection
