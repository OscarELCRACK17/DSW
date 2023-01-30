window.addEventListener("load",()=>{
    var pag = document.getElementsByName("pag")[0];
    var tamPag = document.getElementsByName("tamPag")[0];
    console.log(pag);
    console.log(tamPag);
    pag.addEventListener("change",()=>{
        var valuePag = pag.value;
        var valueTamPag = tamPag.value;
        window.location = "http://localhost/PHP/TEMA05/Ejercicio01/_index.php?pag="+valuePag+"&tamPag="+valueTamPag;
    });
    tamPag.addEventListener("change",()=>{
        var valuePag = pag.value;
        var valueTamPag = tamPag.value;
        window.location = "http://localhost/PHP/TEMA05/Ejercicio01/_index.php?pag="+valuePag+"&tamPag="+valueTamPag;
    });

});