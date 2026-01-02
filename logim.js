let sections=document.getElementById('Section2');
//console.log(sections);

function mock(pass) {
  let head=document.getElementsByTagName('h1')[0];
  if (head.innerHTML==='Welcome! Ready to check out my webpage?') {
    head.innerHTML='HA';
  }
  else {
    head.innerHTML+='HA';
  }
  console.log(head);
  
  let newMsg=document.createElement('p');
  newMsg.innerHTML=`Somebody knows the password you like to use is <b>${pass}</b>.`;
  sections.append(newMsg);
  console.log(sections);
}

Login.addEventListener('click', function(e){
  mock(document.getElementById('PasswordID').value);
});
PasswordID.addEventListener('keypress', function(e){
  if(e.key==='Enter') {
    mock(document.getElementById('PasswordID').value);
}});