

function submitAndClose() {
    var controlNav = document.getElementById("control-nav-open");
    controlNav.style.display = "none";
}


function openNav() {
    var controlNav = document.getElementById("control-nav-open");
    controlNav.style.display = "";
    controlNav.style.visibility = "visible";
    var petSwitch = document.getElementsByClassName("switch");
    for (var i = 0; i< petSwitch.length; ++i){
        petSwitch[i].style.visibility = "visible";
    }
}


// swipes

(function(){
    var animating = false;

    function animatecard(ev) {
        if (animating === false) {  // animation
            var t = ev.target;
            if (t.className === 'but-nope') {
                t.parentNode.classList.add('nope');
                animating = true;
                fireCustomEvent('nopecard',
                    {
                        origin: t,
                        container: t.parentNode,
                        card: t.parentNode.querySelector('.card')
                    }
                );
            }
            if (t.className === 'but-yay') {
                t.parentNode.classList.add('yes');
                animating = true;
                fireCustomEvent('yepcard',
                    {
                        origin: t,
                        container: t.parentNode,
                        card: t.parentNode.querySelector('.card')
                    }
                );
            }
            if (t.classList.contains('current')) {
                fireCustomEvent('cardchosen',
                    {
                        container: getContainer(t),
                        card: t
                    }
                );
            }
        }
    } //END animatecard


    function fireCustomEvent(name, payload) {
        var newevent = new CustomEvent(name, {
            detail: payload
        });
        document.body.dispatchEvent(newevent);
    }

    function getContainer(elm) {
        var origin = elm.parentNode;
        if (!origin.classList.contains('cardcontainer')){
            origin = origin.parentNode;
        }
        return origin;
    }

    function animationdone(ev) {
        animating = false;
        var origin = getContainer(ev.target);
        if (ev.animationName === 'yay') {
            origin.classList.remove('yes');
        }
        if (ev.animationName === 'nope') {
            origin.classList.remove('nope');
        }
        if (origin.classList.contains('list')) {
            if (ev.animationName === 'nope' ||
                ev.animationName === 'yay') {
                origin.querySelector('.card:first-child').remove();
                if (!origin.querySelector('.card')) {
                    fireCustomEvent('deckempty', {
                        origin: origin.querySelector('button'),
                        container: origin,
                        card: null
                    });
                } 
            }
        }
    }
    document.body.addEventListener('animationend', animationdone);
    document.body.addEventListener('webkitAnimationEnd', animationdone);
    document.body.addEventListener('click', animatecard);
    window.addEventListener('DOMContentLoaded', function(){
        document.body.classList.add('tinderesque');
    });
})();