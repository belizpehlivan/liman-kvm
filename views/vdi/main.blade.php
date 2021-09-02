<!--<div class="alert alert-danger ldapAlertDisplay" role="alert"  display="none"></div>-->
@include('modal-button', [
                    "class" => "btn btn-success mb-2",
                    "target_id" => "assignVdiModal",
                    "text" => "VDI Ata"             
        ])

@component('modal-component',[
                "id" => "assignVdiModal",
                "title" => "",
                "footer" => 
                [
                    "class" => "btn-success",
                    "onclick" => "assignVdi()",
                    "text" => "Kaydet"
                ]
            ]) 
            <form>
                <div class="form-group">
                    <label for="name">{{__('VM İsmi')}}</label>
                    <select id="select2"></select>
                    
                </div>       
              
                <div class="form-group">
                    <label for="username">{{__('Kullanıcı Adı')}}</label>
                    <input class="form-control" id="username" >
                </div>               
            </form>
 @endcomponent
@component('modal-component',[
                "id" => "editVdiModal",
                "title" => "",
                "footer" => 
                [
                    "class" => "btn-success",
                    "onclick" => "editVdi()",
                    "text" => "Kaydet"
                ]    
            ]) 
            <form>
                <div class="form-group">
                    <label for="new_name">{{__('VM İsmi')}}</label>
                    <input class="form-control" id="new_name">
                </div>        
                <div class="form-group">
                    <label for="new_username">{{__('Kullanıcı Adı')}}</label>
                    <input class="form-control" id="new_username">
                </div>               
            </form>
 @endcomponent
<div class="table-responsive" id="vdiTable"></div>

@include('vdi.scripts')