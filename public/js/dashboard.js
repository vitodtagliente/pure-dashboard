// -------------------------------------
//              Datatables
// -------------------------------------

var Datatable = {};
Datatable.table = null;

// this function let to quickly define a datatable
Datatable.load = function(table_id, action, columns, row){
    Datatable.table = $(table_id).DataTable({
        ajax: {
            url: action,
            dataSrc: ''
        },
        columns: columns,
        select: true,
        createdRow: row,
        language: {
            'lengthMenu': 'Mostra _MENU_ elementi per pagina',
            'zeroRecords': 'Non sono stati trovati elementi da mostrare',
            "info": "Pagina _PAGE_ di _PAGES_",
            "infoEmpty": "Nessun elemento disponibile",
            "infoFiltered": "(filtrati da _MAX_ elementi)",
            "paginate": {
                "previous": "Pagina precedente",
                "next": "Prossima"
            },
            "search": "Cerca:"
        }
    });
}

// return the selected data
Datatable.selected = function(){
    return Datatable.table.row({selected:true}).data();
}

// refresh
Datatable.refresh = function(){
    if(Datatable.table)
        Datatable.table.ajax.reload();
}

// -------------------------------------
//              Alert
// -------------------------------------

// these function let to add alerts into pages

var Alert = {};

Alert.success = function(message){
    Alert.alert('success', 'Operazione riuscita!', message);
}

Alert.error = function(message){
    Alert.alert('danger', 'Operazione fallita!', message);
}

Alert.warning = function(message){
    Alert.alert('warning', 'Operazione fallita!', message);
}

Alert.alert = function(type, title, message){
    $('#alerts').append(
"       <div class='alert alert-" + type + " alert-dismissible fade show' role='alert'>\n" +
"           <strong>" + title + "</strong> " + message + "\n" +
"           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>\n" +
"               <span aria-hidden='true'>&times;</span>\n" +
"            </button>\n" +
"        </div>\n"
    );
}

// redirect function
function redirect(url){
    window.location.href = url;
}

// apply model to form
// all inputs will be automatically filled by model data
function model2form(form_id, model)
{
    for(var attribute in model)
    {
        var input = $(form_id + " input[name=" + attribute + "]");
        if(input)
        {
            if(input.attr('type') == 'checkbox')
            {
                input.prop('checked', (model[attribute]==true)?'checked':'');
            }

            input.val(model[attribute]);
        }
    }
}
