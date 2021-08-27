<script>
    function getVM(){
        showSwal('{{__("Yükleniyor...")}}','info');
            var form = new FormData();
            request(API('get_vms'), form, function(response) {
               // console.log(response);
            $('#vmsTable').html(response).find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
            }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
            });
    }

    function startMachine(line){

        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('start_machine'), form, function(response) {
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }

    function rebootMachine(line){
        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('reboot_machine'), form, function(response) {
            console.log(response);
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }
    function shutdownMachine(line){
        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('shutdown_machine'), form, function(response) {
            console.log(response);
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }
    function destroyMachine(line){
        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('destroy_machine'), form, function(response) {
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }
    function deleteMachine(line){
        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('delete_machine'), form, function(response) {
            console.log(response);
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }

    function cpuInfo(line){
        
        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name", name);

        request(API('list_cpu_info'), form, function(response) {
           // console.log(response);
            $("#machineInfoModal").modal('show');
            $('#cpuInfoTable').html(response);//.find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
            }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
        });
    }

    function closeInfoModal(){
        $("#machineInfoModal").modal('hide');
    }

    function createVM(){

        let title = document.getElementById("vmTitle").value;
        let location = document.getElementById("vmLocation").value;

        var data = new FormData();
        data.append("title", title);
        data.append("location", location);

        request(API('create_vm'), data, function(response) {
            response = JSON.parse(response)["message"];
            showSwal(response, 'success', 3000);  
            $('#createVMModal').modal("hide");
            setTimeout(function(){
                getVM();
            }, 3000);
        }, function(response) {
                let error = JSON.parse(response);
                console.log(error.message);
                showSwal(error.message, 'error', 3000);
            });
    }   

        
</script>