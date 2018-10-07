@extends('dashboard.php')

@begin('module-title')
Gestione Comuni
@end

@begin('module-navbar')
<nav class="nav nav-pills nav-fill justify-content-end">
    <a class="nav-link active btn-success" id="btn-load" href="{{base_url('dashboard/comuni/load')}}" data-toggle="tooltip" data-placement="bottom" title="Registra i moduli aggiunti di recente">Carica</a>
</nav>
@end

@begin('module-content')
<!-- DataTable -->
<div class = 'content'>
    <table id="table_id" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Istat</th>
                <th>Nome</th>
                <th>Provincia</th>
				<th>CAP</th>
                <th>Regione</th>
				<th>Prefisso</th>
                <th>Link</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Istat</th>
                <th>Nome</th>
                <th>Provincia</th>
				<th>CAP</th>
                <th>Regione</th>
				<th>Prefisso</th>
                <th>Link</th>
            </tr>
        </tfoot>
    </table>
</div>
@end

@begin('footer-js')
<script>
$(document).ready( function () {

    Datatable.load(
        '#table_id',
        '/dashboard/comuni/all',
        [
            { data: 'istat', width: '10%' },
            { data: 'nome' },
            { data: 'provincia', width: '10%' },
            { data: 'cap', width: '10%' },
            { data: 'regione' },
            { data: 'prefisso', width: '10%' },
            { data: 'link' }
        ]
    );

} );
</script>
@end
