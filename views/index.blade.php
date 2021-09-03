<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="confFunctions()" href="#configuration" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Konfigürasyon") }}
        </a>
    </li>
    <li class="nav-item gizli">
        <a class="nav-link" onclick="getVM();" href="#vms" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Sanal Makineler") }}
        </a>
    </li>
    <li class="nav-item gizli">
        <a class="nav-link" onclick="listVdi();" href="#vdi" data-toggle="tab">
            <i class="fas fa-desktop"></i> {{ __("VDI") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="listImages();" href="#images" data-toggle="tab">
            <i class="fas fa-desktop"></i> {{ __("Images") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="listIsos();" href="#isos" data-toggle="tab">
            <i class="fas fa-desktop"></i> {{ __("Iso Dosyaları") }}
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
    <div id="images" class="tab-pane">
        
        @include('images.main')
    </div>
    <div id="isos" class="tab-pane">
        
        @include('isos.main')
    </div>
</div>

<script>

    if (location.hash ==="") {
        confFunctions();
    }

    function ldapCheck()
    {
        var form = new FormData();
        $(".ldapAlertDisplay").css("display", "none");

        request(API('ldap_check'), form, function(response) {
            $(".ldapAlertDisplay").css("display", "none");
            return true;
        }, function(response) {

            let error = JSON.parse(response)["message"];
            console.log(response);
            showSwal(error, 'error', 3000); 
            $(".ldapAlertDisplay").css("display", "block"); 

            if(!error.includes("Ldap"))
                $(".ldapAlertDisplay").html("Sunucu Bağlantılarınızı Kontrol Ediniz");
            else  
                $(".ldapAlertDisplay").html("Ldap Bağlantınızı Kontrol Ediniz");
            return false;
        });
    }

</script>
