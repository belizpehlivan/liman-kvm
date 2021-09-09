@component("modal-component", [
    "id" => "vmInfoModal",
    "title" => "Makine Bilgileri",
    "footer" => 
            [
                "class" => "btn-success",
                "onclick" => "closeInfoModal()",
                "text" => "Kapat"
            ]
    ])    
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills vmtabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" onclick="cpuInfo()" id="v-pills-cpuInfo-tab" data-toggle="pill" href="#v-pills-cpuInfo" role="tab" aria-controls="v-pills-cpuInfo" aria-selected="true">
                {{__('Cpu Bilgileri')}}</a>
                <a class="nav-link" onclick="showVmDiskSize()" id="v-pills-diskSize-tab" data-toggle="pill" href="#v-pills-diskSize" role="tab" aria-controls="v-pills-diskSize" aria-selected="false">
                {{__('Disk Boyutu')}}</a>
                <a class="nav-link"  onclick="showVmMemory()" id="v-pills-vmMemory-tab" data-toggle="pill" href="#v-pills-vmMemory" role="tab" aria-controls="v-pills-vmMemory" aria-selected="false">
                {{__('Memory')}}</a>
                <a class="nav-link"  onclick="showVmPort()" id="v-pills-vmPort-tab" data-toggle="pill" href="#v-pills-vmPort" role="tab" aria-controls="v-pills-vmPort" aria-selected="false">
                {{__('Port')}}</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-cpuInfo" role="tabpanel" aria-labelledby="v-pills-cpuInfo-tab">
                    <div class="table-responsive" id="cpuInfoTable"></div>
                    <form>
                        <div class="form-group">
                            <label for="vmCpuSize">{{__('Change Cpu Core')}}</label>
                            <input class="form-control" id="vmCpuSize">
                            <small id='memoryChangeNotification' class='form-text text-muted'>{{__('**Değişiklikler bilgisayar tekrar başlatıldıktan sonra güncellenecektir.')}}</small>
                        </div>
                        <button class="btn btn-primary" onclick="changeVmCpuSize()" >{{__("Güncelle")}}</button>
                        <script type="module" src="main.js"></script>        </form>
                </div>
                <div class="tab-pane fade" id="v-pills-diskSize" role="tabpanel" aria-labelledby="v-pills-diskSize-tab">
                        <div class="table-responsive" id="diskSizeTable"></div>
                </div>
                <div class="tab-pane fade" id="v-pills-vmMemory" role="tabpanel" aria-labelledby="v-pills-vmMemory-tab">
                    <form>
                        <label for="vmMemoryArea">{{__('Actual Size:')}}</label>
                        <p id="vmMemoryArea"></p>
                        <div class="form-group">
                            <label for="vmMemSize">{{__('Change Memory Size')}}</label>
                            <input class="form-control" id="vmMemSize">
                            <small id='memoryChangeNotification' class='form-text text-muted'>{{__('**Değişiklikler bilgisayar tekrar başlatıldıktan sonra güncellenecektir.')}}</small>
                        </div>
                        <button class="btn btn-primary" onclick="changeVmMem()" >{{__("Güncelle")}}</button>
                    </form>
                    
                </div>
                <div class="tab-pane fade" id="v-pills-vmPort" role="tabpanel" aria-labelledby="v-pills-vmPort-tab">
                    <form>
                        <label for="vmPortArea">{{__('Port:')}}</label>
                        <p id="vmPortArea"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcomponent

@include('modal-button', [
                    "class" => "btn btn-success mb-2",
                    "target_id" => "createVMModal",
                    "text" => "Yeni"
        ])

@component('modal-component',[
                "id" => "createVMModal",
                "title" => "Lütfen oluşturmak istediğiniz makinenin bilgilerini giriniz",
                "footer" => 
            [
                "class" => "btn-success",
                "onclick" => "createVM()",
                "text" => "Oluştur"
            ]
                
            ]) 
       
            <form>
                <div class="form-group">
                    <label for="vmTitle">{{__('Title')}}</label>
                    <input class="form-control" id="vmTitle" >
                </div>
                <script type="module" src="main.js"></script>    <div class="form-group">
                    <label for="vmLocation">{{__('Location')}}</label>
                    <input class="form-control" id="vmLocation">
                </div>
            </form>
 @endcomponent

 @include('modal-button', [
                    "class" => "btn btn-success mb-2",
                    "target_id" => "masterImgModal",
                    "text" => "Master Image Oluştur"
        ])

@component('modal-component',[
                "id" => "masterImgModal",
                "title" => "Lütfen oluşturmak istediğiniz makinenin bilgilerini giriniz",
                "footer" => 
            [
                "class" => "btn-success",
                "onclick" => "createMasterImg()",
                "text" => "Oluştur"
            ]
                
            ]) 
       
            <form>
                <div class="form-group">
                    <label for="draftName">{{__('Draft Name')}}</label>
                    <input class="form-control" id="draftName" >
                </div>
                <div class="form-group">
                    <label for="masterName">{{__('Master Image Name')}}</label>
                    <input class="form-control" id="masterName">
                </div>
            </form>
 @endcomponent

 @component('modal-component',[
        "id" => "masterVmTaskModal",
        "title" => "Oluşturuluyor",
    ])
@endcomponent


<div class="table-responsive" id="vmsTable"></div>

@include("vms.scripts")

            