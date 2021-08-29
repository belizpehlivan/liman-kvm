<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="checkConfiguration()" href="#configuration" data-toggle="tab">   <!--aria-controls="v-pills-updates" aria-selected="false"-->
            <i class="fas fa-tasks"></i> {{ __("Konfigürasyon") }}
        </a>
    </li>
    <li class="nav-item gizli">
        <a class="nav-link" onclick="getVM()" href="#vms" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Sanal Makineler") }}
        </a>
    </li>
    <li class="nav-item gizli">
        <a class="nav-link" onclick="listVdi()" href="#vdi" data-toggle="tab">
            <i class="fas fa-desktop"></i> {{ __("VDI") }}
        </a>
    </li>
</ul>

<div class="tab-content">
    <div id="configuration" class="tab-pane active">
        @include('configuration.main')
    </div>
    <div id="vms" class="tab-pane">
        @include('vms.main')
    </div>
    <div id="vdi" class="tab-pane">
        
        @include('vdi.main')
    </div>
</div>

<script>
    if (location.hash ==="") {
        checkConfiguration();

    }

    $(document).ready(function(){
      checkConf();
      ldapCheck();
      return;
    });

    function checkConf(){

        var form = new FormData();
        request(API('check_conf'), form, function(response) {
            response = JSON.parse(response)["message"];
            console.log(response);
            if(response == "false")
               {
                $(".gizli").css("display", "none");  
               }
               else{
                $(".gizli").css("display", "block");  
               }
            }, function(response) {
                    let error = JSON.parse(response);
                    showSwal(error.message, 'error', 3000);
        });
    }
    function ldapCheck()
    {
        var form = new FormData();

        request(API('ldap_check'), form, function(response) {
            }, function(response) {
                showSwal(response, 'success', 3000);
               // let error = JSON.parse(response);
               // showSwal(error.message, 'error', 3000);
                let error = JSON.parse(response)["message"];
                showSwal(error, 'error', 3000);
            });
    }

</script>
