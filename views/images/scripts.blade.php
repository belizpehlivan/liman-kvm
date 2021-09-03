<script>
    function listImages(){

        showSwal('{{__("Yükleniyor...")}}','info');
        var form = new FormData();

        request(API('list_images'), form, function(response) {
            $('#imagesTable').html(response).find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
        }, function(response) {
            let error = JSON.parse(response);
            showSwal(error.message, 'error', 3000);
        });
    }
</script>