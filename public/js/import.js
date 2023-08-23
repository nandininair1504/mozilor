$(function() {

    $('#importForm').submit(function(e) {
        e.preventDefault();

        const action = $(this).attr('action');
        let formData = new FormData(this);

        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

        $.ajax({
            type:'POST',
            url: action,
            data: formData,

            contentType: false,
            processData: false,

            success: (response) => {
              if (response && (response.success === true)) {
                $('.alert-danger').hide();
                $('.alert-success').show();
              }
            },

            error: function(response){
                $('.alert-success').hide();
                console.log( response.responseJSON);
                let text = response.responseJSON.data ? response.responseJSON.data.csv_file : "Oops! Something wrong";
                $('.alert-danger').text(text).show();
            }
        });
    });
});
