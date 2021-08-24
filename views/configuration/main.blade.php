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

<form id='conf-content'>
  <label for="ldaphost">Ldap Host</label>
  <input class="form-control" type="text" id="ldaphost" name="fav_language" value="">
  <br>
  <label for="ldapbasedn">Ldap Basedn</label>
  <input class="form-control" type="text" id="ldapbasedn" name="fav_language" value="">
  <br>
  <label for="ldapusername">Ldap Username</label>
  <input class="form-control" type="text" id="ldapusername" name="fav_language" value="">
  <br>
  <label for="ldappassword">Ldap Password</label>
  <input class="form-control" type="text" id="ldappassword" name="fav_language" value="">
  <br>
  <label for="hostip">Host IP</label>
  <input class="form-control" type="text" id="hostip" name="fav_language" value="">
  <br>
  <input type="submit" onclick="updateConf()" value="Güncelle">
</form>


@include("configuration.scripts")