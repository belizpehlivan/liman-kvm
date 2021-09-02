<div class="alert" role="alert" id="confAlert"></div>
<!--<div class="alert alert-danger ldapAlertDisplay" role="alert" display="none"></div>-->

<div id="conf-form">
    <form>
        <label for="ldaphost">Ldap Host</label>
        <input class="form-control" type="text" id="ldaphost" required>
        <br>
        <label for="ldapbasedn">Ldap Basedn</label>
        <input class="form-control" type="text" id="ldapbasedn" required>
        <br>
        <label for="ldapusername">Ldap Username</label>
        <input class="form-control" type="text" id="ldapusername" required>
        <br>
        <label for="ldappassword">Ldap Password</label>
        <input class="form-control" type="password" id="ldappassword" required>
        <br>
        <label for="hostip">Host IP</label>
        <input class="form-control" type="text" id="hostip" required>
        <br>
        <button type="button" class="btn btn-success btn-sm" onclick="updateConf()">Kaydet</button>
    </form>
</div>

@include("configuration.scripts")