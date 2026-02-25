import '../css/simple-datatable.css'
import { DataTable } from "simple-datatables";


document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("simple-table");

    if (table) {
        new DataTable(table, {
            searchable: true,
            sortable: true,
            paging: true,
            perPage: 5,
            perPageSelect: [5, 10, 25, 50, 100],
        });
        
        table.style.display = ""; // show after init
    }

});
