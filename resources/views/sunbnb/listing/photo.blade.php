@extends('sunbnb.listing.master')
@section('main-contents')
<div class="col-sm-9 card">
    <div class="card-header">
        Image Uploader
    </div>
    <div class="row">
        <form class="col-6">
            @csrf
            <input type="hidden" name="listing_id" id="lesson_id" value="{{ $listing->id }}">
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
            <a href="{{ route('amenities', ['listing' => $listing]) }}" class="mt-3 btn btn-primary">Next</a>
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
@endsection
