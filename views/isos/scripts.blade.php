<script>
    function listIsos(){
        showSwal('{{__("Yükleniyor...")}}','info');
        var form = new FormData();

        request(API('list_isos'), form, function(response) {
            $('#isosTable').html(response).find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
        }, function(response) {
            let error = JSON.parse(response);
            showSwal(error.message, 'error', 3000);
        });
    }
</script>