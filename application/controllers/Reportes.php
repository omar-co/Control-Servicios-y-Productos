<?php defined('BASEPATH') OR exit('No direct script access allowed');

final class Reportes extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function servicios_productos()
    {
        $this->_data['view'] = 'producto_editar_view';
        $this->_data['title'] = 'Nuevo Producto';
        $this->_render_page();
    }

    public function demo()
    {
        $this->_data['view'] = 'demo_view';
        $this->_data['title'] = 'Reporte de Servicios / Productos';
        array_unshift($this->_data['estilos'],'morris','daterangepicker','jquery.dataTables.min','datatables.bootstrap.min');
        array_push($this->_data['js_footer'],'moment.min','morris.min','raphael-min','daterangepicker',
            'jquery.dataTables.min','dataTables.bootstrap','input');
        $this->_data['js_code'] = '
        $(window).load(function(){



        // Morris bar chart

        Morris.Bar({
            element: \'bar-example\',
            data: [
                { y: \'Corte Dama\', a: 23,  b: 65 },
                { y: \'Corte Caballero\', a: 16,  b: 40 },
                { y: \'Tinte\', a: 6,  b: 65 },
                { y: \'Planchado\', a: 2, b: 90 },
                { y: \'Peinado\', a: 11, b: 90 }
            ],
            xkey: \'y\',
            ykeys: [ \'a\'],
            labels: [\'Cantidad Vendida\'],
            barColors:[\'#2ec7c9\']
        });

        // Morris donut chart

        Morris.Donut({
            element: \'donut-example\',
            data: [
                {label: "Corte Dama", value: 2295, color: \'#5e90b5\'},
                {label: "Corte Caballero", value: 1200, color: \'#66cd7d\'},
                {label: "Tinte", value: 1900, color: \'#aa9bff\'},
                {label: "Planchado", value: 180, color: \'#e56b6b\'},
                {label: "Peinado", value: 1724, color: \'#46add4\'}
            ]
        });


    });

    $(function() {

    var start = moment().subtract(29, \'days\');
    var end = moment();

    function cb(start, end) {
        $(\'#reportrange span\').html(start.format(\'MMMM D, YYYY\') + \' - \' + end.format(\'MMMM D, YYYY\'));
    }

    $(\'#fecha\').daterangepicker({
        startDate: end,
        endDate: start,
        "opens": "left",
        "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aceptar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "A",
        "customRangeLabel": "Personalizar",
        "weekLabel": "S",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Augosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
        ranges: {
           \'Hoy\': [moment(), moment()],
           \'Ayer\': [moment().subtract(1, \'days\'), moment().subtract(1, \'days\')],
           \'Últimos 7 Días\': [moment().subtract(6, \'days\'), moment()],
           \'Últimos 30 Días\': [moment().subtract(29, \'days\'), moment()],
           \'Este Mes\': [moment().startOf(\'month\'), moment().endOf(\'month\')],
           \'El Mes Pasado\': [moment().subtract(1, \'month\').startOf(\'month\'), moment().subtract(1, \'month\').endOf(\'month\')]
        }
    }, cb);

    cb(start, end);

});
        ';
        $this->_render_page();
    }

}