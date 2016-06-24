var data = '';

window.onload = (function () {
    var tab = document.cookie.split(";");
    initElem();
});

function initElem() {
    var cookies = document.cookie;
    var tab = cookies.split(";");
    for (var t in tab) {
        if (tab[t].indexOf("ft_list") != -1) {
            var value = tab[t].split("=")[1];
            data = value;
            var ntab = value.split(":");
            for (var val in ntab) {
                if (ntab[val])
                    createElem(unescape(ntab[val]), false);
            }
            break;
        }
    }
    return (cookies);
}

function get_id(event) {
    var div = document.getElementById('ft_list');
    var tab = div.getElementsByTagName('div');
    for (var i in tab) {
        if (tab[i] == event)
            return ((tab.length - 1) - i);
    }
    return (-1);
}

// 1 mois
function expires() {
    var d = new Date();
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    return (expires);
}

function deleteElem(event) {
    var res = confirm('Are you sure ?');
    if (res) {
        var id_del = get_id(event.target);
        var ntab = data.split(":");
        data = '';
        for (var i = 0; i < ntab.length; ++i) {
            if (ntab[i] && i != id_del)
                data += ntab[i] + ":";
        }
        var parent = document.getElementById('ft_list');
        parent.removeChild(event.target);
        document.cookie = "ft_list=" + data + ";" + expires();
    }
}

function createElem(text, create) {
    var parent = document.getElementById('ft_list');
    var div = document.createElement('div');
    div.textContent = text;
    div.onclick = deleteElem;
    if (parent)
        parent.insertBefore(div, parent.firstChild);
    if (create == true) {
        data += escape(text) + ":";
        document.cookie = "ft_list=" + data + ";" + expires();
    }
}

function promptUp() {
    var val = prompt("Quel 'to do' voulez-vous ajouter ?:", "")
    if (val != null)
        createElem(val, true);
}