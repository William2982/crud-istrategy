// DataTables
$(document).ready(function () {
    $("#tabla-usuarios").DataTable({
        "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "Todos"]],
        language: {
            loadingRecords: "Cargando...",
            emptyTable: "Llenar el formulario para buscar los datos",
            search: "Buscador:",
            lengthMenu: "Mostrar _MENU_ entradas",
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });
});