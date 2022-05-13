/* Dichiaro i partecipanti */
/* todo => trasformare in array di oggetti con true se parecipa false se non partecipa in modo dinamico sulla select */
let partecipants = [
    'Valerio',
    'Maurizio',
    'Mario',
    'Francesco',
    'Samuele',
    'Alberto',
    'Daniele',
    'Michele'
]

/* Dichiaro le sfide */
let challeges = [
    {
        'key' : 'CloudWord',
        'value' : false,
    },
    {
        'key' : 'ImportFileIntoDb',
        'value' : false,
    },
    {
        'key' : 'noname',
        'value' : true,
    },
]

/* Dichiaro il numero di posizioni - 1 (perche' tu non conti)*/
let positions = [];
positions.length = partecipants.length - 1;


$(partecipants).each(function(index, partecipant) {
    createOption(partecipant, partecipant, '#userNames');
});

$(challeges).each(function(index, value) {
    if (value.value) {
        createOption(`${index+1} - ${value.key}`, value.key, '#challenges');
    } else {
        createOption(`${index+1} - ${value.key}`, value.key, '#challenges', false, true);
    }
});

$("#sendBtn").click(function() {
    let userValue = $('#userNames').val().toLowerCase();
    let challengeValue = $('#challenges').val();

    $(this).attr('href', `server.php?user=${userValue}&challenge=${challengeValue}`);
    $('#form_container').html('');
    $('#form_container').append(`
        <form action="server.php?savePoll=true&user=${userValue}&challenge=${challengeValue}" method="post" id="votation"></form>
    `);

    $(partecipants).each(function(index, partecipant) {
        let div = $('<div>');
        let label = $('<label>');
        let select = $('<select>');
        let option = $('<option>');

        label.html(partecipant);
        select.attr('name', partecipant);
        select.addClass('positions');
        option.attr('selected', true);
        option.html('Position');
        
        div.append(label)
        div.append(select);
        select.append(option);
        $('#votation').append(div);

        if (partecipant.toLowerCase() == userValue) {
            div.addClass('d-none');
        }
    });

    $(positions).each(function(index){
        createOption(`${index+1}&deg;`, index+1, '.positions');
    });

    $('.positions').change(function() {
        $(this).attr('id', $(this).val());
        var allSelects = document.querySelectorAll(".positions");
        let selected = [];
        $(allSelects).each(function(index, select) {
            if (!selected.includes(select.id)) {
                selected.push(select.id);
            }
            if (!selected.includes($('.positions option[style="display: none;"]').val())) {
                $('.positions option[style="display: none;"]').show();
            }
            if (selected.includes(select.id)) {
                $('.positions option[value="' + select.id + '"]').hide();
            }
        });
    });

    $('#votation').append('<button type="submit" class="btn">Send</button>');
    $('.container').append('<button id="refresh" class="btn">&#8635;</button>');
    $('#refresh').click(function() {
        location.reload();
    });
    /* let url = window.location.href + 'server.php/'; */

    axios.get(`server.php?user=${userValue}&challenge=${challengeValue}`)
    .then(function(res) {
        /* console.log(res.data); */
    })
    .catch(e => console.error(e));

    $(".login").hide();
});

/* FUNCTIONS */
function createOption(label, value, select, selected = false, disabled = false) {
    let options = [];
    let option = $('<option>');
    option.val(value);
    option.html(label);
    option.attr('selected', selected);
    option.attr('disabled', disabled);

    options[value] = option;
    updateSelect(select, options);
}
function updateSelect(select, options) {
    for(let option in options) {
        $(select).append(options[option]);
    }
}