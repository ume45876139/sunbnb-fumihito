<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/app.css">
    @toastr_css
</head>
<body>
    <div class="container">
        <h1>Image Uploader</h1>
        <div class="row p-5">
            <form class="col-6">
                @csrf
                <input type="hidden" name="listing_id" id="lesson_id">
                <div class="col-12 card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center p-4" style="height: 100px;border: 1px dashed;border-radius: 10px;">
                            <input type="file" name="photo" id="image_file" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-12 card mt-4 p-5" id="image-display">
                    <div id="display_image"></div>
                </div>
                <button type="button" id="submit" class="btn btn-primary btn-block mt-2" disabled>Upload</button>
            </form>

            <div class="col-6">
                <h3>Image here</h3>
                @if(count($images) > 0)
                    <div class="col-12 card p-3">
                        @foreach ($images as $image)
                            <img src="{{ asset($image->file_location) }}" alt="" width="100%" class="my-3">                    
                        @endforeach
                    </div>
                @else
                    <div class="col-12 card p-3">
                        No Images Found
                    </div>
                @endif
            </div>
        </div>

        
    </div>
    @jquery 
    @toastr_js
    @toastr_render
    <script src="/js/upload.js"></script>
</body>
</html>