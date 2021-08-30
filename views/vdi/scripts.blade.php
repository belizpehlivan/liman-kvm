<script>

    $(document).ready(function(){
        getVmData();
    });

    function getVmData(){
        var form = new FormData();
        request(API('get_vm_data'), form, function(response) {
            response = JSON.parse(response);
            $("#select2").select2({
                data: response["message"]
            })
            return;
        }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
        });
    }

    function listVdi(){
        showSwal('{{__("Yükleniyor...")}}','info');
        let ip = "{{extensionDb('ip')}}"

        var form = new FormData();
        form.append("name", name);
        form.append("username", username);
        form.append("ip", ip);
          
        request(API('list_vdi'), form, function(response) {
            $('#vdiTable').html(response).find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
            }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
            });
    }

    function assignVdi(){

        let name = $('#select2').select2('data')[0]["text"];
        let username = document.getElementById("username").value;
        let ip = "{{extensionDb('ip')}}"

        var form = new FormData();
        form.append("name", name);
        form.append("username", username);
        form.append("ip", ip);

        request(API('assign_vdi'), form, function(response) {
            console.log(response);
            $('#assignVdiModal').modal('hide'); 
            setTimeout(function(){
                listVdi();
            }, 3000);
            }, function(response) {
                let error = JSON.parse(response)["message"];
                showSwal(error, 'error', 3000);
            });
    }
    
    function deleteVdi(line){

        var form = new FormData();
        let ip = "{{extensionDb('ip')}}"
        form.append("name", line.querySelector("#name").innerHTML);
        form.append("username", line.querySelector("#username").innerHTML);
        form.append("ip", ip);

        request(API('delete_vdi'), form, function(response) {
            message = JSON.parse(response)["message"];
            console.log(message);
            listVdi();
            setTimeout(function(){
                showSwal(message, "success", 3000); 
            }, 3000);
            }, function(response) {
                let error = JSON.parse(response);
                showSwal(error.message, 'error', 3000);
            });
    }
    
    var selectedVdiName;
    var selectedVdiUsername;

    function showEditVdiModal(line){

        $('#editVdiModal').modal('show');
        selectedVdiName = line.querySelector("#name").innerHTML;
        selectedVdiUsername = line.querySelector("#username").innerHTML;
       
    }

    function editVdi(){

        var form = new FormData();
        form.append("new_name", document.getElementById("new_name").value);
        form.append("new_username", document.getElementById("new_username").value);
        form.append("name", selectedVdiName);
        form.append("username", selectedVdiUsername);
        form.append("ip", "{{extensionDb('ip')}}");

        request(API('edit_vdi'), form, function(response) {
            $('#editVdiModal').modal('hide');
            listVdi();
            }, function(response) {
                let error = JSON.parse(response);
                showSwal(error.message, 'error', 3000);
            });
    }
</script>
