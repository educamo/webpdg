$(document).ready(function () {
    $('#dataTable').DataTable({
        language: {
            info: 'Mostrando desde _START_ hasta _END_ de _TOTAL_ registros',
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        },
    });
});