@extends('dashboard.php')

@begin('module-title')
Gestione Codici Ateco
@end

@begin('module-navbar')
<nav class="nav nav-pills nav-fill justify-content-end">
    <a class="nav-link active btn-success" id="btn-load" href="{{base_url('dashboard/sicurezza/ateco/load')}}" data-toggle="tooltip" data-placement="bottom" title="Registra i moduli aggiunti di recente">Carica</a>
</nav>
@end

@begin('module-content')
<!-- DataTable -->
<div class = 'content'>
    <table id="table_id" class="table table-hover table-striped table-sm">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
				<th>Classe di Rischio</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
				<th>Classe di Rischio</th>
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
        '/dashboard/sicurezza/ateco/all',
        [
            { data: 'name', width: '20%' },
            { data: 'description' },
            { data: 'danger_class', width: '10%' }
        ],
        // created row
        function(row, data, index)
        {
            if(data.danger_class == 'RISCHIO MEDIO')
            {
                $('td', row).eq(2).css('background-color', 'sandybrown');
            }
            else if(data.danger_class == 'RISCHIO ALTO')
            {
                $('td', row).eq(2).css('background-color', 'indianred');
            }
            else $('td', row).eq(2).css('background-color', 'lightgreen');
        }
    );

} );

</script>
@end
