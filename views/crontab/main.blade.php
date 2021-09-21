
@include("modal-button", [
    "text" => "Yeni Crontab Ekle",
    "class" => "btn-primary",
    "target_id" => "crontabAddModal"
])
<button type="button" class="btn btn-danger" onclick="jsRemoveCrontab()">{{ __("Crontab Temizle") }}</button>
<div class="mb-3"></div>
<div id="cron_list"></div>

@component("modal-component", [
    "id" => "crontabAddModal",
    "title" => "Crontab Ekle",
    "notSized" => true,
    "footer" => [
        "class" => "btn-success",
        "onclick" => "jsAddCrontab()",
        "text" => "Ekle"
    ]
])    
    <input type="text" name="minute" id="minute_field" class="form-control">
    <small>{{ __("Dakika giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="hour" id="hour_field" class="form-control">
    <small>{{ __("Saat giriniz.") }}</small>

    <div class="mb-3"></div>

    <input type="text" name="day" id="day_field" class="form-control">
    <small>{{ __("Gün giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="month" id="month_field" class="form-control">
    <small>{{ __("Ay giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="weekday" id="weekday_field" class="form-control">
    <small>{{ __("Haftanın gününü giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="command" id="command_field" class="form-control">
    <small>{{ __("Komutu giriniz.") }}</small>
@endcomponent

@component("modal-component", [
    "id" => "crontabUpdateModal",
    "title" => "Crontab Güncelle",
    "notSized" => true,
    "footer" => [
        "class" => "btn-success",
        "onclick" => "jsBtnUpdateCrontab()",
        "text" => "Güncelle"
    ]
])    
    <input type="text" name="minute" id="minute_field" class="form-control">
    <small>{{ __("Dakika giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="hour" id="hour_field" class="form-control">
    <small>{{ __("Saat giriniz.") }}</small>

    <div class="mb-3"></div>

    <input type="text" name="day" id="day_field" class="form-control">
    <small>{{ __("Gün giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="month" id="month_field" class="form-control">
    <small>{{ __("Ay giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="weekday" id="weekday_field" class="form-control">
    <small>{{ __("Haftanın gününü giriniz.") }}</small>

    <div class="mb-3"></div>
    
    <input type="text" name="command" id="command_field" class="form-control">
    <small>{{ __("Komutu giriniz.") }}</small>
@endcomponent



@include("crontab.scripts")