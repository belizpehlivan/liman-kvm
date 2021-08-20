<script>
    function assignVDI(){

        let name = document.getElementById("name").value;
        let username = document.getElementById("username").value;
        let ip = "{{extensionDb('pardus3IP')}}"
        
        var form = new FormData();
        form.append("name", name);
        form.append("username", username);
        form.append("ip", ip);

        request(API('assign_vdi'), form, function(response) {
            message = JSON.parse(response)["message"];
            console.log(message);
            }, function(response) {
                let error = JSON.parse(response);
                showSwal(error.message, 'error', 3000);
            });
    }
</script>