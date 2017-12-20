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
            width: 400,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 500,
            height: 300
        }
    });

  $('.file').on('change', function(){

    readFile(this)
    $('.imgl').hide();
    $('.left').slideDown('400');

  });

    $('#inputBankForm').on('submit', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        
        var desc    = $('#texte').summernote('code');
        var fd      = new FormData();
        
        // var input form
        var bankName   	= $('#title').val();
        var noAcc 		= $('#noAcc').val();
        var owner       = $('#owner').val();

        // append data
        fd.append('imageFile', resp); // append image file
        fd.append('bankName', bankName);
        fd.append('noAcc', noAcc);
        fd.append('owner', owner);

        // Ajax metode Post
        $.ajax({
            url: bu+'admin/setting/bank_setting_save',
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

    $('#edittBankForm').on('submit', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
        
        var desc    = $('#texte').summernote('code');
        var fd      = new FormData();
        
        // var input form
        var idbank      = $('#idbank').val();
        var bankName    = $('#title').val();
        var noAcc       = $('#noAcc').val();
        var owner       = $('#owner').val();

        // append data
        fd.append('idbank', idbank);
        fd.append('imageFile', resp); // append image file
        fd.append('bankName', bankName);
        fd.append('noAcc', noAcc);
        fd.append('owner', owner);

        // Ajax metode Post
        $.ajax({
            url: bu+'admin/setting/bank_save_edit',
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

