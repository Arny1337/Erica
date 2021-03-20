<input type="file" multiple id="js-file">

    <div id="result">
        <!-- Результат из upload.php -->
    </div>

    <script src="/jquery.min.js"></script>
    <script>
        $("#js-file").change(function(){
        if (window.FormData === undefined){
        alert('В вашем браузере FormData не поддерживается')
    } else {
        var formData = new FormData();
        $.each($("#js-file")[0].files,function(key, input){
        formData.append('file[]', input);
    });

        $.ajax({
        type: "POST",
        url: '/upload.php',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        dataType : 'json',
        success: function(data){
        data.forEach(function(msg) {
        $('#result').append(msg);
    });
    }
    });
    }
    });
    </script>