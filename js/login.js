const form = document.querySelector("form");
form.onsubmit = (e) =>
{   
    e.preventDefault();           
}	
const submit_but = form.querySelector("button");
const email = form.querySelector(".email input");
console.log(email);
submit_but.onclick = () =>
{   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php",  true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200)
        {
            let data = xhr.response;
            if(data == "success")
            {   localStorage.setItem('email', email.value);
                location.href = "profile.html";
            }
            else if (data == "password") {
                alert("Please enter a valid password");
            }
            else if (data == "email") {
                alert("Please enter a valid email");
            }
            else if ( data == "emp"){
                alert("Empty");
            }
            else{
                console.log(data);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

