<script>
    $(function() {
        var form = $("#search");
        var alert = $(".alert");
        var selectBox = $('#apis');
        var firstDataset = "{{$datasets[0]['name']}}";
        var secondDataset = "hycom";
        var url = form.attr('action');

        function toggleMeta() {
            if(selectBox.val() == firstDataset) {
                $('#' + secondDataset).hide();
                $('#' + firstDataset).show();
            } else {
                $('#' + firstDataset).hide();
                $('#' + secondDataset).show();
            }
        }

        toggleMeta();

        selectBox.change(function() {
            toggleMeta();
            updateDetails(url);

        });

        //Handle form submit
        function updateDetails(url) {
            $.ajax(url, {
                type : 'post',
                data : {
                    lat : lat.val(),
                    lng : lng.val(),
                    api : selectBox.val(),
                    count : $('#depth').val()
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
        }

        //Successful call will update detailed data
        function updateDiv(data) {
            var details = $(".js-details");
            details.empty();
            details.html(data);
        }

        form.on('submit', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            updateDetails(url);
        });
    });
</script>