
const btn =document.querySelector(".btn");

btn.onmousemove= function(e){
    const x=e.pageX - btn.offsetLeft;
    const y=e.pageY - btn.offsetTop;

    btn.style.setProperty('--x',x +'px' );
    btn.style.setProperty('--y',y +'px' );
};

const btn_ins =document.querySelector(".btn_ins");
btn_ins.onmousemove= function(e){
    const x=e.pageX - btn_ins.offsetLeft;
    const y=e.pageY - btn_ins.offsetTop;

    btn_ins.style.setProperty('--xPos',x +'px' );
    btn_ins.style.setProperty('--yPos',y +'px' );
};

const btn_login=document.querySelector(".btn_login");
btn_login.onmousemove= function(e){
    const x=e.pageX - btn_login.offsetLeft;
    const y=e.pageY - btn_login.offsetTop;

    btn_login.style.setProperty('--xPos1',x +'px' );
    btn_login.style.setProperty('--yPos1',y +'px' );
};

////////////////////////////////////////
const containerEl=document.querySelector(".header");


const btnIns=document.querySelector(".btn_ins");



const btnLogIn=document.querySelector(".btn_login");

const popupContainerEl=document.querySelector(".form_login");

const popupContainerEl2=document.querySelector(".form_insc");

const popupContainerEl3=document.querySelector(".form_insc3");

const client2=document.querySelector(".client2");



const btnLogInA=document.querySelector(".logInA");

const btnLogInC=document.querySelector(".logInC");


//const btnLogInS=document.querySelector(".logInS");

//const btnLogInComp=document.querySelector(".logInComp");

const closeIcon=document.querySelector(".close-icon");

const closeIcon2=document.querySelector(".close-icon2");
const closeIcon3=document.querySelector(".close-icon3");

const btnIns2=document.querySelector(".insc");

//const submit=document.querySelector(".btn_connect");

btnIns.addEventListener("click",()=>{
    containerEl.classList.add("active");
   
    popupContainerEl2.classList.remove("active");

});
btnIns2.addEventListener("click",()=>{
    popupContainerEl.classList.add("active");
    popupContainerEl2.classList.remove("active");

});
client2.addEventListener("click",()=>{
  event.preventDefault();
  popupContainerEl3.classList.remove("active");
  popupContainerEl2.classList.add("active");
});


closeIcon.addEventListener("click",()=>{
    containerEl.classList.remove("active");
    popupContainerEl.classList.add("active");

});
closeIcon2.addEventListener("click",()=>{
    containerEl.classList.remove("active");
    popupContainerEl2.classList.add("active");

});
closeIcon3.addEventListener("click",()=>{
  containerEl.classList.remove("active");
  popupContainerEl3.classList.add("active");

});






btnLogIn.addEventListener("click",()=>{
    containerEl.classList.add("active");
    popupContainerEl.classList.remove("active");
    
});

/////////////////////////////////////////////////






btnLogInA.addEventListener("click",()=>{
    containerEl.classList.add("active");
    popupContainerEl.classList.remove("active");

});

btnLogInC.addEventListener("click",()=>{
  containerEl.classList.add("active");
  popupContainerEl.classList.remove("active");

});

//////////////////////////////////////////////





const nom=document.getElementById('nom');
const nom2=document.getElementById('nom2');
const errnom=document.getElementById('errNom'); // id span erreur nom 
const errnom2=document.getElementById('errNom2');
const prenom=document.getElementById('prenom');
const errpren=document.getElementById('errPrenom'); // id span erreur prenom

const dateNaiss=document.getElementById('dateNai');
const errDateNai=document.getElementById("errDN");

const sexe=document.getElementById('Sexe');
const errSexe=document.getElementById('errSexe');

const numTel=document.getElementById('NumTel');
const errNumTel=document.getElementById('errNT');

const numTel2=document.getElementById('NumTel2');
const errNumTel2=document.getElementById('errNT2');

const adr=document.getElementById('adr');
const errAdr=document.getElementById('errAdr');

const adr2=document.getElementById('adr2');
const errAdr2=document.getElementById('errAdr2');

const prof=document.getElementById('profession');
const errProf=document.getElementById('errProf');

const sec=document.getElementById('secteur');
const errSec=document.getElementById('errSec');

