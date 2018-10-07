@extends('dashboard.php')

@begin('module-title')
Gestione moduli
@end

@begin('module-navbar')
<nav class="nav nav-pills nav-fill justify-content-end">
    <a class="nav-link active btn-success" id="btn-load" href="{{base_url('dashboard/modules/load')}}" data-toggle="tooltip" data-placement="bottom" title="Registra i moduli aggiunti di recente">Registra moduli</a>
    <a class="nav-link ml-1 active btn-danger" id="btn-clear" href="#" data-toggle="tooltip" data-placement="bottom" title="Elimina tutti i moduli">Elimina tutto</a>
</nav>
@end

@begin('module-content')
<!-- edit modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="page-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="page-modalTitle">Modifica Modulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='POST' action='#'>
                    <div class="form-group">
                        <label for="module-name" class="col-form-label">Nome:</label>
                        <input type='text' class="form-control" id="module-name" value="" name='name' required readonly></input>
                        <input type='hidden' name='id'></input>
                    </div>
                    <div class="form-group">
                        <label for="module-description" class="col-form-label">Descrizione:</label>
                        <input type='text' class="form-control" id="module-description" value="" name='description'></input>
                        <div class="invalid-feedback">
                            Fornisci una descrizione valida.
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="module-active" name='active' required></input>
                        <label class="form-check-label" for="public-checkbox">
                            Attivo
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="module-role" class="col-form-label">Livello di accesso:</label>
                        <input type='number' class="form-control" id="module-role" value="" name='role' min='1' required></input>
                        <div class="invalid-feedback">
                            Fornisci un livello di accesso valido.
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        <button type="button" class="btn btn-primary" onclick="onsave()">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- DataTable -->
<div class = 'content'>
    <table id="table_id" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
				<th>Attivo</th>
				<th>Livello di accesso</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Attivo</th>
				<th>Livello di accesso</th>
                <th>Azioni</th>
            </tr>
        </tfoot>
    </table>
    <p class="pt-4">
        <em>
            Il livello di accesso consente di determinare quali utenti possono
            accedere alle funzionalità di un determinato modulo. In generale,
            il ruolo dell'utente deve essere maggiore o uguale a quello specificato
            per il modulo considerato.<br>L'attivazione/disattivazione dei moduli
            ha effetto su tutti gli utenti del sistema.
        </em>
    </p>
</div>
@end

@begin('footer-js')
<script>
$(document).ready( function () {

    Datatable.load(
        '#table_id',
        '/dashboard/modules/all',
        [
            { data: 'name', width: '20%' },
            { data: 'description' },
            {
                data: 'active',
                width: '10%',
                // custom render on public column
                render: function(data, type, row, meta)
                {
                    if(data == 0)
                        return "No";
                    return "Si";
                }
            },
            { data: 'role', width: '10%' },
            {
                width: '5%',
                render: function(data, type, row, meta)
                {
                    if(row.name == 'ModuleManager')
                    {
                        return null;
                    }
                    return "<div class='text-center'>" +
                    "<a href='#' onclick='onedit(" + row.id + ")' title='Modifica' aria-hidden='true'><span class='fas fa-pencil-alt'></span></a>" +
                    " <a href='#' onclick='onremove(" + row.id + ")' title='Rimuovi' style='color:red' aria-hidden='true'><span class='fas fa-trash'></span></a>" +
                    "</div>";
                }
            }
        ],
        // created row
        function(row, data, index)
        {
            if(data.active == true)
            {
                $('td', row).eq(2).css('background-color', 'lightgreen');
            }
        }
    );

} );

// Datatable actions

function onremove(element_id){
    if(element_id == null) return;

    alertify.confirm("Attenzione", "Sicuro di voler eliminare il modulo selezionato?",
        function(){
            $.ajax({
                method: 'POST',
                url: "{{base_url('dashboard/modules/delete')}}",
                data: { id: element_id }
            }).done(function(msg){
                if(msg)
                {
                    redirect("{{base_url('dashboard/modules')}}");
                }
                else alertify.error("Non è stato possibile eliminare il modulo selezionato.");
            }).fail(function(data){
                alertify.error("Non è stato possibile eliminare il modulo selezionato.");
            });
        },
        function(){
            // Cancel
            alertify.success('Operazione annullata.');
        }
    ).set('labels', {ok:'Si', cancel:'Annulla'}); ;
}

function onedit(element_id){
    if(element_id == null) return;

    $.ajax({
        method: 'GET',
        url: "{{base_url('dashboard/modules/show')}}" + '/' + element_id
    }).done(function(msg){
        if(msg)
        {
            var model = JSON.parse(msg);
            if(model)
            {
                model2form('#edit-modal', model);
                $('#edit-modal').modal('show');
            }
        }
        else alertify.error("Non è stato possibile accedere all'elemento selezionato");
    }).fail(function(data){
        alertify.error("Non è stato possibile accedere all'elemento selezionato");
    });
}

function onsave(){
    $.ajax({
        method: 'POST',
        url: "{{base_url('dashboard/modules/edit')}}",
        data: $('#edit-modal form').serialize()
    }).done(function(msg){
        if(msg)
        {
            Datatable.refresh();
            alertify.success("L'elemento selezionato modificato con successo");
        }
        else alertify.error("Non è stato possibile modificare l'elemento selezionato");
    }).fail(function(data){
        alertify.error("Non è stato possibile completare l'operazione richiesta");
    });

    $('#edit-modal').modal('hide');
}

// page functions

$('#btn-clear').click(function(e) {
    alertify.confirm("Attenzione", "Sicuro di voler eliminare tutti i moduli?",
        function(){
            redirect("{{base_url('dashboard/modules/clear')}}");
        },
        function(){
            // Cancel
            alertify.success('Operazione annullata.');
        }
    ).set('labels', {ok:'Si', cancel:'Annulla'}); ;
});

</script>
@end
