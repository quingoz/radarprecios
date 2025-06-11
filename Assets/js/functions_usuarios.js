let tableUsuarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

const base_url = document.getElementById('url').dataset.value;
document.addEventListener('DOMContentLoaded', function(){
    
    tableUsuarios = $('#tableUsuarios').dataTable( { 
        "aProcessing":true,
        "aServerSide":true,
        "language": {           
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": ">",
                "previous": "<"
            },
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros"
        },
        "ajax":{
            "url": " "+base_url+"/Usuarios/getUsuarios",
            "dataSrc":""
        },
        "columns":[
            {"data":"ID"},
            {"data":"ENTERPRISE"},
            {"data":"DESSCRIPCION"},
            {
                "data": "USERTOKEN",
                "render": function(data, type, row) {
                    // Agrega un botón de copiar usando la clase `btnCopyUserToken`
                    const maxLength = 14;
                    if(data == ''){
                        return 'No hay Token';
                    }else{
                        return `<span class="truncate">${data.length > maxLength ? data.substr(0, maxLength) + "..." : data}</span>
                            <button class="btnCopyUserToken btn btn-light p-1 mb-0" 
                            data-clipboard-text="${data}" title="Copiar">
                            <i class="far fa-copy"></i></button>`;
                    }
                    
                }
            },
            {"data":"USERNAME"},
            {
                "data": "URL_WEBVIEW",
                "render": function(data, type, row) {
                    const maxLength = 14;
                    if(data == ''){
                        return 'No hay Url';
                    }else if(data == null){
                        return 'No hay Url';
                    }else{
                        return `<span class="truncate">${data.length > maxLength ? data.substr(0, maxLength) + "..." : data}</span>
                            <button class="btnCopyUserToken btn btn-light p-1 mb-0" 
                            data-clipboard-text="${data}" title="Copiar">
                            <i class="far fa-copy"></i></button>`;
                    }
                    
                }
            },
            {"data":"DASHBOARD"},
            {"data":"STATUS"},
            {"data":"options"}
        ],
        "columnDefs": [
             { "className": "textcenter", "targets": [ 0,1,2,3,4,5,6,7,8] }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 100,
        "order":[[0,"asc"]]  
    });

    new ClipboardJS('.btnCopyUserToken');

    if(document.querySelector("#formUsuario")){
        let formUsuario = document.querySelector("#formUsuario");
        formUsuario.onsubmit = function(e) {
            e.preventDefault();
            //let intIdKpi = document.querySelector('#intIdKpi').value;
            let descripcion = document.querySelector('#descripcion').value;
            let username = document.querySelector('#username').value;
            let password = document.querySelector('#password').value;
            let idEnterprise = document.querySelector('#idEnterprise').value;
            let selectElement = document.querySelector('#idDashboard');
            let idDashboard = Array.from(selectElement.selectedOptions).map(option => option.value);

            if(descripcion == '' || username == '' || password == '' || idEnterprise == '' || idDashboard.length === 0)
            {
                Swal.fire("Atención", "Todos los campos son obligatorios" , "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuarios/setUsuario'; 
            let formData = new FormData(formUsuario);
            request.open("POST",ajaxUrl,true);
            request.send(formData);


            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        divLoading.style.display = "none";
                        $('#modalFormUsuario').modal("hide");
                        formUsuario.reset();
                        Swal.fire("Usuario", objData.msg ,"success");
                        tableUsuarios.api().ajax.reload();
                    }else{
                        Swal.fire("Error", objData.msg , "error");
                    }
                }
                return false;
            }
        }
    }

    if(document.querySelector("#formUsuarioEdit")){
        let formUsuarioEdit = document.querySelector("#formUsuarioEdit");
        formUsuarioEdit.onsubmit = function(e) {
            e.preventDefault();

            let idUsuario = document.querySelector('#idUsuarioEdit').value;
            let descripcion = document.querySelector('#descripcionEdit').value;
            let username = document.querySelector('#usernameEdit').value;
            let password = document.querySelector('#passwordEdit').value;
            let idEnterprise = document.querySelector('#idEnterpriseEdit').value;
            let selectElement = document.querySelector('#idDashboardEdit');
            let idDashboard = Array.from(selectElement.selectedOptions).map(option => option.value);

            if(descripcion == '' || username == '' || idEnterprise == '' || idDashboard.length === 0)
            {
                Swal.fire("Atención", "Todos los campos son obligatorios" , "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuarios/putUserData'; 
            let formData = new FormData(formUsuarioEdit);
            request.open("POST",ajaxUrl,true);
            request.send(formData);


            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        divLoading.style.display = "none";
                        $('#modalFormUsuarioEdit').modal("hide");
                        formUsuarioEdit.reset();
                        Swal.fire("Usuario", objData.msg ,"success");
                        tableUsuarios.api().ajax.reload();
                    }else{
                        Swal.fire("Error", objData.msg , "error");
                    }
                }
                return false;
            }
        }
    }

    if(document.querySelector("#formDataUser")){
        let formDataUser = document.querySelector("#formDataUser");
        formDataUser.onsubmit = function(e) {
            e.preventDefault();
            let strUsername = document.querySelector('#txtUsername').value;
            let intDashboard = document.querySelector('#intDashboard').value;
            let strPassword = document.querySelector('#txtPassword').value;
            let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;
           
            if(strUsername == '' || intDashboard == '' )
            {
                Swal.fire("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            if(strPassword != "" || strPasswordConfirm != "")
            {   
                if( strPassword != strPasswordConfirm ){
                    Swal.fire("Atención", "Las contraseñas no son iguales." , "info");
                    return false;
                }           
                if(strPassword.length < 5 ){
                    Swal.fire("Atención", "La contraseña debe tener un mínimo de 5 caracteres." , "info");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuarios/putDUser'; 
            let formData = new FormData(formDataUser);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState != 4 ) return; 
                if(request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        
                        Swal.fire({
                            title: "Actualización",
                            text: "El Dashboard se ha cambiado de manera exitosa",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                console.log("Confirmación recibida");
                                location.href = base_url + '/home';
                            }
                        });

                    }else{
                        Swal.fire("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

}, false);

function fntEditUsuario(element,idpersona){
    
    rowTable = element.parentNode.parentNode.parentNode; 
    //document.querySelector('#titleModal').innerHTML ="Actualizar Usuario";
    //document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    //document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    //document.querySelector('#btnText').innerHTML ="Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);

            if(objData.status)
            {   
                
                document.querySelector("#idUsuarioEdit").value = objData.data.dataUsuario.ID;
                document.querySelector("#descripcionEdit").value = objData.data.dataUsuario.DESSCRIPCION;
                document.querySelector("#usernameEdit").value = objData.data.dataUsuario.USERNAME;
                document.querySelector("#userTokenEdit").value =objData.data.dataUsuario.USERTOKEN;
                document.querySelector("#urlWebViewEdit").value =objData.data.dataUsuario.URL_WEBVIEW;

                let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                let ajaxUrl = base_url + '/Usuarios/getSelect/'+idpersona; // URL del controlador para obtener los datos

                // Configura la solicitud como GET en lugar de POST
                request.open("GET", ajaxUrl, true);
                request.send(); // No se envía formData en una solicitud GET

                request.onreadystatechange = function() {
                    if(request.readyState == 4 && request.status == 200) {
                        let objData1 = JSON.parse(request.responseText);
                    
                        let dashboardsUsuario = objData1.Dashboard.map(d => d.DASHBOARD_ID);

                        if(objData1) {
                            
                            htmlDashboard = '';
                            htmlEnterprise = '';
                                
                            for (let index = 0; index < objData.data.dataDashboard.length; index++) {

                                let dashboardID = objData.data.dataDashboard[index]['ID_DASHBOARD'];
                                let dashboardDesc = objData.data.dataDashboard[index]['DESCRIPCION'];
                                let isSelected = dashboardsUsuario.includes(dashboardID) ? 'selected' : '';

                                htmlDashboard += '<option ' + isSelected + ' value="' + dashboardID + '">' + dashboardID + ' - ' + dashboardDesc + '</option>';
                            }

                            htmlEnterprise += '<option select value="'+ objData.data.dataUsuario.ID_ENTERPRISE + '">'+ objData.data.dataUsuario.ID_ENTERPRISE +' - ' + objData.data.dataUsuario.NOMBRE_ENTERPRISE +'</option>';
                            for (let index = 0; index < objData1.Enterprise.length; index++) {
                                if(objData.data.dataUsuario.ID_ENTERPRISE != objData1.Enterprise[index]['ID']){
                                    htmlEnterprise += '<option value="'+ objData1.Enterprise[index]['ID'] + '">'+ objData1.Enterprise[index]['ID'] +' - '+ objData1.Enterprise[index]['NOMBRE'] +'</option>';
                                }
                            }
                            document.querySelector('#idDashboardEdit').innerHTML = htmlDashboard;
                            document.querySelector('#idEnterpriseEdit').innerHTML = htmlEnterprise;

                        } else {
                            Swal.fire("Error", objData1.msg, "error");
                        }
                    }
                    return false;
                };


            }
        }
        
        $('#idDashboardEdit').select2({
            placeholder: "Seleccione Dashboard",
            allowClear: true,
            width: '100%' // Asegura que use el 100% del ancho
        });
        $('#modalFormUsuarioEdit').modal('show');
    }
}

function fntDelUsuario(idpersona){
    Swal.fire({
        title: "Cambiar estado de Usuario",
        text: "¿Realmente quiere cambiar el estado del Usuario?",
        icon: "warning", // En SweetAlert2 se usa "icon" en lugar de "type"
        showCancelButton: true,
        confirmButtonText: "Si, Cambiar!",
        cancelButtonText: "No, Cancelar!",
        reverseButtons: true // Opcional, para invertir el orden de los botones
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí va la lógica para hacer la solicitud XMLHttpRequest
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/delUsuario';
            let strData = "idUsuario=" + idpersona;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire("Cambiar!", objData.msg, "success");
                        tableUsuarios.api().ajax.reload();
                    } else {
                        Swal.fire("Atención!", objData.msg, "error");
                    }
                }
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelado", "El estado del usuario no pudo ser actualizado.", "error");
        }
    });

}


