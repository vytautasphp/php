
var a=3, b=4, c=5, e, d;

if (c<a+b && a<c+b && b<c+a){
    d= 'trikampis susidaro';

    if (c==a && c==b && b==a){
    e='trikampis lygiakrastis'
    }
    else if (c==a && c!=b && c!=a|| b==a && b!=c && a!=c|| c==b && c!=a && b!=a){
        e='lygiasonis trikampis';
    }
    else if (Math.pow(a, 2)+Math.pow(b, 2)==Math.pow(c, 2)){
        e='statusis trikampis';
    }
    else {
        e='ivairiakrastis trikampis';
    }
    var elementas = document.getElementById("e2");
    elementas.innerHTML = e;
    }
else {
    d= 'trikampis nesusidaro!';
}
var elementas = document.getElementById("e1");
elementas.innerHTML = d;