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


</script>