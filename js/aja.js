var xmlHttp = buatObjekRekuesXmlHttp();
var isianKalimat = new Array();

function buatObjekRekuesXmlHttp() {
    var xmlHttp;
    try {
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        var versiXmlHttp = new Array("MSXML2.XMLHTTP.6.0",
                                     "MSXML2.XMLHTTP.5.0",
                                     "MSXML2.XMLHTTP.4.0",
                                     "MSXML2.XMLHTTP.3.0",
                                     "Microsoft.XMLHTTP");
        for (var i = 0, len = versiXmlHttp.length; i < len; i++) {
            try {
                xmlHttp = new ActiveXObject(versiXmlHttp[i]);
            } catch (e) {  }
        }
    }
    if (!xmlHttp) {
        alert("tak bisa mbuat objek. pakai browser yang lebih baru.");
    } else {
        return xmlHttp;
    }
}


function lelele(kalimat) {
    if (xmlHttp) {
        isianKalimat.push(kalimat);
        try {
            var kalimatCocok = isianKalimat.shift();
            var yangDicari = "yangDicari=" + kalimatCocok;
            xmlHttp.open("GET", "php/kePHP.php?" + yangDicari, false);
            xmlHttp.onreadystatechange = cobaDapatkanPesan;
            xmlHttp.send();
        } catch (e) { }
    }
}

function tempelinDiLaman($pesan) {
    bagianDiLaman = document.getElementById("are");
    bagianDiLaman.innerHTML += "" + $pesan + "";
}

function tempelinErrorDiLaman($pesan) {
    tempelinDiLaman("gagal. karena " + $pesan);
}

function cobaDapatkanPesan() {
    try {
        ambilPesan();
    } catch (e) {
        tempelinErrorDiLaman(e.toString());
    }
}
function ambilPesan() {
    var response = xmlHttp.responseText;
    if (response.indexOf("ERRNO") >= 0
        || response.indexOf("error") >= 0
        //|| response.length == 0) {
        ){
        throw(response.length == 0 ? "server error." : response);
    }
    tempelinDiLaman(response);
	//setTimeout("lelele();", 5000);
}

function wah() {
    var namaBerkas = document.getElementById('exampleInputFile').value();
    document.getElementById('list').innerHTML = namaBerkas;
}
