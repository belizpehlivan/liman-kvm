<script>
    function checkConfiguration(){
        var form = new FormData();

        request(API('check_configuration'), form, function(response) {
            message = JSON.parse(response)["message"];
            console.log(message);

            if(message == "not exists"){
                info = '<div class="alert alert-danger" role="alert">{{__("Konfigürasyon Dosyası Mevcut Değil ! Oluşturmak için butona tıklayınız.")}}</div>' 
                +'<button class="btn btn-danger mb-2" id="editConfBtn" style="float:left;margin-left:10px;visibility:hidden;"></button>' 
                + '</br></br><pre id="editConf"></pre>';
                $('#configuration').append(info);
                let updateButton = document.getElementById("editConfBtn");
                updateButton.onclick = function() {editConfigurationFile();};
                updateButton.innerText = '{{__("Oluştur")}}';
                updateButton.style.visibility = "visible";
            }
            else {
               // $('#confAlert').html("Konfigürasyon Dosyasının İçeriğini Aşağıdan Görebilirsiniz");
                //konfigürasyon dosyasını basacak script fonksyionu çağır
                info = '<div class="alert alert-success" role="alert" id="confAlert">Konfigürasyon Dosyasının İçeriğini Aşağıdan Görebilirsiniz</div>' +'<div class="card">'+'<div class="card-body">'+'<pre id="configurationFile"></pre>'+'</div>'+'</div>';
                $('#configuration').html(info);
                $('#configurationFile').html(message);
            }
           
            
        }, function(response) {
            let error = JSON.parse(response);
            showSwal(error.message, 'error', 3000);
        });
        
    }

    function editConfigurationFile(){

        $('#configurationModal').modal('show');
    }

    function saveConfiguration(){
        let ldap_host = document.getElementById("ldap-host").value;
        let ldap_basedn = document.getElementById("ldap-basedn").value;
        let ldap_username = document.getElementById("ldap-username").value;
        let ldap_password = document.getElementById("ldap-password").value;
        let host_ip = document.getElementById("host-ip").value;

        var form = new FormData();

        form.append("ldap-host",ldap_host);
        form.append("ldap-basedn",ldap_basedn);
        form.append("ldap-username",ldap_username);  
        form.append("ldap-password",ldap_password);
        form.append("host-ip",host_ip);


        request(API('edit_configuration_file'), form, function(response) {
            message = JSON.parse(response)["message"];
            console.log(message);
            $('#configurationModal').modal('hide');
            checkConfiguration();
            }, function(response) {
                let error = JSON.parse(response);
                showSwal(error.message, 'error', 3000);
            });
    }


</script>