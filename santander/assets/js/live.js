function Online(param) {
    let req = new XMLHttpRequest();
    req.open('GET', './helpers/updateOnline.php?user_id='+param+'', true);
    req.onreadystatechange = function (aEvt) {
    if (req.readyState == 4) {
        if(req.status == 200)
        console.log(req.responseText);
        else
        console.log("Error loading page\n");
    }
    };
    req.send(null); 
}