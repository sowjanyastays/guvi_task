const form = document.querySelector("form");
form.onsubmit = (e) =>
{   
    e.preventDefault();           
}	
const submit_but = form.querySelector("button");

let local_email = localStorage.getItem('email');

//  if(local_email!=null){
//   document.write("Welcome"+local_email);}
//  else{
//   document.write("hi"); 
//   }

submit_but.onclick = () =>
{   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/profile.php",  true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200)
        {
            let data = xhr.response;
            if(data == "success")
            {
                alert("Details updated");
            }
            else if(data=="something is wrong"){
                alert("The coulumns should not be left blank");
            }
            else if (data == "age") {
                alert("Please enter a valid age");
            }
            else if (data == "gender") {
                alert("Please enter a valid gender");
            }
            else if (data == "country") {
                alert("Please enter a valid country");
            }
            else{
                console.log(data);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

