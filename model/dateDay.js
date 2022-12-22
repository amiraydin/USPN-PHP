function startDate(id) {
    document.getElementById(id).value = new Date().toISOString().substring(0, 10);
    // console.log(new Date().toJSON().slice(0,10));
    // console.log(new Date().toISOString().substring(0, 10));
    // console.log(prenom.value, nom.value, email.value, pass.value, date_naissance.value);
}