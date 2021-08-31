@component("modal-component", [
    "id" => "vmInfoModal",
    "title" => "CPU Bilgileri",
    "footer" => 
            [
                "class" => "btn-success",
                "onclick" => "closeInfoModal()",
                "text" => "Kapat"
            ]
    ])    
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" onclick="cpuInfo()" id="v-pills-cpuInfo-tab" data-toggle="pill" href="#v-pills-cpuInfo" role="tab" aria-controls="v-pills-cpuInfo" aria-selected="true">
                {{__('Cpu Bilgileri')}}</a>
                <a class="nav-link" onclick="diskSize()" id="v-pills-diskSize-tab" data-toggle="pill" href="#v-pills-diskSize" role="tab" aria-controls="v-pills-diskSize" aria-selected="false">
                {{__('Disk Boyutu')}}</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-cpuInfo" role="tabpanel" aria-labelledby="v-pills-cpuInfo-tab">
                    <div class="table-responsive" id="cpuInfoTable"></div>
                </div>
                <div class="tab-pane fade" id="v-pills-diskSize" role="tabpanel" aria-labelledby="v-pills-diskSize-tab">
                        <div class="table-responsive" id="diskSizeTable"></div>
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
                <div class="form-group">
                    <label for="vmLocation">{{__('Location')}}</label>
                    <input class="form-control" id="vmLocation">
                </div>
            </form>
 @endcomponent

<div class="table-responsive" id="vmsTable"></div>

@include("vms.scripts")
            