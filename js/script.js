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

$('.btn-vote').click(function() {
    $('.vote').toggleClass('d-none');
    $('.btn-vote, .btn-scoreboard, table, .btn-logout').addClass('d-none');
});
$('.btn-scoreboard').click(function() {
    $('.scoreboard').toggleClass('d-none');
    $('.btn-vote, .btn-scoreboard, table, .btn-logout').addClass('d-none');
});
$('.btn-view').click(function() {
    let href = $(this).attr('data-score');
    let challengeVal = $('.scoreboard .challenges').val();
    if (challengeVal !== null) {
        window.location.href = href + '/dashboard/' + challengeVal;
    }
});

    $(partecipants).each(function(index, partecipant) {
    createOption({
        select  : '#userNames',
        value   : partecipant,
        label   : partecipant
    });
});
$(challeges).each(function(index, value) {
    if (value.value) {
        createOption({
            label : `${index+1} - ${value.key}`,
            value : value.key,
            select: '.challenges'
        });
    } else {
        createOption({
            label   : `${index+1} - ${value.key}`,
            value   : value.key,
            select  : '.challenges',
            disabled: true
        });
    }
});
$('.scoreboard .challenges option').attr('disabled', false);


$("#sendBtn").click(function() {
    let userValue = $('#authUser').attr('data-user').toLowerCase();
    console.log(userValue);
    let challengeValue = $('.challenges').val();

    $(this).attr('href', `server.php?user=${userValue}&challenge=${challengeValue}`);
    $('#form_container').html('');
    $('#form_container').append(`
        <form action="server.php?savePoll=true&user=${userValue}&challenge=${challengeValue}" method="post" id="form_votation">
            <section id="votation"></section>
            <section id="buttons"></section>
        </form>
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
        option.attr('value', '');

        div.append(label)
        div.append(select);
        select.append(option);
        $('#votation').append(div);

        if (partecipant.toLowerCase() == userValue) {
            div.addClass('d-none');
        }
    });

    $(positions).each(function(index){
        createOption({
            label: `${index+1}&deg;`,
            value: index+1,
            select: '.positions'
        });
    });

    $('.positions').change(function() {
        $(this).attr('id', $(this).val());

        $('.positions option').show();

        let selected = [];
        $('.positions').each(function(index, select) {
            if (!selected.includes(select.id)) {
                selected.push(select.id);
            }
            if (selected.includes(select.id)) {
                $('.positions option[value="' + select.id + '"]').hide();
            }
        });
    });

    let homeRoute = $('#form_container').attr('data-home');

    $('#buttons').append('<button type="submit" class="btn">Send</button>');

    $('#buttons').append('<a id="refresh" href="'+homeRoute+'" class="btn">&#8635;</a>');


    axios.get(`server.php?user=${userValue}&challenge=${challengeValue}`)
    .then(function(res) {})
    .catch(e => console.error(e));

    $(".vote").hide();
});

/* FUNCTIONS */
function createOption(params) {
    let options = [];
    let option = $('<option>');
    option.val(params.value);
    option.html(params.label);
    option.attr('selected', params.selected);
    option.attr('disabled', params.disabled);

    options[params.value] = option;
    updateSelect(params.select, options);
}
function updateSelect(select, options) {
    for(let option in options) {
        $(select).append(options[option]);
    }
}