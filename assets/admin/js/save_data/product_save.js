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
            width: 500,
            height: 500,
            type: 'square'
        },
        boundary: {
            width: 500,
            height: 500
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
        fd.append('name', $('input#name').val());
        fd.append('desc', desc);
        fd.append('imageFile', resp);
        fd.append('cat', $('#kategori').val());
        fd.append('brand', $('#brand').val());
        fd.append('price', $('#price').val());
        fd.append('weight', $('#weight').val());
        fd.append('width', $('#width').val());
        fd.append('wide', $('#wide').val());
        fd.append('thick', $('#thick').val());

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
        
        var desc    = $('#texte').summernote('code');
        var fd      = new FormData();
        fd.append('idprd', $('input#idprd').val());
        fd.append('name', $('input#name').val());
        fd.append('desc', desc);
        fd.append('imageFile', resp);
        fd.append('cat', $('#kategori').val());
        fd.append('brand', $('#brand').val());
        fd.append('price', $('#price').val());
        fd.append('weight', $('#weight').val());
        fd.append('width', $('#width').val());
        fd.append('wide', $('#wide').val());
        fd.append('thick', $('#thick').val());

        $.ajax({
            url: baseurl+'gsadmin/save_edit_product',
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

});