const email=document.getElementById('email');
const errEmail=document.getElementById('errEmail');

const email2=document.getElementById('email2');
const errEmail2=document.getElementById('errEmail2');

const mdp1=document.getElementById('mdp1');
const errMdp1=document.getElementById('errMdp1');

const mdp12=document.getElementById('mdp12');
const errMdp12=document.getElementById('errMdp12');

const mdp2=document.getElementById('mdp2');
const errMdp2=document.getElementById('errMdp2');

const mdp22=document.getElementById('mdp22');
const errMdp22=document.getElementById('errMdp22');

const cin=document.getElementById('cin');
const errcin=document.getElementById('errcin');
/////////

const red="#a50f04";
/////


  
const icon2=document.getElementById('icon2');
const icon1=document.getElementById('icon1');
icon1.classList.remove("active");
icon2.classList.remove("active");
 
function validationNom(){
  
  if(checkIfEmpty(nom, errnom,'nom')) 
    
    return;
       
  else (!checkIfOnlyLetters(nom,errnom,'nom'))
    
    return true;
    

      
}
function validationCIN()
{
  
    if(checkIfEmpty(cin,errcin,'numéro de CIN'))
      return;
    if(!checkIfOnlyNubmbers(cin,errcin,'CIN'))
      return true;
    
  
}
//////////////////
function validationNom2(){
  
  if(checkIfEmpty(nom2, errnom2,'nom')) 
    
    return;
       
  
    
    return true;
    

      
}

function validationPrenom(){
  if(checkIfEmpty(prenom, errpren,'prenom'))
  
    return;
  if(!checkIfOnlyLetters(prenom,errpren,'prenom'))
    return true;
}
function validationDateNai(){
  if(checkIfEmpty(dateNaiss,errDateNai,'date de naissance'))
  { 
    return;}
    
  
}
function validationNumTel(){
  if(checkIfEmpty(numTel,errNumTel,'numéro de téléphone'))
    return;
  if(!checkIfOnlyNubmbers(numTel,errNumTel,'numéro de téléphone'))
    return true;
  
}
function validationNumTel2(){
  if(checkIfEmpty(numTel2,errNumTel2,'numéro de téléphone'))
    return;
  if(!checkIfOnlyNubmbers(numTel2,errNumTel2,'numéro de téléphone'))
    return true;
  
}
function validationAdr(){
  if(checkIfEmpty(adr,errAdr,'adresse'))
    return;
  
}

function validationAdr2(){
  if(checkIfEmpty(adr2,errAdr2,'adresse'))
    return;
  
}

function validationprof(){
  if(checkIfEmpty(prof,errProf,'Profession'))
    return;
  
}
function validationSec(){
  if(checkIfEmpty(sec,errSec,"Secteur d'activité"))
    return;
  
}
function validationEmail(){
  if(checkIfEmpty(email,errEmail,'Email'))
    return;
    if (!containsCharacters(email, 5)) return;
    return true;
  
}
function validationEmail2(){
  if(checkIfEmpty(email2,errEmail2,'Email'))
    return;
    if (!containsCharacters(email2, 5)) return;
    return true;
  
}
function validationMdp1(){
  if(checkIfEmpty1(mdp1,errMdp1,'mot de passe'))
    return;
    if (!meetLength(errMdp1,mdp1, 5, 100)) return;
    
}
function validationMdp12(){
  if(checkIfEmpty1(mdp12,errMdp12,'mot de passe'))
    return;
    if (!meetLength(errMdp12,mdp12, 5, 100)) return;
    
}
function validationMdp2(){
  if(checkIfEmpty2(mdp2,errMdp2,'mot de passe'))
    return;
  if(mdp2.value!=mdp1.value)
  setInvalid(errMdp2,`Mot de passe n'est pas confirmé!`)  
    return true;
    
}
function validationMdp22(){
  if(checkIfEmpty2(mdp22,errMdp22,'mot de passe'))
    return;
  if(mdp22.value!=mdp12.value)
  setInvalid(errMdp22,`Mot de passe n'est pas confirmé!`)  
    return true;
    
}






