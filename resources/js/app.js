import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import Swal from 'sweetalert2';


import { DataTable } from "simple-datatables";
import IMask from 'imask';

window.Alpine = Alpine
window.Swal = Swal;

Alpine.plugin(persist)
Alpine.start()


if (document.getElementById("myTable") && typeof DataTable !== 'undefined') {
    const dataTable = new DataTable("#myTable", {
        searchable: true,
        select: true,
        sortable: true,
        paging: true,
        perPageSelect: [2, 5, 10, 15, 20],
        labels: {
            placeholder: "Buscar...",
            perPage: "Linhas",
            info: "Mostrando {start} a {end} de {rows} registros",
        }
    });
}
