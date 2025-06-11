let tabla;
var url_p1 = '';

document.addEventListener('DOMContentLoaded', function() {


    /*=============== RECUPERAR FILTROS Y VALORES ACTIVOS ===================*/
    var guardados = localStorage.getItem('datosFormulario');

    if (guardados) {
        guardados = JSON.parse(guardados);

        // LLENA LOS CAMPOS CON LOS VALORES QUE SE HABIAN SELECCIONADO
        $.each(guardados, function(key, value) {
            $('[name="' + key + '"]').val(value);
        });
        // DESACTIVA LOS FILTROS QUE NO SE ESTABAN USANDO
        $('.class-kpi').each(function(index) {
            let atributo = $(this).find(':selected').data('atributo');
            let condition_filter_inherited = atributo ? atributo.split(',') : [];
            $(condition_filter_inherited).each(function(index, value) {
                $(".filter-" + value + "").prop('disabled', true);
            });
        });
    }

    $('.js-example-basic-multiple').select2();
    /*=============== RECUPERAR FILTROS Y VALORES ACTIVOS ===================*/

    /*=============== EVENTO QUE OBTIENE LOS VALORES DE LOS FILTROS Y LOS PROCESA ===================*/
    formData = $('#btn-filter').on('click', function(e) {
        
        
        e.preventDefault();
        let com = 0;
        let datos = {};
        let pro = {};
        let new_url = '';
        
        let kpi = document.getElementById('KPI').value; // Usar document.getElementById
        
        localStorage.setItem('datosFormulario', null);
        url_p1 = '';

        $('.form-filter-date').each(function(index) {
            if (index > 0) {
                url_p1 += ' AND ';
            }
            if ($(this).val() != '') {
                url_p1 += $(this).attr('name') + "='" + $(this).val() + "'";
            }
            
        });
        
        $('.js-example-basic-multiple').each(function(index) {
            if ($(this).val() != '') {
                url_p1 += ' AND ' + $(this).attr('name') + " RLIKE '" + $(this).val() + "'";
                url_p1 = url_p1.replace(/,/g, '|');
            }
            com += 1;
        });

        $('#form-filter :input').each(function() {
            if ($(this).attr('name') != undefined) {
                datos[$(this).attr('name')] = $(this).val();
            }
        });

        localStorage.setItem('datosFormulario', JSON.stringify(datos));
        
        const rutaUrl = document.getElementById('rutaUrl').getAttribute('data-value');

        new_url = rutaUrl + '/tabla/kpi/' + kpi + '?where=' + url_p1;

        console.log(url_p1);
        console.log(new_url);

        window.location.href = new_url;
    });
    /*=============== EVENTO QUE OBTIENE LOS VALORES DE LOS FILTROS Y LOS PROCESA ===================*/

    const validateUserToken = document.getElementById('validateUserToken').getAttribute('data-value');
    let buttons = [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr": "Copiar",
            "className": "btn btn-secondary"
        }
    ];
    if (validateUserToken == 1) {

        
        buttons.push({
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr": "Exportar a excel",
            "title": "Tu Título Aquí",  // Aquí puedes reemplazarlo con la variable 'title' que tengas
            "className": "btn btn-success",
            "footer": true
        });
        
        buttons.push({
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Exportar a PDF",
            "title": "Tu Título Aquí",  // Aquí puedes reemplazarlo con la variable 'title' que tengas
            "className": "btn btn-danger",
            "orientation": "landscape",
            "pageSize": "A3",
            "footer": true
        });
    }

    if (idGrafica != 0 && idGrafica != 13) {
        buttons.push({
            "text": "<i class='fas fa-chart-pie'></i> Gráfica",
            "titleAttr": "Gráfica",
            "className": "btn btn-info",
            action: function(e, dt, node, config) {
                $('#modalGraficaTabla').modal('show');
            }
        });
    }

    // Si el valor de 'grafica' es 5 y 'PARAM2' tiene datos
    if (idGrafica == 13 && paramsMap != '') {
        buttons.push({
            "text": "<i class='fa-solid fa-map'></i> Mapa",
            "titleAttr": "Gráfica",
            "className": "btn btn-default",
            action: function(e, dt, node, config) {
                var script = document.createElement('script');
                script.src = 'https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap&v=weekly';
                script.async = true;
                
                let map;
                var flexMap = document.querySelector('#map');
                flexMap.style.display = 'flex';

                function initMap() {
                    // Aquí incluyes la lógica para inicializar el mapa
                    const map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 6,
                        center: {
                            "lat": centerData.lat,
                            "lng": centerData.lng
                                },
                    });
                    paramsMap.forEach((value, key) => {
                        const marker = new google.maps.Marker({
                            position: value['POSITION'],
                            map: map,
                            icon: `media/img/markers/marker_icon-${value['ICON']}.svg`,
                            title: value['TITLE'],
                            optimized: false,
                        });
                        const infoWindow = new google.maps.InfoWindow({
                            content: value['INFO'],
                        });
                        marker.addListener('click', () => {
                            infoWindow.close();
                            infoWindow.open({ anchor: marker });
                        });
                    });
                }

                window.initMap = initMap;
                document.head.appendChild(script);
            }
        });
    }
    
    tabla = $('#tabla').dataTable({

        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(), data;
            // converting to interger to find total
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ? i : 0;
            };

            $(api.column('0').footer()).html('TOTAL');

            const arrTotalizar = JSON.parse(document.getElementById('arrTotalizar').getAttribute('data-value'));

            for (let i = 0; i < arrTotalizar.length; i++) {
                const value = arrTotalizar[i] - 1;
                const varItem = 'pagecol' + i;
                varIte = api
                    .column(value, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        let pageTotal = intVal(a) + intVal(b);
                        return numeral(pageTotal).format('0,0.00');
                    }, 0);

                $(api.column(value).footer()).html(varIte);
            }
        },

        "rowReorder": {
            "selector": 'td:nth-child(2)'
        },
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "decimal": ".",
            "thousand": ",",
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

        'dom': 'lBfrtip',
        'lengthMenu': [
            [10, 50, 100, 250, -1],
            ['10', '50', '100', '250', 'Todos']
        ],
        "aaSorting": [], //Agregar o Quitar segun se necesite desactivar orden
        'buttons': buttons,
        "responsive": false,
        "bDestroy": true,
        "iDisplayLength": 100,
    });
}, false);


