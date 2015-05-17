
    httpReq = new XMLHttpRequest();

    httpReq.onreadystatechange = function()
        {
            alert(httpReq.responseText);
        }

    httpReq.open("GET", "http://www.pulsar.bg/index.php?route=product/isearch&search=dragon", true);
    httpReq.send(null);






