
@include("modal-button", [
    "text" => "Yeni Crontab Ekle",
    "class" => "btn-primary",
    "target_id" => "crontabAddModal"
])
<button type="button" class="btn btn-primary" onclick="jsRemoveCrontab()">Crontab Temizle</button>
<div class="mb-3"></div>
<div id="cron_list"></div>

@component("modal-component", [
    "id" => "crontabAddModal",
    "title" => "Crontab Ekle",
    "notSized" => true,
    "footer" => [
        "class" => "btn-danger",
        "onclick" => "jsAddCrontab()",
        "text" => "Ekle"
    ]
])    
    <input type="text" name="minute" id="minute_field" class="form-control">
    <small>Dakika giriniz.</small>

    <div class="mb-3"></div>
    
    <input type="text" name="hour" id="hour_field" class="form-control">
    <small>Saat giriniz.</small>

    <div class="mb-3"></div>

    <input type="text" name="day" id="day_field" class="form-control">
    <small>Gün giriniz.</small>

    <div class="mb-3"></div>
    
    <input type="text" name="month" id="month_field" class="form-control">
    <small>Ay giriniz.</small>

    <div class="mb-3"></div>
    
    <input type="text" name="weekday" id="weekday_field" class="form-control">
    <small>Haftanın gününü giriniz.</small>

    <div class="mb-3"></div>
    
    <input type="text" name="command" id="command_field" class="form-control">
    <small>Komutu giriniz.</small>
@endcomponent



@include("crontab.scripts")