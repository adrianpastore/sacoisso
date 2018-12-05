let addIng = document.querySelector("#maisbutton");
let divIng = document.querySelector('.grupoconv');
console.log(divIng);
let ing1 = document.querySelector('.conv');

addIng.addEventListener('click', function (e){
  let ing2 = document.querySelector('.conv');
  console.log(ing2);
  let cln = ing2.cloneNode(true);
  cln.className="form-control conv";
  cln.name = "conv" +  (parseInt(ing2.name.substr(4,ing2.length))+1);

cln.remove(ing2.value-1); 
  divIng.appendChild(cln);
  ing2.className = "form-control";
  e.preventDefault();
});