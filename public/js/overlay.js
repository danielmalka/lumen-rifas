function loadingShow() {
    let email = document.getElementById('email');
    let nome_completo = document.getElementById('nome_completo');
    if (isEmptyOrSpaces(email.value) && isEmptyOrSpaces(nome_completo.value)) {
        window.$.LoadingOverlay('show');
        return;
    }
    return;
}

function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}
