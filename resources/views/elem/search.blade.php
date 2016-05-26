<script>
    $(function() {
        var form = $("#search");
        var alert = $(".alert");

        //Handle form submit
        form.on('submit', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            $.ajax(url, {
                type : 'post',
                data : {
                    lat : lat.val(),
                    lng : lng.val(),
                    api : $('#apis').val(),
                    count: $('#depth').val()
                },
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data) {
                    updateDiv(data);
                },
                error : function() {
                    alert.removeClass('hidden');
                }
            });

            //Successful call will update detailed data
            function updateDiv(data) {
                var details = $(".js-details");
                details.empty();
                details.html(data);
            }
        });
    });
</script>