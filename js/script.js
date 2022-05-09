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

$(partecipants).each(function(index, partecipant) {
    $('#userName').append(`
        <option value="${partecipant}">${partecipant}</option>
    `);
});
$(challeges).each(function(index, chellenge) {
    $('#challenge').append(`
        <option value="${chellenge}">${index+1} - ${chellenge}</option>
    `);
});

$("#sendBtn").click(function() {
    let userValue = $('#userName').val().toLowerCase();
    let challengeValue = $('#challenge').val();

    $(this).attr('href', `server.php?user=${userValue}&challenge=${challengeValue}`);
    $('#form_container').html('');
    $('#form_container').append(`
        <form action="server.php?savePoll=true&user=${userValue}&challenge=${challengeValue}" method="post" id="votation"></form>
    `);

    $(partecipants).each(function(index, partecipant) {
        if (partecipant.toLowerCase() !== userValue) {
            $('#votation').append(`
            <label>${partecipant}</label>
            <input name="${partecipant}" type="number" min="1" max="${partecipants.length}" placeholder="Posizione">
            `);
        }
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