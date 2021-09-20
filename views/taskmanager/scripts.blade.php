<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetServiceStatus(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_service_status') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            console.log(response.message);
            $("#serviceStatusModal").modal("show");
            $("#serviceStatusContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsKillProcess(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('kill_process') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("Başarıyla sonlandırıldı...", "success",2000);
            //location.reload();
        }, function (error) {
            // Başarısızsa
           
        });
    }

    function jsGetCommandArg(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('command_arg') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            console.log(response.message);
            $("#commandArgModal").modal("show");
            $("#commandArgContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetProcessTree(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('process_tree') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            console.log(response.message);
            $("#processTreeModal").modal("show");
            $("#processTreeContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsKillAllProcess(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('killall_process') }}", data, function (response) {
            // Başarılıysa
            Swal.close();
            showSwal("Başarıyla sonlandırıldı...", "success",2000);
            //location.reload();
        }, function (error) {
            // Başarısızsa
           
        });
    }

</script>