function openModal()
{

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Usuarios/getSelectNew'; // URL del controlador para obtener los datos

    // Configura la solicitud como GET en lugar de POST
    request.open("GET", ajaxUrl, true);
    request.send(); // No se envía formData en una solicitud GET

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            console.log('objData', objData);

            if(objData) {
                
                htmlDashboard = '';
                htmlEnterprise = '';

                for (let index = 0; index < objData.Dashboard.length; index++) {
                    htmlDashboard += '<option value="'+ objData.Dashboard[index]['ID_DASHBOARD'] + '">'+  objData.Dashboard[index]['ID_DASHBOARD'] +' - '+ objData.Dashboard[index]['DESCRIPCION'] +'</option>';
                }
                for (let index = 0; index < objData.Enterprise.length; index++) {
                    htmlEnterprise += '<option value="'+ objData.Enterprise[index]['ID'] + '">'+ objData.Enterprise[index]['ID'] +' - '+ objData.Enterprise[index]['NOMBRE'] +'</option>';
                }
                document.querySelector('#idDashboard').innerHTML = htmlDashboard;
                document.querySelector('#idEnterprise').innerHTML = htmlEnterprise;

            } else {
                Swal.fire("Error", objData.msg, "error");
            }
        }
        return false;
    };
    $('#idDashboard').select2({
        placeholder: "Seleccione Dashboard",
        allowClear: true,
        width: '100%' // Asegura que use el 100% del ancho
    });
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}

function generateToken(){

    function random() {
    return Math.random().toString(36).substr(2); // Eliminar `0.`
    };
 
    function token() {
    return random() +random()+'-'+ random()+random() +'-'+ random()+random() +'-'+ random()+random();
    };
 
    document.querySelector('#userToken').value =token();
    document.querySelector('#userTokenEdit').value =token();
}