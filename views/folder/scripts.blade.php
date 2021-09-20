<script>
    function folderManager()
    {
        showSwal("Yükleniyor...", "info");
        let data = new FormData();

        request("{{ API('get_folder_list') }}", data, function (response) {
            $("#folder_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsDeleteFile(node){
        showSwal("Yükleniyor...", "info");
        let data = new FormData();
        
        data.append("name", $(node).find("#name").html());
        request("{{ API('delete_file') }}", data, function (response) {
            
            showSwal("Başarıyla sonlandırıldı...", "success",2000);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });

    }
    function jsCreateFile(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
    
        data.append("fileName", $("#fileModal").find("#fileName_field").val());
        request("{{ API('create_file') }}", data, function (response) {            
            showSwal("Başarıyla sonlandırıldı...", "success",2000);
            Swal.close();
            $("#fileModal").modal("hide");
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });

    }
    function jsCreateFolder(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
    
        data.append("folderName", $("#folderModal").find("#folderName_field").val());
        console.log($("#folderModal").find("#folderName_field").val());
        request("{{ API('create_folder') }}", data, function (response) {            
            showSwal("{{__('Başarıyla sonlandırıldı...')}}", "success",2000);
            Swal.close();
            $("#folderModal").modal("hide");
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }


</script>