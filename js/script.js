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

let challeges = [
    'CloudWord',
    'ImportFileIntoDb',
]

let positions = [];
positions.length = partecipants.length;


$(partecipants).each(function(index, partecipant) {
    $('#userNames').append(`
        <option value="${partecipant}">${partecipant}</option>
    `);
});
$(challeges).each(function(index, chellenge) {
    $('#challenges').append(`
        <option value="${chellenge}">${index+1} - ${chellenge}</option>
    `);
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
            <label>${partecipant}</label>

            <select name="${partecipant}" class="positions">
                <option value="" disabled selected hidden>Posizione</option>
            </select>
            `);
        }
    });

    $(positions).each(function(index){
        $('.positions').append(`
            <option value="${index+1}">${index+1}&deg;</option>
        `)
    });

    $('#votation').append('<button type="submit">invia</button>');
    
    /* let classifica = {
        'valerio' : 1,
        'maurizio' : 2,
        'mario' : 3,
    } */
    /* let url = window.location.href + 'server.php/'; */

    axios.get(`server.php?user=${userValue}&challenge=${challengeValue}`)
    .then(function(res) {
        /* console.log(res.data); */
    })
    .catch(e => console.error(e));
});