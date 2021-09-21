<script>
    function crontabManager()
    {
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        request("{{ API('get_crontab_list') }}", data, function (response) {
           
            console.log(response);
            $("#cron_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            
            console.log(error);
        });
    }

    function jsAddCrontab() {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();

        data.append("minute", $("#crontabAddModal").find("#minute_field").val());
        data.append("hour", $("#crontabAddModal").find("#hour_field").val());
        data.append("day", $("#crontabAddModal").find("#day_field").val());
        data.append("month", $("#crontabAddModal").find("#month_field").val());
        data.append("weekday", $("#crontabAddModal").find("#weekday_field").val());
        data.append("command", $("#crontabAddModal").find("#command_field").val());

        request("{{API('add_crontab')}}", data, function(response){
           
            $("#crontabAddModal").modal("hide");
            
            Swal.close();
            
            $("#crontabAddModal").find("input").val("");
            response = JSON.parse(response);
            
            showSwal(response.message, 'success', 2500);
            crontabManager();
        }, function(error){
            error = JSON.parse(error);
            showSwal(error.message, 'error');
        });
    }
    function jsRemoveCrontab(){
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        request("{{ API('remove_crontab') }}", data, function (response) {
           
            console.log(response);
            Swal.close();
            showSwal("Başarıyla sonlandırıldı...", 'success', 2500);
            crontabManager();
        }, function (error) {
           
            console.log(error);
        });
    }

    function jsDeleteCrontab(node){
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        
        data.append("minute", $(node).find("#minute").html());
        data.append("hour", $(node).find("#hour").html());
        data.append("day", $(node).find("#day").html());
        data.append("month", $(node).find("#month").html());
        data.append("weekday", $(node).find("#weekdays").html());
        data.append("command", $(node).find("#command").html());

        request("{{ API('delete_crontab') }}", data, function (response) {
            Swal.close();
            showSwal("Başarıyla sonlandırıldı...", "success",2000);
            crontabManager();
        }, function (error) {
            
            console.log(error);
        });

    }
    var oldUpdateValues=[];
    function jsUpdateCrontab(node){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        $("#crontabUpdateModal").modal("show");
        $("#crontabUpdateModal").find("#minute_field").val($(node).find("#minute").html());
        $("#crontabUpdateModal").find("#hour_field").val($(node).find("#hour").html());
        $("#crontabUpdateModal").find("#day_field").val($(node).find("#day").html());
        $("#crontabUpdateModal").find("#month_field").val($(node).find("#month").html());
        $("#crontabUpdateModal").find("#weekday_field").val($(node).find("#weekdays").html());
        $("#crontabUpdateModal").find("#command_field").val($(node).find("#command").html());
        oldUpdateValues.push($(node).find("#minute").html());
        oldUpdateValues.push($(node).find("#hour").html());
        oldUpdateValues.push($(node).find("#day").html());
        oldUpdateValues.push($(node).find("#month").html());
        oldUpdateValues.push($(node).find("#weekdays").html());
        oldUpdateValues.push($(node).find("#command").html());
        


        
    }
    function jsBtnUpdateCrontab(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        data.append("minute", $("#crontabUpdateModal").find("#minute_field").val());
        data.append("hour", $("#crontabUpdateModal").find("#hour_field").val());
        data.append("day", $("#crontabUpdateModal").find("#day_field").val());
        data.append("month", $("#crontabUpdateModal").find("#month_field").val());
        data.append("weekday", $("#crontabUpdateModal").find("#weekday_field").val());
        data.append("command", $("#crontabUpdateModal").find("#command_field").val());

        data.append("oldminute", oldUpdateValues[0]);
        data.append("oldhour", oldUpdateValues[1]);
        data.append("oldday", oldUpdateValues[2]);
        data.append("oldmonth", oldUpdateValues[3]);
        data.append("oldweekday", oldUpdateValues[4]);
        data.append("oldcommand", oldUpdateValues[5]);

        request("{{API('update_crontab')}}", data, function(response){
           
            $("#crontabUpdateModal").modal("hide");
            
            Swal.close();
            
            $("#crontabAddModal").find("input").val("");
            response = JSON.parse(response);
            
            showSwal(response.message, 'success', 2500);
            crontabManager();
        }, function(error){
            error = JSON.parse(error);
            showSwal(error.message, 'error');
        });
    }


</script>