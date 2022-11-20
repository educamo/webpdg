$(document).ready(function () {
    $('#dataTable').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
            info: 'Mostrando pagina _PAGE_ de _PAGES_',
        },
    });
});