function checkIfEmpty(field, spanError, text){
  if(isEmpty(field.value.trim())){
    setInvalid(spanError,` Il faut saisir votre ${text}!`) 
  }else {
    setValid(spanError,field);
    return false;
  }
}
function checkIfEmpty1(field, spanError, text){ 
  if(isEmpty(field.value.trim())){
    setInvalid(spanError,` Il faut choisir un ${text}!`)  
    return true;
  }else {
    setValid(spanError,field);
    return false;
  }
}
function checkIfEmpty2(field, spanError, text){ 
  if(isEmpty(field.value.trim())){
    setInvalid(spanError,` Il faut confirmer le ${text}!`)  
    return true;
  }else {
    setValid(spanError,field);
    return false;
  }
}


function isEmpty(value){
  if(value=='')return true;
  return false;
}

function setInvalid(spanError,message){ 
  spanError.className='invalid';
  spanError.textContent=message;
  spanError.style.color=red;
  icon2.classList.add("active");
  icon1.classList.remove("active");
}
function setValid(spanError,field){
  field.classList.add('valid');
  spanError.textContent='';
 field.classList.remove('invalid');
 icon2.classList.remove("active");
  icon1.classList.add("active");

}

function checkIfOnlyLetters(field, spanError, text){
  if(/^[a-zA-Z ]+$/.test(field.value)){  
    setValid(spanError,field);
  }else{
    setInvalid(spanError,`Le ${text} doit contenir seulement des lettres!`) // nafes el hkeya honi zeda eli el foe9 
  }

}
function checkIfOnlyNubmbers(field,spanError,text){
  if(field.value.length!=8)
  setInvalid(spanError,`Le ${text} doit contenir 8 chiffres!`);
  else {
    if(/^[0-9]+$/.test(field.value))
  setValid(spanError,field)
    else
    setInvalid(spanError,`Le ${text} ne doit contenir que des chiffres!`)
  }


}



function meetLength(spanError,field, minLength, maxLength) {
  if (field.value.length >= minLength && field.value.length < maxLength) {
    setValid(spanError,field);
    return true;
  } else if (field.value.length < minLength) {
    setInvalid(spanError,`Il faut que le mot de passe soit de ${minLength} charactères au minimum. `
    );
    return false;
  } else {
    setInvalid(`Il faut que le mot de passe soit de ${maxLength} charactères au maximum.`
    );
    return false;
  }
}



function containsCharacters(field, code) {
  let regEx;
  switch (code) {
    case 1:
      // letters
      regEx = /(?=.*[a-zA-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one letter');
    case 2:
      // letter and numbers
      regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one letter and one number'
      );
    case 3:
      // uppercase, lowercase and number
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter and one number'
      );
    case 4:
      // uppercase, lowercase, number and special char
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter, one number and one special character'
      );
    case 5:
      // Email pattern
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, "Il faur que l'adresse email soit valide! ");
    default:
      return false;
  }
}
function matchWithRegEx(regEx, field, message) {
  if (field.value.match(regEx)) {
    setValid(errEmail,field);
    return true;
  } else {
    setInvalid(errEmail,message);
    return false;
  }
}



/*const form2= document.querySelector('form2');

form2.addEventListener('submit', (event) => {
  event.preventDefault();

  // Exécuter vos fonctions de validation en utilisant des promesses asynchrones
  Promise.all([
    validationNom(),
    validationPrenom(),
    validationDateNai(),
    validationCIN(),
    validationNumTel(),
    validationAdr(),
    validationprof(),
    validationEmail(),
    validationMdp1(),
    validationMdp2()






  ]).then((results) => {
    // Vérifiez si toutes les fonctions de validation ont réussi
    const allValid = results.every((result) => result);

    if (allValid) {
      // Envoyer les données à la base de données à l'aide d'une requête AJAX
      sendDataToDatabase();
    } else {
      // Afficher un message d'erreur approprié
      alert('Veuillez corriger les erreurs avant de continuer.');
    }
  });
});

function sendDataToDatabase(formData) {
  fetch('aj_cl_phy.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur lors de l\'enregistrement des données');
    }
    // Si tout est ok, afficher un message de succès ou effectuer d'autres actions.
    alert('Les données ont été enregistrées avec succès');
  })
  .catch(error => {
    console.error('Une erreur est survenue:', error);
    alert('Une erreur est survenue lors de l\'enregistrement des données');
  });
}*/