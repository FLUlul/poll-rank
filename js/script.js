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
        'value' : true,
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
    $('#userNames').append(`
        <option value="${partecipant}">${partecipant}</option>
    `);
});

$(challeges).each(function(index, value) {
    if (value.value) {
        $('#challenges').append(`
            <option value="${value.key}">${index+1} - ${value.key}</option>
        `);
    } else {
        $('#challenges').append(`
        <option value="${value.key}" disabled>${index+1} - ${value.key}</option>
    `);
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
        if (partecipant.toLowerCase() !== userValue) {
            $('#votation').append(`
            <div>
                <label>${partecipant}</label>

                <select name="${partecipant}" class="positions">
                    <option value="" selected >Posizione</option>
                </select>
            </div>
            `);
        }
        if (partecipant.toLowerCase() == userValue) {
            $('#votation').append(`
            <div class='d-none'>
                <label>${partecipant}</label>

                <select name="${partecipant}" class="positions">
                    <option value="" selected >Posizione</option>
                </select>
            </div>
            `);
        }
    });

    $(positions).each(function(index){
        $('.positions').append(`
            <option value="${index+1}">${index+1}&deg;</option>
        `)
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

    $('#votation').append('<button type="submit" class="btn">Invia</button>');
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