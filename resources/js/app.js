import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import Swal from 'sweetalert2';


import { DataTable } from "simple-datatables";

window.Alpine = Alpine
window.Swal = Swal;

Alpine.plugin(persist)
Alpine.start()


if (document.getElementById("myTable") && typeof DataTable !== 'undefined') {
    const dataTable = new new DataTable("#myTable", {
        searchable: true,
        sortable: true,
        paging: true,
        perPageSelect: [2, 5, 10, 15, 20],
        labels: {
            placeholder: "Buscar...",
            perPage: "Linhas",
            infoEmpty: "Nenhum registro encontrado",
            zeroRecords: "Nenhum registro encontrado",
            emptyTable: "Nenhum registro encontrado",
            info: "Mostrando {start} a {end} de {rows} registros",
        }
    });
}
