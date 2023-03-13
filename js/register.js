const form = document.querySelector("form");
form.onsubmit = (e) =>
{   
    e.preventDefault();           
}	
const submit_but = form.querySelector("button");

submit_but.onclick = () =>
{   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/register.php",  true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200)
        {
            let data = xhr.response;
            if(data == "success")
            {
                location.href = "profile.html";
            }
            else if (data == "password") {
                alert("Please enter a valid password");
            }
            else if (data == "email") {
                alert("Please enter a valid email");
            }
            else if (data == "name") {
                alert("Please enter a valid name");
            }
            else if (data == "exist"){
                console.log("in exist");
                alert("Email already exists");
            }
            else{
                console.log(data);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

