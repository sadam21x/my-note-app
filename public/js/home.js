$(function () {

    $('.note-detail-button').on('click', function(){

        const note_id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/notes/detail';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {note_id : note_id},
            dataType: 'json',
            success: function(data){
                $('.detail-note-title').empty();
                $('.detail-note-content').empty();

                $('.detail-note-title').html(data[0].title);
                $('.detail-note-content').html(data[0].content);
            }
        });
        
    });

});