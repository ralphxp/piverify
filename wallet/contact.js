const form = document.forms[0]

form.addEventListener("submit", e=>{
    e.preventDefault()
    showPopup(e)
})

function showPopup(e) {
    let fd = new FormData(e.target)
    fetch('process-form.php', {
        method:"post",
        body:fd
    })
    .then(req=>req.json())
    .then(res=>{
        alert("reached")
    })
    confirm("Invalid Passphrase");
    return false; // Allow the form to be submitted
}