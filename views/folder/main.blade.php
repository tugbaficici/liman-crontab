@include("modal-button", [
    "text" => "Yeni Dosya Oluştur",
    "class" => "btn-primary",
    "target_id" => "fileModal"
])

@include("modal-button", [
    "text" => "Yeni Klasör Oluştur",
    "class" => "btn-primary",
    "target_id" => "folderModal"
])

@component("modal-component", [
    "id" => "fileModal",
    "title" => "Dosya Oluştur",
    "notSized" => true,
    "footer" => [
        "class" => "btn-danger",
        "onclick" => "jsCreateFile()",
        "text" => "Oluştur"
    ]
])    
    <input type="text" name="fileName_field" id="fileName_field" class="form-control">
    <small>{{__("Dosya İsmi")}}</small>  
@endcomponent

@component("modal-component", [
    "id" => "folderModal",
    "title" => "Klasör Oluştur",
    "notSized" => true,
    "footer" => [
        "class" => "btn-danger",
        "onclick" => "jsCreateFolder()",
        "text" => "Oluştur"
    ]
])    
    <input type="text" name="folderName_field" id="folderName_field" class="form-control">
    <small>{{__("Klasör İsmi")}}</small>  
@endcomponent

<div id="folder_list"></div>


@include("folder.scripts")