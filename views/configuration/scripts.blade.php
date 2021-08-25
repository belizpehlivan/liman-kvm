<script>
    function checkConfiguration(){
        var form = new FormData();

        request(API('check_configuration'), form, function(response) {
            data = JSON.parse(response)["message"];

            if(data == "create"){ 
                $("#confAlert").addClass("alert-danger");
                $("#confAlert").html("Konfigürasyon dosyasını oluşturmak için formu doldurunuz!");
            }
            else {   
                //datadan gelenleri koy
                $("#confAlert").removeClass("alert-danger");
                $("#confAlert").addClass("alert-success");        
                $("#confAlert").html("Konfigürasyon dosyasının içeriğini aşağıdan görebilir ve güncelleyebilirsiniz.");
                
                $('#ldaphost').val(data[0]);
                $('#ldapbasedn').val(data[1]);
                $('#ldapusername').val(data[2]);
                $('#ldappassword').val(data[3]);
                $('#hostip').val(data[4]);
            }
        }, function(response) {
            let error = JSON.parse(response);
            showSwal(error.message, 'error', 3000);
        });
        
    }

    function updateConf(){

        let send = true;
        $("#conf-form").find('input').each(function(index, element){
            if ($(this).val() == "") 
                send = false;
            })

        if(send){
            var form = new FormData();
            form.append("ldaphost",$('#ldaphost').val());
            form.append("ldapbasedn",$('#ldapbasedn').val());
            form.append("ldapusername",$('#ldapusername').val());  
            form.append("ldappassword",$('#ldappassword').val());
            form.append("hostip",$('#hostip').val());

            request(API('update_configuration_file'), form, function(response) {
                message = JSON.parse(response)["message"];
                checkConfiguration();
                }, function(response) {
                    let error = JSON.parse(response);
                    showSwal(error.message, 'error', 3000);
            });
        }
        else{
            showSwal("Lütfen Boş Alanları Doldurunuz!", 'error', 2000);
            return;
        }
  
    }

    /*
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
*/

</script>