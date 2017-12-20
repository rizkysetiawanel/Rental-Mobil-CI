$( document ).ready(function() {
    var $uploadCrop;
var file1 = document.querySelector('.file');
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();          
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
                $('.file').addClass('ready');
            }           
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $('.left').croppie({
        viewport: {
            width: 300,
            height: 300,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

  $('.file').on('change', function(){

    readFile(this)
    $('.imgl').hide();
    $('.left').slideDown('400');

  });

    $('#inputForm').on('submit', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        
        var desc    = $('#texte').summernote('code');
        var fd      = new FormData();
        fd.append('usname', $('input#usname').val());
        fd.append('imageFile', resp);
        fd.append('fn', $('#fn').val());
        fd.append('ln', $('#ln').val());
        fd.append('ha', $('#ha').val());

        $.ajax({
            url: baseurl+'gsadmin/save_product',
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.gs-ipt-wrapper').append(data);
                $('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_product');
                $('#jqContent').html();
                $('#jqContent').slideUp('400');
            }
        });
        });
        return false;
    });

    $('#editForm').on('submit', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        

        var fd      = new FormData();
        fd.append('id', $('#id').val());
        fd.append('imglast', $('#imglast').val());
        fd.append('name', $('input#name').val());
        fd.append('desc', $('#desc').val());
        fd.append('imageFile', resp);

        $.ajax({
            url: baseurl+'gsadmin/save_edit_brand',
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.gs-ipt-wrapper').append(data);
                $('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_brand');
                $('#jqContent').html();
                $('#jqContent').slideUp('400');
            }
        });
        });
        return false;
    });

});

