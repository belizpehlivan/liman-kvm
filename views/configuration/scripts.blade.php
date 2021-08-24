<script>
    function checkConfiguration(){
        var form = new FormData();

        request(API('check_configuration'), form, function(response) {
            message = JSON.parse(response)["message"];
            console.log(message);

            if(message == "not exists"){
                info = '<div class="alert alert-danger" role="alert">{{__("Konfigürasyon Dosyası Mevcut Değil ! Oluşturmak için butona tıklayınız.")}}</div>' 
                +'<button class="btn btn-danger mb-2" id="editConfBtn" style="float:left;margin-left:10px;visibility:hidden;"></button>';
                $('#configuration').append(info);
                let confButton = document.getElementById("editConfBtn");
                confButton.onclick = function() {editConfigurationFile();};
                confButton.innerText = '{{__("Oluştur")}}';
                confButton.style.visibility = "visible";
            }
            else {   
                info = '<div class="alert alert-success" role="alert" id="confAlert">Konfigürasyon Dosyasının İçeriğini Aşağıdan Görebilirsiniz</div>' +'<div class="card">'+'<div class="card-body">'+'<pre id="configurationFile"></pre>'+'</div>'+'</div>';               
                $('#configuration').html(info);
                $('#configurationFile').html(message);

                $('#ldaphost').val();
                $('#ldapbasedn').val();
                $('#ldapusername').val();
                $('#ldappassword').val();
                $('#hostip').val();

                $('#conf-content').css("visibility", "visible");
            }
           
            
        }, function(response) {
            let error = JSON.parse(response);
            showSwal(error.message, 'error', 3000);
        });
        
    }

    function updateConf(){

        $('#ldaphost').val();
        $('#ldapbasedn').val();
        $('#ldapusername').val();
        $('#ldappassword').val();
        $('#hostip').val();
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