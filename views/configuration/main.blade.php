@component('modal-component',[
                "id" => "configurationModal",
                "title" => "Lütfen alanları doldurunuz",
                "footer" => 
            [
                "class" => "btn-success",
                "onclick" => "saveConfiguration()",
                "text" => "Oluştur"
            ]
                
            ]) 

        <form>
            <div class="form-group">
                <label for="ldap-host">Ldap Host</label>
                <input type="text" class="form-control" id="ldap-host">
            </div>
            <div class="form-group">
                <label for="ldap-basedn">Ldap Basedn</label>
                <input type="text" class="form-control" id="ldap-basedn">
            </div>
            <div class="form-group">
                <label for="ldap-username">Ldap Username</label>
                <input type="text" class="form-control" id="ldap-username" >
            </div>
            <div class="form-group">
                <label for="ldap-password">Ldap Password</label>
                <input type="password" class="form-control" id="ldap-password">
            </div>
            <div class="form-group">
                <label for="host-ip">Host IP</label>
                <input type="text" class="form-control" id="host-ip">
            </div>
        </form>
@endcomponent


@include("configuration.scripts")