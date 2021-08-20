<form>
    <div class="form-group">
        <label for="name">{{__('Name')}}</label>
        <input class="form-control" id="name" >
    </div>        
    <div class="form-group">
        <label for="username">{{__('Username')}}</label>
        <input class="form-control" id="username" >
    </div>        
<button class="btn btn-success" onclick="assignVDI()" >{{__('Oluştur')}}</button>

@include('vdi.scripts')