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
                checkConf();
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

</script>
