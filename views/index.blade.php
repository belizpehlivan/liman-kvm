<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="getVM()" href="#vms" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Sanal Makineler") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="listVdi()" href="#vdi" data-toggle="tab">
            <i class="fas fa-desktop"></i> {{ __("VDI") }}
        </a>
    </li>
</ul>

<div class="tab-content" class="tab-pane">
    <div id="vms" class="tab-pane">
        @include('vms.main')
    </div>
    <div id="vdi" class="tab-pane active">
        @include('vdi.main')
    </div>
</div>

