const imageInput = $('#image_file');
const displayArea = $('#display_image');
const uploadBtn = $('#submit');
const files = [];

// Validate the file
function isValidated(file) {
    let pattern = /\.(jpg|jpeg|gif|png)/i;
    return pattern.test(file);
}

// Add the image in the list
function callAjax(data) {
    return $.ajax({
        type: "POST",
        url: '/upload',
        data,
        processData: false,
        contentType: false,
        success: function(resp) {
            toastr.success('Successfully uploaded!')
        },
        error: function(error) {
            toastr.error('There is an error occured')
        }
    })
}

// Upload all image from the list
function upload() {
    const formData = new FormData();
    let listing_id = $('input[name=listing_id]').val();
    let _token = $('input[name=_token]').val();

    // adding csrf token in formData
    formData.append('_token', _token);
    formData.append('listing_id', listing_id);

    for (let image of files ) {
        formData.append('photo[]', image);
    }

    $('#submit').prop('disabled', true);
    callAjax(formData)
        .done(function() {
            uploadBtn.prop('disabled', false);
            displayArea.html('');
        });
}


//  JQuery Event
console.log(imageInput.change());
// Add file in Preview
imageInput.change(function() {
    let reader = new FileReader();
    let image = this.files[0];
console.log(displayArea);
    if (isValidated(image.name)) {
        reader.onload = function (e) {
            displayArea.append(`<img src='${e.target.result}' class='img-thumbnail' width='100px' height='100px'/> <br>`);
        };
        reader.readAsDataURL(image);

        // push to global variable
        files.push(image);

       uploadBtn.prop('disabled', false);
    } else {
        toastr.error('File not supported, should be an image file.');
    }console.log(files);
});

$('#image-display').click(function() {
    console.log('hello');
});
// Submit Images to Server
uploadBtn.click(function(e) {
    e.preventDefault();
    upload();
});