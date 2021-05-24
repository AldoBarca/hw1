const login = document.forms['form_login'];

const errore_login = document.querySelector('#errore_login');
const p = document.querySelector("#cred_sbagliate");
const nu = document.querySelector('#nome_utente');
const pw = document.querySelector('#password');

/* codice che al submit fa una breve validazione lato js e in caso effettivamente siano stati inseriti dei dati
controlla se tali dati sono presenti nel database e in caso positivo mandano alla propria homepage e avvia una sessione.
Tramite sessione sarà poi possibile recepire i dati dell'utente e capire se è un operatore sanitario o un paziente.
*/


const form = document.querySelector('#form_login');
form.addEventListener('submit', validazione_login);

function validazione_login(event) {
    const h3 = document.querySelector('#successo');
    if (h3) h3.classList.add('hidden');
    event.preventDefault();
    let parametri = { 'nome_utente': login.nome_utente.value, 'password': login.password.value };
    if (login.nome_utente.value.length == 0 || login.password.value.length == 0) {
        event.preventDefault();

        errore_login.classList.remove('hidden');
        p.classList.add("hidden");

    } else {

        fetch('http://localhost/Homework1/fetch_log.php', {
            method: 'POST',
            headers: {

                'Content-Type': 'application/json'
            },
            body: JSON.stringify(parametri)
        }).then(handler).then(risolviamo)



    }









}

function handler(response) {

    const ritorno = response.text();
    return ritorno;


}

function risolviamo(ritorno) {
    if (ritorno == 'OK') { window.location = "http://localhost/Homework1/homepage.php"; }
    if (ritorno == 'NOK') { document.querySelector('#cred_sbagliate').classList.remove('hidden'); }
}