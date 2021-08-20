<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link" onclick="getVM()" href="#vms" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Sanal Makineler") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#vdi" data-toggle="tab">
            <i class="fas fa-desktop"></i> {{ __("VDI Ekle") }}
        </a>
    </li>
</ul>

<div class="tab-content">
    <div id="vms" class="tab-pane">
        @include('vms.main')
    </div>
    <div id="vdi" class="tab-pane">
        @include('vdi.main')
    </div>
</div>