/*=============== EVENTO PARA ACTIVAR Y DESACTIVAR FILTROS SEGÚN EL TIPO===================*/
$('.class-kpi').change(function(index) {
    let condition_filter = $(this).find(':selected').data('atributo').split(',');
    let condition_filter_access = $(this).find(':selected').data('atributo-access').split(',');

    $(condition_filter).each(function(index, value) {
        $(".filter-" + value + "").prop('disabled', true);
        $(".filter-" + value + "").val(null).trigger('change');
    });
    $(condition_filter_access).each(function(index, value) {
        $(".filter-" + value + "").prop('disabled', false);
    });
});
/*=============== EVENTO PARA ACTIVAR Y DESACTIVAR FILTROS SEGÚN EL TIPO===================*/

$('#cwhere').click(function(e) {
    e.preventDefault();
    let url_cwhere = '';
    let com = 0;
    let kpi = document.getElementById('KPI').value; // Usar document.getElementById

    $('.form-filter-date').each(function(index) {
        if ($(this).val() != '') {
            url_cwhere += $(this).attr('name') + "='" + $(this).val() + "'";
        }
        if (index > 0) {
            url_cwhere += ' AND ';
        }
    });

    $('.js-example-basic-multiple').each(function(index) {
        if ($(this).val() != '') {
            url_cwhere += ' AND ' + $(this).attr('name') + " RLIKE '" + $(this).val() + "'";
            url_cwhere = url_cwhere.replace(/,/g, '|');
        }
        com += 1;
    });

    console.log(url_cwhere);
});