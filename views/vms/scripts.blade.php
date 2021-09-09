<script>
var selectedVM;
//$("#v-pills-cpuInfo-tab").on("click", cpuInfo());

    function getVM(){

        showSwal('{{__("Yükleniyor...")}}','info');
            var form = new FormData();
            request(API('get_vms'), form, function(response) {
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

    function suspendMachine(line){

        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('suspend_machine'), form, function(response) {
            console.log(response);
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }

    function resumeMachine(line){

        var form = new FormData();
        let name = line.querySelector("#name").innerHTML;
        form.append("name",name);
        request(API('resume_machine'), form, function(response) {
            console.log(response);
            getVM();
        }, function(error) {
            showSwal(error.message, 'error', 5000);
        });
    }

 

    function showVmInfo(line){
        $("#vmInfoModal").modal('show');
        selectedVM = line.querySelector("#name").innerHTML;
        cpuInfo();
        $('#v-pills-cpuInfo-tab').tab('show');
    }


    function cpuInfo(){
        
        var form = new FormData();
        let name = selectedVM;
        form.append("name", name);
        $('#vmCpuSize').val('');
        request(API('list_cpu_info'), form, function(response) {
            $('#cpuInfoTable').html(response);
            Swal.close();
            }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
        });
    }

    function showVmDiskSize(){

        var form = new FormData();
        let name = selectedVM;
        form.append("name", name);
        request(API('vm_disk_size'), form, function(response) {
           // console.log(response);
            $('#diskSizeTable').html(response);
            }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
        });
    }

    function showVmMemory(){

        var data = new FormData();
        data.append("vmName", selectedVM);
        $('#vmMemSize').val('');
        request(API('show_vm_memory'), data, function(response) {
            response = JSON.parse(response)["message"];
            $('#vmMemoryArea').html(response);
            //info = "<small id='sitenameHelp' class='form-text text-muted'>{{__('**Değişiklikler bilgisayar tekrar başlatıldıktan sonra güncellenecektir.')}}</small>";


        }, function(response) {
                let error = JSON.parse(response);
                console.log(error.message);
                showSwal(error.message, 'error', 3000);
            });
    }

    function showVmPort(){
        var form = new FormData();
        let name = selectedVM;
        form.append("name", name);
        request(API('vm_port'), form, function(response) {
            response = JSON.parse(response)["message"];

            $('#vmPortArea').html(response);
            }, function(response) {
            let error = JSON.parse(response);
            Swal.close();
            showSwal(error.message, 'error', 3000);
        });
    }

    function closeInfoModal(){
        $("#vmInfoModal").modal('hide');
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
          
            setTimeout(() => {
                getVmData();
            }, 5000);
        }, function(response) {
                let error = JSON.parse(response);
                console.log(error.message);
                showSwal(error.message, 'error', 3000);
            });
    }   

    //masterVmTaskModal
    function createMasterImg(){

        let draftName = document.getElementById("draftName").value;
        let masterName = document.getElementById("masterName").value;

        var data = new FormData();
        data.append("draftName", draftName);
        data.append("masterName", masterName);

        request(API('create_master_image'), data, function(response) {
            let output = JSON.parse(response).message;
            $('#masterImgModal').modal("hide"); 
            showSwal(output, 'success', 3000);
            
           // $("#install").attr("disabled","true");           
           // $('#masterVmTaskModal').modal({backdrop: 'static', keyboard: false})
           // $('#masterVmTaskModal').find('.modal-body').html(output);
           // $('#masterVmTaskModal').modal("show");     
            Swal.close();
            
            setTimeout(function(){
                getVM();
            }, 3000);
            /*
            setTimeout(function(){
                getVmData();
            }, 3000);
              */
          
        }, function(response) {
                let error = JSON.parse(response);
                console.log(error.message);
                showSwal(error.message, 'error', 3000);
            });
    }
    function changeVmMem(){

        let size = document.getElementById("vmMemSize").value;
        var data = new FormData();
        data.append("size", size);
        data.append("vmName", selectedVM);
        console.log('vmName');
        request(API('change_vm_memory_size'), data, function(response) {
            response = JSON.parse(response)["message"];
            showSwal("Başarılı", 'success', 3000);  

        }, function(response) {
                let error = JSON.parse(response);
                console.log(error.message);
                showSwal(error.message, 'error', 3000);
            });
    }

 

    function changeVmCpuSize(){

        let vmCpuSize = document.getElementById("vmCpuSize").value;
        var data = new FormData();
        data.append("vmName", selectedVM);
        data.append("numOfCpu", vmCpuSize);
        request(API('change_num_of_cpu'), data, function(response) {
            response = JSON.parse(response)["message"];
            showSwal("Başarılı", 'success', 3000);  
        }, function(response) {
                let error = JSON.parse(response);
                console.log(error.message);
        showSwal(error.message, 'error', 3000);
        });
    }
</script>


