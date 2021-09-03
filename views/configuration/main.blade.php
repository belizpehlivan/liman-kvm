<!--<div class="alert alert-danger ldapAlertDisplay" role="alert" display="none"></div>-->
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">
                <div class="alert" role="alert" id="confAlert"></div>
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
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <label style="font-size:15px;">Node Info</label>
                <pre id="nodeInfo"></pre>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <label style="font-size:15px;">Disk Info</label>
                <pre id="diskInfo"></pre>
            </div>
        </div>
    </div>
</div>
@include("configuration.scripts")