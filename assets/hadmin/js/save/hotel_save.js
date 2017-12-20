$( document ).ready(function() {
    $('.left').hide();
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
            width: 270,
            height: 203,
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
        var checked = [];
        $("input[name='facility[]']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        }); 
        var tchecked = [];
        $("input[name='troom[]']:checked").each(function ()
        {
            tchecked.push(parseInt($(this).val()));
        });  

        fd.append('facility[]', checked);
        fd.append('troom[]', tchecked);
        fd.append('imageFile', resp);
        fd.append('desc', desc);
        fd.append('title', $('input#hotel').val());
        fd.append('price', $('input#price').val());

        $.ajax({
            url: bu+'cadmin/hotel_save',
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                alert(data);
                window.location.href=window.location.href;
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

        fd.append('imageFile', resp);
        fd.append('desc', desc);
        fd.append('title', $('input#hotel').val());
        fd.append('price', $('input#price').val());
        fd.append('idbus', $('input#idbus').val());

        $.ajax({
            url: bu+'admin/bus/bus_save_edit',
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function (data) {
                alert(data);
                window.location.href=window.location.href;
            }
        });
        });
        return false;
    });

});

