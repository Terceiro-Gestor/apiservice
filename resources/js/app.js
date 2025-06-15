import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import Swal from 'sweetalert2';

/* 
import $ from 'jquery';

import DataTable from 'datatables.net';
import 'datatables.net-buttons';
import 'datatables.net-buttons/js/buttons.html5.js';
import 'datatables.net-buttons/js/buttons.print.js';

import jszip from 'jszip';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';

// Carregador de scripts do DataTables

window.$ = $;
window.jQuery = $;
window.JSZip = jszip;
pdfMake.vfs = pdfFonts.pdfMake ? pdfFonts.pdfMake.vfs : pdfFonts.vfs;
window.pdfMake = pdfMake;
window.DataTable = DataTable;

*/

window.Alpine = Alpine
window.Swal = Swal;

Alpine.plugin(persist)
Alpine.start()

