@component("modal-component", [
    "id" => "machineInfoModal",
    "title" => "CPU Bilgileri",
    "footer" => 
            [
                "class" => "btn-success",
                "onclick" => "closeInfoModal()",
                "text" => "Kapat"
            ]
    ])    
    <div class="table-responsive" id="cpuInfoTable"></div>
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
            