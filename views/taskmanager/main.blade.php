<div id="task_list"></div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<div id="fileLocationContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "serviceStatusModal",
    "title" => "Servis Durumu",
    "notSized" => "true"
])
<pre id="serviceStatusContent" style="background-color: black; border-radius: 5px; font-size: 12px; color: white;"></pre>
@endcomponent

@component("modal-component", [
    "id" => "processTreeModal",
    "title" => "Servis Durumu",
    "notSized" => "true"
])
<pre id="processTreeContent" style="background-color: black; border-radius: 5px; font-size: 12px; color: white;"></pre>
@endcomponent

@component("modal-component", [
    "id" => "commandArgModal",
    "title" => "Komut",
    "notSized" => "true"
])
<div id="commandArgContent"></div>
@endcomponent


@include("taskmanager.scripts")