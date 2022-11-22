@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/blogs">Blogs</a></li>
                <li class="breadcrumb-item active">New Blog</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Blog</h5>

                        <!-- Custom Styled Validation -->
                        <form method="POST" class="row g-3 needs-validation" novalidate
                              action="{{ route('blogs.store') }}"
                              enctype="multipart/form-data" onsubmit="editor()">
                            @csrf
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="title" class="form-control" id="title"
                                               placeholder="blog title" required>
                                        <label for="title">Blog Title</label>
                                    </div>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="type" class="form-control" id="type"
                                               placeholder="blog type" required>
                                        <label for="type">Blog Type</label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea type="text" name="quote" class="form-control" id="type"
                                                  placeholder="quote" required style="height: 100px;"></textarea>
                                        <label for="type">Quote</label>
                                    </div>
                                </div>

                                <br>
                                <div class="col-md-12">
                                    <label for="type" class="form-label">Blog Text</label>
                                    <div class="quill-editor-default" style="height: 130px;" id="type">

                                    </div>
                                </div>
                                <textarea name="blog_text" id="blog_text" style="display:none"></textarea>
                                <br>
                            </div>

                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <label for="img" class="form-label">Blog IMG</label>
                                    <input name="img" id="img" class="form-control" type="file"
                                           onchange="PreviewImage()">
                                </div>


                                <div class="col-md-12" style=" margin-top: 10px;">
                                    <img src="" alt=" " id="uploadPreview"
                                         style="height: 66%; width: 100%;">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        function PreviewImage() {

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("img").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;

            };


        };

        function editor() {
            document.getElementById("blog_text").innerHTML = document.getElementsByClassName("ql-editor")[0].innerHTML;
        }

    </script>

@endsection
